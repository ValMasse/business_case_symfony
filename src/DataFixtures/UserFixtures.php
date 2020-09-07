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

    public function __construct2(UserPasswordEncoderInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $user1 = new User;
        $user1->setFirstname($faker->firstNameMale || $faker->firstNameFemale);
        $user1->setLastname($faker->lastName);
        $user1->setEmail($faker->email);        
        $user1->setPassword(
            $this->encoder->encodePassword($user1, "123456")
        );
        $user1->setDateDeNaissance($faker->dateTimeBetween("- 60 year", "- 20 year"));
        $user1->setTelephone($faker->phonenumber);
        $user1->setNumeroPE(random_int(1000000000, 9999999999));
        $user1->setRoles(["ROLE_USER"]);   

        $manager->flush();
    }

}
