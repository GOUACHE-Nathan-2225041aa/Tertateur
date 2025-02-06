<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class WelcomeController extends AbstractController
{
    #[Route('/welcome', name: 'welcome')]
    public function index(): Response
    {
        return $this->render('welcome/index.html.twig', [
            'user' => $this->getUser(),
        ]);
    }
}
