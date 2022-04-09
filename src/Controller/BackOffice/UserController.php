<?php

namespace App\Controller\BackOffice;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backOffice/user", name="back_office_user")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="_browse", methods={"GET"})
     */
    public function browse(UserRepository $userRepository): Response
    {
        return $this->render('back_office/user/browse.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @Route("/read/{id}", name="_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(User $user): Response
    {
        // $this->denyAccessUnlessGranted('USER_VIEW', $user);

        $userForm = $this->createForm(UserType::class, $user, [
            'disabled' => 'disabled',
        ]);

        $userForm
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text',
            ]);
        return $this->render('back_office/user/read.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, User $user, UserRepository $userRepository, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {

        // $this->denyAccessUnlessGranted('USER_EDIT', $user);

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('image')->getData();

            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();

                try {
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                $user->setImage($newFilename);
            }

            $user->setUpdateAt(new DateTimeImmutable());
            $entityManager->flush();

            $this->addFlash('success', "L'utilisateur à bien été modifiée");

            // $userRepository->add($user);
            return $this->redirectToRoute('app_back_office_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back_office/user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/add", name="_add", methods={"GET", "POST"})
     */
    public function new(Request $request, UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->add($user);
            return $this->redirectToRoute('app_back_office_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back_office/user/add.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("delete/{id}", name="_delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, User $user, UserRepository $userRepository): Response
    {
        // $this->denyAccessUnlessGranted('GUITAR_DELETE', $guitar);

        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user);
        }

        return $this->redirectToRoute('app_back_office_user_index', [], Response::HTTP_SEE_OTHER);
    }
}
