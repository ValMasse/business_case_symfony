<?php

namespace App\Tests\Entity;

use App\Entity\User;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase {



    public function testValidEntity() {

        $userTest = (new User())
        ->setEmail('jeanjacques@gmail.com')
        ->setRoles(['ROLE_USER'])
        ->setPassword('123456')
        ->setFirstname('Jean-Jacques')
        ->setLastname('Petit')
        ->setDateDeNaissance(new DateTime())
        ->setTelephone('0601020304')
        ->setNumeroPE('111111111A')
        ->setCommentaire('');

        self::bootKernel();
        $error = self::$container->get('validator')->validate($userTest);
        $this->assertCount(0, $error);
    }

    public function testInvalidEntity() {

        $userTest = (new User())
        ->setEmail('jeanjacques@gmail.com')
        ->setRoles(['ROLE_USER'])
        ->setPassword('123456')
        ->setFirstname('Jean-Jacques')
        ->setLastname('Petit')
        ->setDateDeNaissance(new DateTime())
        ->setTelephone('06010203045')
        ->setNumeroPE('111111111A')
        ->setCommentaire('');

        self::bootKernel();
        $error = self::$container->get('validator')->validate($userTest);
        $this->assertCount(1, $error);
    }
}