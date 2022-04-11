<?php

namespace App\Controller\BackOffice;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeAdminController extends AbstractController
{
    /**
     * @Route("/back/office/home/admin", name="app_back_office_home_admin")
     */
    public function index(): Response
    {
        return $this->render('back_office/home_admin/index.html.twig', [
            'controller_name' => 'HomeAdminController',
        ]);
    }
}
