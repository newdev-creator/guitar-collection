<?php

namespace App\Controller;

use App\Repository\GuitarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/collection", name="collection")
 */
class CollectionController extends AbstractController
{
    /**
     * @Route("/", name="_page", methods={"GET"})
     */
    public function collectionPage(GuitarRepository $guitarRepository): Response
    {
        // get all guitars
        $allGuitars = $guitarRepository->findAll();

        // dd($allGuitars);
        return $this->render('collection/collectionPage.html.twig', [
            'collection_page' => $allGuitars,
        ]);
    }
}
