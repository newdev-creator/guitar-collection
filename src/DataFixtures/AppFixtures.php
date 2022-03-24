<?php

namespace App\DataFixtures;

use App\DataFixtures\Provider\GuitarCollectionProvider;
use App\Entity\Guitar;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $entityManager): void
    {
        $faker = Factory::create();
        $faker->addProvider(new GuitarCollectionProvider($faker));

        $guitarList = [];
        for ($guitarNumber=0; $guitarNumber < 20; $guitarNumber++) { 
            $guitar = new Guitar();
            $guitar->setName($faker->guitarName());
            $guitar->setYear($faker->year);
            $guitar->setAcquisitionAt($faker->acquisitionAt);
            $guitar->setDominationHang($faker->dominationHang);
            $guitar->setNbString($faker->nbString);
            $guitar->setFixation($faker->fixation);
            $guitar->setCreatedAt($faker->createdAt);
            $guitar->setUpdatedAt($faker->updatedAt);
            $entityManager->persist($guitar);
            $guitarList[] = $guitar;
        }

        $entityManager->flush();
    }
}
