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

    public function assertHasErrors(User $userTest, int $number = 0){

        self::bootKernel();
        $error = self::$container->get('validator')->validate($userTest);
        $this->assertCount($number, $error);
    }

    public function testValidEntity() {

        $this->assertHasErrors($this->getEntity(), 0);       
    }

    public function testInvalidEntity() {

        $this->assertHasErrors($this->getEntity()->setEmail('jeanjacques#gmail.com'), 1);
        $this->assertHasErrors($this->getEntity()->setTelephone('0601020304X'), 1);
        $this->assertHasErrors($this->getEntity()->setNumeroPE('12345678910'), 1);    
    }
}