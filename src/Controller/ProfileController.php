<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile', methods: 'get')]
    public function index(userRepository $userRepository): Response
    {
        // get connected user
        $user = $this->getUser();

        // get guitar's number of user
        $guitars = $userRepository->findGuitarNumber($user);
        $guitarNumber = count($guitars);
        return $this->render('profile/index.html.twig', [
            'profile_page' => $user,
            'guitars' => $guitarNumber,
        ]);
    }
}
