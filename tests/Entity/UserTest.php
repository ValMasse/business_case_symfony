<?php

namespace App\Tests\Entity;

use App\Entity\User;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase {

    // Permet de récuperer une entité (user)
    public function getEntity(): User {

        return (new User())
        ->setEmail('jeanjacques@gmail.com')
        ->setRoles(['ROLE_USER'])
        ->setPassword('123456')
        ->setFirstname('Jean-Jacques')
        ->setLastname('Petit')
        ->setDateDeNaissance(new DateTime())
        ->setTelephone('0601020304')
        ->setNumeroPE('123456789C')
        ->setCommentaire('');
    }

    public function testValidEntity() {

        $userTest = $this->getEntity();
        self::bootKernel();
        $error = self::$container->get('validator')->validate($userTest);
        $this->assertCount(0, $error);
    }

    public function testInvalidEntity() {

        $userTest = $this->getEntity()->setEmail('jeanjacques#gmail.com')
        ->setTelephone('0601020304X')
        ->setNumeroPE('12345678910')
        ->setCommentaire('');

        self::bootKernel();
        $error = self::$container->get('validator')->validate($userTest);
        $this->assertCount(3, $error);
    }
}