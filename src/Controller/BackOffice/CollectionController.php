<?php

namespace App\Controller\BackOffice;

use App\Entity\Guitar;
use App\Form\GuitarType;
use App\Repository\GuitarRepository;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/office/collection", name="back_office_collection")
 */
class CollectionController extends AbstractController
{
    /**
     * @Route("/", name="_browse", methods={"GET"})
     */
    public function browse(GuitarRepository $guitarRepository): Response
    {
        return $this->render('back_office/collection/browse.html.twig', [
            'guitars' => $guitarRepository->findAll(),
        ]);
    }

    /**
     * @Route("/read/{id}", name="_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Guitar $guitar): Response
    {
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
        ]);
    }

    /**
     * @Route("/edit/{id}", name="_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Guitar $guitar, GuitarRepository $guitarRepository): Response
    {
        $form = $this->createForm(GuitarType::class, $guitar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $guitar->setUpdatedAt(new DateTimeImmutable());
            $entityManager->flush();

            $this->addFlash('success', 'Le model `{$guitar->getModel()}` a bien été modifiée');
            // $guitarRepository->add($guitar);
            return $this->redirectToRoute('back_office_collection_brows', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back_office/collection/edit.html.twig', [
            'guitar' => $guitar,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/add", name="_add", methods={"GET", "POST"})
     */
    public function add(Request $request, GuitarRepository $guitarRepository): Response
    {
        $guitar = new Guitar();
        $form = $this->createForm(GuitarType::class, $guitar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $guitarRepository->add($guitar);
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
    public function delete(Request $request, Guitar $guitar, GuitarRepository $guitarRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$guitar->getId(), $request->request->get('_token'))) {
            $guitarRepository->remove($guitar);
        }

        return $this->redirectToRoute('back_office_collection_browse', [], Response::HTTP_SEE_OTHER);
    }
}
