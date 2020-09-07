<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FormationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $formation1 = new Formation();
        $formation1->setIntitule("Concepteur Développeur d'Applications");
        $manager->persist($formation1);

        $formation2 = new Formation();
        $formation2->setIntitule("Développeur Web");
        $manager->persist($formation2);

        $formation3 = new Formation();
        $formation3->setIntitule("Développeur Back-End");
        $manager->persist($formation3);

        $formation4 = new Formation();
        $formation4->setIntitule("Développeur Front-End");
        $manager->persist($formation4);

        $manager->flush();
    }
}
