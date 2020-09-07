<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FormationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // FORMATION N°1
        $formation1 = new Formation();
        $formation1->setIntitule("Concepteur Développeur d'Applications");
        $manager->persist($formation1);

        // FORMATION N°2
        $formation2 = new Formation();
        $formation2->setIntitule("Développeur Web");
        $manager->persist($formation2);

        // FORMATION N°3
        $formation3 = new Formation();
        $formation3->setIntitule("Développeur Back-End");
        $manager->persist($formation3);

        // FORMATION N°4
        $formation4 = new Formation();
        $formation4->setIntitule("Développeur Front-End");
        $manager->persist($formation4);

        $manager->flush();
    }
}
