<?php

namespace App\DataFixtures;

use App\Entity\Adresse;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AdresseFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $adresse1 = new Adresse();
        $adresse1->setLigne1("23 rue Crepet");
        $adresse1->setCodePostal("69007");
        $adresse1->setCommune("Lyon");
        $manager->persist($adresse1);

        $adresse2 = new Adresse();
        $adresse2->setLigne1("15 avenue des frères Montgolfier");
        $adresse2->setCodePostal("63170");
        $adresse2->setCommune("Aubière");
        $manager->persist($adresse2);

        $adresse3 = new Adresse();
        $adresse3->setLigne1("47 avenue des Alpes");
        $adresse3->setCodePostal("38000");
        $adresse3->setCommune("Grenoble");
        $manager->persist($adresse3);

        // Manque liste d'infos co

        $manager->flush();
    }
}
