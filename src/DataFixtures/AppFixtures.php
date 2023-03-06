<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Employe;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $employe = new Employe();
            $employe->setNom($faker->lastName());
            $employe->setPrenom($faker->firstName());
            $manager->persist($employe);
        }

        $manager->flush();
    }
}
