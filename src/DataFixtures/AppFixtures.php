<?php

namespace App\DataFixtures;

use App\Entity\Album;
use App\Entity\Photo;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 5; $i++) {
            $user = New User();

            $user->setDescription($faker->realText(500))
                ->setPseudo($faker->userName())
                ->setPhotoProfil($faker->image());

            $manager->persist($user);

            // Pour chaque utilisateur, créer entre 1 et 3 albums
            $numberOfAlbums = rand(1, 3); // 1 à 3 albums par utilisateur
            for ($j = 0; $j < $numberOfAlbums; $j++) {
                $album = new Album();
                $album->setDateDeb($faker->dateTimeInInterval('-1 day', '-1 week'));
                $album->setDateFin($faker->dateTimeInInterval('+1 day', '+1 week'));
                $album->setUser($user);

                $manager->persist($album);

                $numberOfPictures = rand(1, 5); // 1 à 3 photos par album
                for ($j = 0; $j < $numberOfPictures; $j++) {
                    $photo = new Photo();
                    $photo->setAlbum($album)
                        ->setContenu($faker->image());

                    $manager->persist($photo);
                }
            }

            $album = New Album();
        }
        $manager->flush();
    }
}
