<?php

namespace App\Controller;

use App\Repository\BrandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/brand", name="brand")
 */
class BrandController extends AbstractController
{
    /**
     * @Route("/", name="_page", methods={"GET"})
     */
    public function brandPage(BrandRepository $brandRepository): Response
    {
        // get all brands
        $allBrands = $brandRepository->findAll();

        // dd($allBrands);
        return $this->render('brand/brandPage.html.twig', [
            'brand_page' => $allBrands,
        ]);
    }

    /**
     * @Route("/{id}", name="_show", methods={"GET"})
     */
    public function show(BrandRepository $brandRepository, $id): Response
    {
        // get brand by id
        $brand = $brandRepository->find($id);
        $guitars = $brand->getGuitars();
        // get all brands
        $allBrands = $brandRepository->findAll();
        
        // dd($brand, $guitars, $allBrandImages);
        return $this->render('brand/brandShow.html.twig', [
            'brand_show' => $brand,
            'guitars' => $guitars,
            'all_brands' => $allBrands,
        ]);
    }
}
