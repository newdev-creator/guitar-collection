<?php

namespace App\Controller\BackOffice;

use App\Entity\Guitar;
use App\Form\GuitarType;
use App\Repository\BrandRepository;
use App\Repository\GuitarRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/backOffice/collection", name="back_office_collection")
 */
class CollectionController extends AbstractController
{
    /**
     * @Route("/", name="_browse", methods={"GET"})
     */
    public function browse(GuitarRepository $guitarRepository, BrandRepository $brandRepository): Response
    {
        // if user is admin show all guitars, else find guitar by user
        $allGuitars = $this->isGranted('ROLE_ADMIN') ? $guitarRepository->findAll() : $guitarRepository->findBy(['user' => $this->getUser()]);

        $brands = $brandRepository->findAll();
        
        // dd ($brands, $allGuitars);
        return $this->render('back_office/collection/browse.html.twig', [
            'guitars' => $allGuitars,
            'brands' => $brands,
        ]);
    }

    /**
     * @Route("/read/{id}", name="_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Guitar $guitar): Response
    {
        $this->denyAccessUnlessGranted('GUITAR_VIEW', $guitar);

        // get brand name
        $brand = $guitar->getBrand();

        $collectionForm = $this->createForm(GuitarType::class, $guitar, [
            'disabled' => 'disabled',
        ]);

        $collectionForm
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('updatedAt', null, [
                'widget' => 'single_text',
            ]);

        return $this->render('back_office/collection/read.html.twig', [
            'guitar' => $guitar,
            'brand' => $brand,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Guitar $guitar, GuitarRepository $guitarRepository, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {
        $this->denyAccessUnlessGranted('GUITAR_EDIT', $guitar);

        $form = $this->createForm(GuitarType::class, $guitar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // getDoctrine deprecated
            // $entityManager = $this->getDoctrine()->getManager();
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

                $guitar->setImage($newFilename);
            }

            $guitar->setUpdatedAt(new DateTimeImmutable());
            $entityManager->flush();

            $this->addFlash('success', "Le model {$guitar->getBrand()} {$guitar->getModel()} à bien été modifiée");

            // $guitarRepository->add($guitar);
            return $this->redirectToRoute('back_office_collection_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back_office/collection/edit.html.twig', [
            'guitar' => $guitar,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/add", name="_add", methods={"GET", "POST"})
     */
    public function add(Request $request, GuitarRepository $guitarRepository, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {

        $guitar = new Guitar();
        $form = $this->createForm(GuitarType::class, $guitar);
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

                $guitar->setImage($newFilename);
            }

            $entityManager->persist($guitar);
            $guitar
                ->setCreatedAt(new DateTimeImmutable())
                ->setUpdatedAt(new DateTimeImmutable());
            $guitarRepository->add($guitar);
            $entityManager->flush();
            $this->addFlash('success', "La guitare a été créée");

            return $this->redirectToRoute('back_office_collection_browse', [], Response::HTTP_SEE_OTHER);
        }



        return $this->renderForm('back_office/collection/add.html.twig', [
            'guitar' => $guitar,
            'form' => $form,
        ]);
    }

    /**
     * @Route("delete/{id}", name="_delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Guitar $guitar, GuitarRepository $guitarRepository, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('GUITAR_DELETE', $guitar);
        
        if ($this->isCsrfTokenValid('delete'.$guitar->getId(), $request->request->get('_token'))) {
            $guitarRepository->remove($guitar);
        }

        $entityManager->flush();
        $this->addFlash('success', "La guitare a été supprimée");

        return $this->redirectToRoute('back_office_collection_browse', [], Response::HTTP_SEE_OTHER);
    }
}
