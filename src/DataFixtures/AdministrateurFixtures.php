<?php

namespace App\DataFixtures;

use App\Entity\Administrateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class AdministrateurFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // ADMIN N°1
        $admin1 = new Administrateur();
        $admin1->setPrenom("Jean-Jacques");
        $admin1->setNom("Silverman");
        $admin1->setEmail("jjsilverman@gmail.com");
        $admin1->setPassword(
            $this->encoder->encodePassword($admin1, "azerty")
        );
        $admin1->setRoles(["ROLE_ADMIN"]);
        $manager->persist($admin1);

        // ADMIN N°2
        $admin2 = new Administrateur();
        $admin2->setPrenom("valentin");
        $admin2->setNom("masse");
        $admin2->setEmail("valmasse@gmail.com");
        $admin2->setPassword(
            $this->encoder->encodePassword($admin1, "azerty2")
        );
        $admin2->setRoles(["ROLE_ADMIN"]);
        $manager->persist($admin2);

        $manager->flush();
    }
}
