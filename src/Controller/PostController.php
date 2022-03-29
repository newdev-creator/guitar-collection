<?php

namespace App\Controller;

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
    public function postPage(PostRepository $postRepository): Response
    {
        // get all posts by order desc
        $allPosts = $postRepository->findBy([], ['id' => 'DESC']);

        // dd($allPosts);
        return $this->render('post/post.html.twig', [
            'post_page' => $allPosts,
        ]);
    }

    /**
     * @Route("/{id}", name="_show", methods={"GET"})
     */
    public function show(PostRepository $postRepository, $id): Response
    {
        // get post by id
        $post = $postRepository->find($id);

        // dd($post);
        return $this->render('post/postShow.html.twig', [
            'post_show' => $post,
        ]);
    }
}
