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

    #[Route('/album', name: 'app_album', methods: ['GET'])]
    public function listAlbums(EntityManagerInterface $entityManager): \Symfony\Component\HttpFoundation\Response
    {
        $albums = $entityManager->getRepository(Album::class)->findAll();

        return $this->render('album/index.html.twig', [
            'albums' => $albums,
        ]);
    }

    #[Route('/album/{id}', name: 'album_show', methods: ['GET'])]
    public function showAlbum(int $id, EntityManagerInterface $entityManager): \Symfony\Component\HttpFoundation\Response
    {
        $album = $entityManager->getRepository(Album::class)->find($id);

        if (!$album) {
            throw $this->createNotFoundException('Album not found');
        }

        return $this->render('album/show.html.twig', [
            'album' => $album,
        ]);
    }
}
