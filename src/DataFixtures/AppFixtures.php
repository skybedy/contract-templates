<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\SignatureAuthenticity;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i = 0; $i < 50; $i++) {
            
            $signature = new SignatureAuthenticity();
           
            $signature->setName($faker->firstName);
           
            $signature->setLastname($faker->lastName);
           
            $birthDate = $faker->dateTimeBetween('-65 years', '-18 years');
           
            $birthDateFormatted = $birthDate->format('Y-m-d');
           
            $signature->setBirthdate(new \DateTime($birthDateFormatted));
           
            $signature->setBirthplace($faker->city);
           
            $signature->setZip($faker->randomNumber(5, true));

            $signature->setStreet($faker->streetName.' '.$faker->randomNumber(2, true));

            $signature->setCity($faker->city);

            $signature->setProofOfIdentity($faker->randomNumber(8, true));

            $manager->persist($signature);
        }
       
        $manager->flush();
   
    }
}
