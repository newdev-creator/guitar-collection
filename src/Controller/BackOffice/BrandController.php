<?php

namespace App\Controller\BackOffice;

use App\Entity\Brand;
use App\Form\BrandType;
use App\Repository\BrandRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/backOffice/brand", name="back_office_brand")
 */
class BrandController extends AbstractController
{
    /**
     * @Route("/", name="_browse", methods={"GET"})
     */
    public function browse(BrandRepository $brandRepository): Response
    {
        return $this->render('back_office/brand/browse.html.twig', [
            'brands' => $brandRepository->findAll(),
        ]);
    }

    /**
     * @Route("/read/{id}", name="_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Brand $brand): Response
    {

        // $this->denyAccessUnlessGranted('BRAND_VIEW', $brand);

        return $this->render('back_office/brand/read.html.twig', [
            'brand' => $brand,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Brand $brand, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {

        // $this->denyAccessUnlessGranted('BRAND_EDIT', $brand);

        $form = $this->createForm(BrandType::class, $brand);
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

                $brand->setImage($newFilename);
            }

            $brand->setUpdatedAt(new DateTimeImmutable());
            $entityManager->flush();

            $this->addFlash('success', "La marque à bien été modifiée");

            // $brandRepository->add($brand);
            return $this->redirectToRoute('back_office_brand_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back_office/brand/edit.html.twig', [
            'brand' => $brand,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/add", name="_add", methods={"GET", "POST"})
     */
    public function add(Request $request, BrandRepository $brandRepository, EntityManagerInterface $entityManager): Response
    {
        $brand = new Brand();
        $form = $this->createForm(BrandType::class, $brand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $brandRepository->add($brand);
            return $this->redirectToRoute('back_office_brand_browse', [], Response::HTTP_SEE_OTHER);
        }

        $entityManager->flush();
        $this->addFlash('success', "La marque a été créée");

        return $this->renderForm('back_office/brand/add.html.twig', [
            'brand' => $brand,
            'form' => $form,
        ]);
    }

    /**
     * @Route("delete/{id}", name="_delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Brand $brand, BrandRepository $brandRepository, EntityManagerInterface $entityManager): Response
    {

        // $this->denyAccessUnlessGranted('BRAND_DELETE', $brand);
        if ($this->isCsrfTokenValid('delete'.$brand->getId(), $request->request->get('_token'))) {
            $brandRepository->remove($brand);
        }

        $entityManager->flush();
        $this->addFlash('success', "La marque a été supprimée");

        return $this->redirectToRoute('back_office_brand_browse', [], Response::HTTP_SEE_OTHER);
    }
}
