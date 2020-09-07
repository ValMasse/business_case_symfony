<?php

namespace App\DataFixtures;

use App\Entity\Question;
use App\Repository\DomaineRepository;
use App\Repository\NiveauRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuestionFixtures extends Fixture implements DependentFixtureInterface
{

    private $domaineRepository;
    private $niveauRepository;

    public function __construct(DomaineRepository $domaineRepository,
                                NiveauRepository $niveauRepository) {
        $this->domaineRepository = $domaineRepository;
        $this->niveauRepository = $niveauRepository;
    }

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 10; $i++){        
        $question = new Question();
        $question->setPosition($i);
        $question->setEnonce("bla bla bla");
        $question->setEstEliminatoire((bool)random_int(0, 1));
        $question->setEstActif(false);
        $question->setDomaine($this->domaineRepository->find(random_int(1, 4)));
        $question->setNiveau($this->niveauRepository->find(random_int(1, 3)));
        $manager->persist($question);        }

        $manager->flush();

    }

    public function getDependencies() : array
    {
        return [
            DomaineFixtures::class,
            NiveauFixtures::class,
        ];
    }
}
