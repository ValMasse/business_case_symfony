<?php

namespace App\DataFixtures;

use App\Entity\ReponsePossible;
use App\Repository\QuestionRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ReponsePossibleFixtures extends Fixture implements DependentFixtureInterface
{

    private $questionRepository;

    public function __construct(QuestionRepository $questionRepository) {
        $this->questionRepository = $questionRepository;
    }
    
    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 60; $i++){        
        $reponsePossible = new ReponsePossible();
        $reponsePossible->setCode($i);
        $reponsePossible->setIntitule("réponse possible N° $i");
        $reponsePossible->setEstJuste((bool)random_int(0, 1));
        $reponsePossible->setEstActif(false);
        $reponsePossible->setQuestion($this->questionRepository->find(random_int(1, 10)));
        $manager->persist($reponsePossible);
        }        

        $manager->flush();
    }

    public function getDependencies() : array
    {
        return [
            QuestionFixtures::class,
        ];
    }
}
