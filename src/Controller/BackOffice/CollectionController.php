<?php

namespace App\Controller\BackOffice;

use App\Entity\Guitar;
use App\Form\GuitarType;
use App\Repository\GuitarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/office/collection")
 */
class CollectionController extends AbstractController
{
    /**
     * @Route("/", name="app_back_office_collection_index", methods={"GET"})
     */
    public function index(GuitarRepository $guitarRepository): Response
    {
        return $this->render('back_office/collection/index.html.twig', [
            'guitars' => $guitarRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_back_office_collection_new", methods={"GET", "POST"})
     */
    public function new(Request $request, GuitarRepository $guitarRepository): Response
    {
        $guitar = new Guitar();
        $form = $this->createForm(GuitarType::class, $guitar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $guitarRepository->add($guitar);
            return $this->redirectToRoute('app_back_office_collection_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back_office/collection/new.html.twig', [
            'guitar' => $guitar,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_office_collection_show", methods={"GET"})
     */
    public function show(Guitar $guitar): Response
    {
        return $this->render('back_office/collection/show.html.twig', [
            'guitar' => $guitar,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_back_office_collection_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Guitar $guitar, GuitarRepository $guitarRepository): Response
    {
        $form = $this->createForm(GuitarType::class, $guitar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $guitarRepository->add($guitar);
            return $this->redirectToRoute('app_back_office_collection_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back_office/collection/edit.html.twig', [
            'guitar' => $guitar,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_back_office_collection_delete", methods={"POST"})
     */
    public function delete(Request $request, Guitar $guitar, GuitarRepository $guitarRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$guitar->getId(), $request->request->get('_token'))) {
            $guitarRepository->remove($guitar);
        }

        return $this->redirectToRoute('app_back_office_collection_index', [], Response::HTTP_SEE_OTHER);
    }
}
