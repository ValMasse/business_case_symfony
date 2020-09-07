<?php

namespace App\DataFixtures;

use App\Entity\Domaine;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DomaineFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $domaine1 = new Domaine();
        $domaine1->setIntitule("Front-End");
        $domaine1->setPosition("1");
        $domaine1->setRatioMinimum(0.2);
        $manager->persist($domaine1);

        $domaine2 = new Domaine();
        $domaine2->setIntitule("Back-End");
        $domaine2->setPosition("2");
        $domaine2->setRatioMinimum(0.7);
        $manager->persist($domaine2);

        $domaine3 = new Domaine();
        $domaine3->setIntitule("culture numérique");
        $domaine3->setPosition("3");
        $domaine3->setRatioMinimum(0.1);
        $manager->persist($domaine3);

        $domaine4 = new Domaine();
        $domaine4->setIntitule("");
        $domaine4->setPosition("4");
        $domaine4->setRatioMinimum(0.2);
        $manager->persist($domaine4);

        // manque liste de questions

        $manager->flush();
    }
}
