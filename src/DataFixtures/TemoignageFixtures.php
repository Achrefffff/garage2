<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Temoignage;
use Faker\Factory;

class TemoignageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Initialize Faker
        $faker = Factory::create('fr_FR');

        // Generate 6 Temoignages
        for ($i = 0; $i < 10; $i++) {
            $temoignage = new Temoignage();

            // Generate a random name, surname, comment, and note
            $temoignage->setNom($faker->lastName());
            $temoignage->setPrenom($faker->firstName());
            $temoignage->setCommentaire($faker->paragraph(5));
            $temoignage->setNote($faker->numberBetween(1, 5));
            $temoignage->setIsValid($faker->boolean());

            // Persist the Temoignage
            $manager->persist($temoignage);
        }

        // Flush the manager
        $manager->flush();
    }
}
