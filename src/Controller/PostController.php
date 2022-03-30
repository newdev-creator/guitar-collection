<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/post", name="post")
 */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="_page", methods={"GET"})
     */
    public function postPage(PostRepository $postRepository, CategoryRepository $categoryRepository): Response
    {
        // get all posts by order desc
        $allPosts = $postRepository->findBy([], ['id' => 'DESC']);
        // get all categories
        $categories = $categoryRepository->findAll();
        
        // dd($allPosts);
        return $this->render('post/post.html.twig', [
            'post_page' => $allPosts,
            'categories' => $categories,
        ]);
    }

    /**
     * @Route("/{id}", name="_show", methods={"GET"})
     */
    public function show(PostRepository $postRepository, $id): Response
    {
        // get post by id
        $post = $postRepository->find($id);
        // get category name
        $categoryName = $post->getCategory()->getName();

        // dd($post);
        return $this->render('post/postShow.html.twig', [
            'post_show' => $post,
            'category_name' => $categoryName,
        ]);
    }

    /**
     * @Route("/categories/{id}", name="_show_category", methods={"GET"})
     */
    public function showCategory(CategoryRepository $categoryRepository, PostRepository $postRepository, $id): Response
    {
        // get all categories
        $categories = $categoryRepository->findAll();
        // get all posts by category id order desc
        $posts = $postRepository->findBy(['category' => $id], ['id' => 'DESC']);
        // get category name
        $categoryName = $categoryRepository->find($id)->getName();

        // dd ($categories, $posts);
        return $this->render('post/postShowCategory.html.twig', [
            'categories' => $categories,
            'posts' => $posts,
            'category_name' => $categoryName,
        ]);
    }
}
