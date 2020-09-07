<?php

namespace App\DataFixtures;

use App\Entity\VilleSession;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VilleSessionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // VILLESESSION N°1
        $villeSession1 = new VilleSession();
        $villeSession1->setNom("Lyon");
        $manager->persist($villeSession1);

        // VILLESESSION N°2
        $villeSession2 = new VilleSession();
        $villeSession2->setNom("Grenoble");
        $manager->persist($villeSession2);

        // VILLESESSION N°3
        $villeSession3 = new VilleSession();
        $villeSession3->setNom("Saint-Etienne");
        $manager->persist($villeSession3);

        // VILLESESSION N°4
        $villeSession4 = new VilleSession();
        $villeSession4->setNom("Clermont-Ferrand");
        $manager->persist($villeSession4);

        $manager->flush();
    }
}
