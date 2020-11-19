<?php

namespace App\Tests\Entity;

use App\Entity\User;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase {

    // Permet de récuperer une entité (ici = user)
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

    // Prend en paramètres l'Entité + le nbre d'erreurs, par défaut on ne s'attend à aucune erreur
    public function assertHasErrors(User $userTest, int $number = 0){
        
        self::bootKernel();
        //Permet de valider l'objet
        $error = self::$container->get('validator')->validate($userTest);
        
        // assertion : vérifie qu'une affirmation soit vraie
        $this->assertCount($number, $error);
    }

    public function testValidEntity() {
        // Je m'attends à ce que sur cet objet, il n'y ait aucune erreur
        $this->assertHasErrors($this->getEntity(), 0);       
    }

    public function testInvalidEntity() {
        // Je définis volontairement plusieurs erreurs afin de réaliser mon test
        $this->assertHasErrors($this->getEntity()->setEmail('jeanjacques#gmail.com'), 1);
        $this->assertHasErrors($this->getEntity()->setTelephone('0601020304X'), 1);
        $this->assertHasErrors($this->getEntity()->setNumeroPE('12345678910'), 1);    
    }
}