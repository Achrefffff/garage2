<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Services;
use Faker\Factory;

class ServicesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        
        $faker = Factory::create('fr_FR');

        
        for ($i = 0; $i <6; $i++) {
            $service = new Services();

            
            $service->setTitre($faker->words(3, true));
            $service->setDescription($faker->paragraph(5));

            
            $manager->persist($service);
        }

        
        $manager->flush();
    }
}
