<?php
namespace App\Controller;

use App\Entity\Album;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class AlbumController extends AbstractController
{
    #[Route('/album/create', name: 'album_create_page', methods: ['GET'])]
    public function createAlbumPage(): \Symfony\Component\HttpFoundation\Response
    {
        return $this->render('album/create.html.twig');
    }
}
