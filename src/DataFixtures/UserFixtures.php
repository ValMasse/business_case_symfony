<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        // Create some students
        $faker = Factory::create('fr_FR');

        for($i = 0; $i < 60; $i++){        
        $user = new User;
        $user->setFirstname($faker->firstName);
        $user->setLastname($faker->lastName);
        $user->setEmail($faker->email);        
        $user->setPassword(
            $this->encoder->encodePassword($user, "123456")
        );
        $user->setDateDeNaissance($faker->dateTimeBetween("- 60 year", "- 20 year"));
        $user->setTelephone($faker->phonenumber);
        $user->setNumeroPE(random_int(1000000000, 9999999999));
        $user->setCommentaire("");
        $user->setRoles(["ROLE_USER"]);
        $manager->persist($user);
        }
        
        // Create an Admin user
        $userAdmin = new User();
        $userAdmin->setEmail("admin@admin.com");
        $userAdmin->setFirstname("John");
        $userAdmin->setLastname("Doe");
        $userAdmin->setPassword(
            $this->encoder->encodePassword($userAdmin, "admin@admin.com")
        );
        $userAdmin->setRoles(["ROLE_ADMIN"]);
        $manager->persist($userAdmin);

        $manager->flush();

        // Create an ChefDeProjet user
        $userchefProjet = new User();
        $userchefProjet->setEmail("charleneducreux@humanbooster.com");
        $userchefProjet->setFirstname("Charlène");
        $userchefProjet->setLastname("Ducreux");
        $userchefProjet->setPassword(
            $this->encoder->encodePassword($userchefProjet, "charleneducreux@humanbooster.com")
        );
        $userchefProjet->setRoles(["ROLE_CHEFPROJET"]);
        $manager->persist($userchefProjet);

        $manager->flush();
    }

}
