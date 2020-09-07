<?php

namespace App\DataFixtures;

use App\Entity\Niveau;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NiveauFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $niveau1 = new Niveau();
        $niveau1->setIntitule("Basique");
        $manager->persist($niveau1);

        $niveau2 = new Niveau();
        $niveau2->setIntitule("Intermédiaire");
        $manager->persist($niveau2);

        $niveau3 = new Niveau();
        $niveau3->setIntitule("Avancé");
        $manager->persist($niveau3);

        $manager->flush();
    }
}
