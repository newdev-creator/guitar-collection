<?php

namespace App\Controller\BackOffice;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

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
        $users = $userRepository->findAll();

        return $this->render('back_office/user/browse.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/read/{id}", name="_read", methods={"GET"})
     */
    public function read(User $user): Response
    {
        // $this->denyAccessUnlessGranted('USER_VIEW', $user);

        return $this->render('back_office/user/read.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        // $this->denyAccessUnlessGranted('USER_EDIT', $user);

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $this->getDoctrine()->getManager()->flush();
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

            $entityManager->flush();
            $this->addFlash('success', "L'utilisateur à bien été modifiée");

            return $this->redirectToRoute('back_office_user_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back_office/user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/add", name="_add", methods={"GET", "POST"})
     */
    public function add(Request $request, UserRepository $userRepository): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user);
            $this->addFlash('success', "L'utilisateur à bien été ajouté");

            return $this->redirectToRoute('back_office_user_browse', [], Response::HTTP_SEE_OTHER);
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
        // $this->denyAccessUnlessGranted('USER_DELETE', $user);

        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $userRepository->remove($user);
            $this->addFlash('success', "L'utilisateur à bien été supprimé");
        }

        return $this->redirectToRoute('back_office_user_browse', [], Response::HTTP_SEE_OTHER);
    }
}