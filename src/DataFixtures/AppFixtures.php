<?php 


namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use App\Entity\User;
use Faker\Factory;


class AppFixtures extends Fixture
{   
    private UserPasswordHasherInterface $hasher;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }
    

    public function load(ObjectManager $manager): void
    {   

        $faker=Factory::create('fr_FR');

        $admin = new User();
        $admin->setEmail('V.parrot@garage.ecf');
        $admin->setNom('Parrot');
        $admin->setPrenom('Vincent');
        $admin->setPassword($this->hasher->hashPassword($admin, '123456'));
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        for ($i = 1; $i <= 5; $i++) {
            $user = new User();
            $user->setEmail($faker->Email());
            $user->setNom($faker->lastname());
            $user->setPrenom($faker->firstName());
            $user->setPassword($this->hasher->hashPassword($user, 'password'));
            $user->setRoles(['ROLE_USER']);
            $manager->persist($user);
        }

        $manager->flush();
    }
}
