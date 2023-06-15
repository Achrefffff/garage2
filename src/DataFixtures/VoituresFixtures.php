<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Voiture;
use Faker\Factory;
use Symfony\Component\HttpFoundation\File\File;

class VoituresFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');


        $imageFiles = glob('public/images/voitures/*');

        for ($i = 0; $i < 10; $i++) {
            $voiture = new Voiture();

            $voiture->setPrix($faker->randomFloat(2, 5000, 50000));
            $voiture->setDateCirculation($faker->date());
            $voiture->setKilometrage($faker->numberBetween(1000, 50000));
            $voiture->setCaracteristiques($faker->paragraph());
            $voiture->setEquipement($faker->sentence());
            $voiture->setOptions($faker->sentence());
            $voiture->setNom($faker->word());

            
            $randomImageFile = $faker->randomElement($imageFiles);

            
            $imageName = basename($randomImageFile);

            $voiture->setImageName($imageName);
            $voiture->setImageFile(new File($randomImageFile));

            $manager->persist($voiture);
        }

        $manager->flush();
    }
}
