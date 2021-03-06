<?php

namespace App\DataFixtures;

use App\Entity\ChefProjet;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class ChefProjetFixtures extends Fixture
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // CHEF PROJET N°1
        $chefProjet1 = new ChefProjet();
        $chefProjet1->setPrenom("Emilie");
        $chefProjet1->setNom("Dupuis");
        $chefProjet1->setEmail("emiliedupuis@humanbooster.com");
        $chefProjet1->setPassword(
            $this->encoder->encodePassword($chefProjet1, "qwerty")
        );
        $chefProjet1->setRoles(["ROLE_CHEFPROJET"]);
        $manager->persist($chefProjet1);

        // CHEF PROJET N°2
        $chefProjet2 = new ChefProjet();
        $chefProjet2->setPrenom("Amandine");
        $chefProjet2->setNom("Goujon");
        $chefProjet2->setEmail("amandinegoujon@humanbooster.com");
        $chefProjet2->setPassword(
            $this->encoder->encodePassword($chefProjet2, "qwerty2")
        );
        $chefProjet2->setRoles(["ROLE_CHEFPROJET"]);
        $manager->persist($chefProjet2);

        $manager->flush();
    }
}
