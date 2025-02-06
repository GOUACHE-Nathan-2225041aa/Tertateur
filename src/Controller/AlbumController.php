<?php
namespace App\Controller;

use App\Entity\Album;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlbumController extends AbstractController
{
    #[Route('/album/create', name: 'album_create_page', methods: ['GET'])]
    public function createAlbumPage(): Response
    {
        return $this->render('album/create.html.twig');
    }

    #[Route('/api/album', name: 'create_album', methods: ['POST'])]
    public function createAlbum(Request $request, EntityManagerInterface $entityManager, UserRepository $userRepository): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!isset($data['title'], $data['user_id'], $data['date_deb'], $data['date_fin'])) {
            return new JsonResponse(['error' => 'Missing title, user_id, date_deb or date_fin'], 400);
        }

        $user = $userRepository->find($data['user_id']);
        if (!$user) {
            return new JsonResponse(['error' => 'User not found'], 404);
        }

        try {
            $dateDeb = new \DateTimeImmutable($data['date_deb']);
            $dateFin = new \DateTimeImmutable($data['date_fin']);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Invalid date format. Use YYYY-MM-DD'], 400);
        }

        $album = new Album();
        $album->setTitle($data['title']);
        $album->setUser($user);
        $album->setDateDeb($dateDeb);
        $album->setDateFin($dateFin);

        $entityManager->persist($album);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Album created successfully'], 201);
    }
}
