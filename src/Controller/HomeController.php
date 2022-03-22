<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/home", name="app_home")
 */
class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homePage")
     */
    public function homePage(): Response
    {
        return $this->render('home/homePage.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
