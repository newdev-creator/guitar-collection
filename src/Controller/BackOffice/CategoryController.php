<?php

namespace App\Controller\BackOffice;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/backOffice/category", name="back_office_category")
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="_browse", methods={"GET"})
     */
    public function browse(CategoryRepository $categoryRepository): Response
    {
        return $this->render('back_office/category/browse.html.twig', [
            'categorys' => $categoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/read/{id}", name="_read", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function read(Category $category): Response
    {

        // $this->denyAccessUnlessGranted('CATEGORY_VIEW', $category);

        return $this->render('back_office/category/read.html.twig', [
            'category' => $category,
        ]);
    }

    /**
     * @Route("/edit/{id}", name="_edit", methods={"GET", "POST"}, requirements={"id"="\d+"})
     */
    public function edit(Request $request, Category $category, EntityManagerInterface $entityManager, SluggerInterface $slugger): Response
    {

        // $this->denyAccessUnlessGranted('CATEGORY_EDIT', $category);

        $form = $this->createForm(CategoryType::class, $category);
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

                $category->setImage($newFilename);
            }

            $entityManager->flush();

            $this->addFlash('success', "La marque à bien été modifiée");

            // $categoryRepository->add($category);
            return $this->redirectToRoute('back_office_category_browse', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back_office/category/edit.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/add", name="_add", methods={"GET", "POST"})
     */
    public function add(Request $request, CategoryRepository $categoryRepository, EntityManagerInterface $entityManager): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categoryRepository->add($category);
            return $this->redirectToRoute('back_office_category_browse', [], Response::HTTP_SEE_OTHER);
        }

        $entityManager->flush();
        $this->addFlash('success', "La categorie a été créée");

        return $this->renderForm('back_office/category/add.html.twig', [
            'category' => $category,
            'form' => $form,
        ]);
    }

    /**
     * @Route("delete/{id}", name="_delete", methods={"POST"}, requirements={"id"="\d+"})
     */
    public function delete(Request $request, Category $category, CategoryRepository $categoryRepository, EntityManagerInterface $entityManager): Response
    {

        // $this->denyAccessUnlessGranted('CATEGORY_DELETE', $category);
        if ($this->isCsrfTokenValid('delete'.$category->getId(), $request->request->get('_token'))) {
            $categoryRepository->remove($category);
        }

        $entityManager->flush();
        $this->addFlash('success', "La categorie a été supprimée");

        return $this->redirectToRoute('back_office_category_browse', [], Response::HTTP_SEE_OTHER);
    }
}
