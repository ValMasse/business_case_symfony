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
        $admin1 = new Administrateur();
        $admin1->setPrenom("Jean-Jacques");
        $admin1->setNom("Silverman");
        $admin1->setEmail("jjsilverman@gmail.com");
        $admin1->setPassword(
            $this->encoder->encodePassword($admin1, "azerty")
        );
        $admin1->setRoles(["ROLE_ADMIN"]);
        // manque liste de test techniques et de questions

        $manager->persist($admin1);

        $manager->flush();
    }
}
