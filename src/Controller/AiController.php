<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AiController extends AbstractController
{
    #[Route('/ai', name: 'app_ai')]
    public function index(): Response
    {
        return $this->render('ai/index.html.twig', [
            'controller_name' => 'AiController',
        ]);
    }
}
