<?php
namespace App\Controller;

use App\Entity\Photo;
use App\Entity\Album;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Vich\UploaderBundle\Handler\UploadHandler;

class PhotoController extends AbstractController
{
    #[Route('/api/photos', name: 'upload_photo', methods: ['POST'])]
    public function uploadPhoto(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        // Récupérer l'album via l'ID passé dans la requête
        $albumId = $request->get('album');
        $album = $entityManager->getRepository(Album::class)->find($albumId);

        if (!$album) {
            return new JsonResponse(['error' => 'Album not found'], 404);
        }

        // Récupérer le fichier téléchargé
        $file = $request->files->get('file');
        if (!$file instanceof UploadedFile) {
            return new JsonResponse(['error' => 'No valid file uploaded'], 400);
        }

        // Créer une nouvelle instance de Photo
        $photo = new Photo();
        $photo->setAlbum($album);
        $photo->setFile($file);  // Déclenche l'upload avec VichUploader

        // Sauvegarder la photo dans la base de données
        $entityManager->persist($photo);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Photo uploaded successfully'], 201);
    }
}
