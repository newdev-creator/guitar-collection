<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/", name="home")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="_Page", methods={"GET"})
     */
    public function homePage(PostRepository $postRepository): Response
    {
        // get 6 last post
        $allPosts = $postRepository
        ->findBy([], ['id' => 'DESC'], 6);

        // dd($allPosts);
        return $this->render('home/homePage.html.twig', [
            'home_page' => $allPosts,
        ]);
    }
}