<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Horaire;
use Faker\Factory;

class HoraireFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        
        $horaire = new Horaire();
        $horaire->setOuverture($faker->time('H:i:s'));
        $horaire->setFermeture($faker->time('H:i:s'));
        $horaire->setJourSemaine($faker->dayOfWeek());

        
        $manager->persist($horaire);

        
        $manager->flush();
    }
}
