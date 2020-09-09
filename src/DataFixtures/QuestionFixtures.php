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
        $question1 = new Question();
        $question1->setPosition(1);
        $question1->setEnonce("");
        $question1->setEstEliminatoire((bool)random_int(0, 1));
        $question1->setEstActif(false);
        $question1->setDomaine($this->domaineRepository->find(random_int(1, 4)));
        $question1->setNiveau($this->niveauRepository->find(random_int(1, 3)));
        $manager->persist($question1);        

        $question2 = new Question();
        $question2->setPosition(2);
        $question2->setEnonce("Que signifie le sigle SQL?");
        $question2->setEstEliminatoire(false);
        $question2->setEstActif(false);
        $question2->setDomaine($this->domaineRepository->find(2));
        $question2->setNiveau($this->niveauRepository->find(1));
        $manager->persist($question2); 

        $question3 = new Question();
        $question3->setPosition(3);
        $question3->setEnonce("Que signifie le sigle SQL?");
        $question3->setEstEliminatoire(false);
        $question3->setEstActif(false);
        $question3->setDomaine($this->domaineRepository->find(2));
        $question3->setNiveau($this->niveauRepository->find(1));
        $manager->persist($question3); 

        $question4 = new Question();
        $question4->setPosition(4);
        $question4->setEnonce("Que signifie le sigle SQL?");
        $question4->setEstEliminatoire(false);
        $question4->setEstActif(false);
        $question4->setDomaine($this->domaineRepository->find(2));
        $question4->setNiveau($this->niveauRepository->find(1));
        $manager->persist($question4); 

        $question5 = new Question();
        $question5->setPosition(5);
        $question5->setEnonce("Que signifie le sigle SQL?");
        $question5->setEstEliminatoire(false);
        $question5->setEstActif(false);
        $question5->setDomaine($this->domaineRepository->find(2));
        $question5->setNiveau($this->niveauRepository->find(1));
        $manager->persist($question5); 

        $question6 = new Question();
        $question6->setPosition(6);
        $question6->setEnonce("Que signifie le sigle SQL?");
        $question6->setEstEliminatoire(false);
        $question6->setEstActif(false);
        $question6->setDomaine($this->domaineRepository->find(2));
        $question6->setNiveau($this->niveauRepository->find(1));
        $manager->persist($question6); 

        $question7 = new Question();
        $question7->setPosition(7);
        $question7->setEnonce("Que signifie le sigle SQL?");
        $question7->setEstEliminatoire(false);
        $question7->setEstActif(false);
        $question7->setDomaine($this->domaineRepository->find(2));
        $question7->setNiveau($this->niveauRepository->find(1));
        $manager->persist($question7); 

        $question8 = new Question();
        $question8->setPosition(8);
        $question8->setEnonce("Que signifie le sigle SQL?");
        $question8->setEstEliminatoire(false);
        $question8->setEstActif(false);
        $question8->setDomaine($this->domaineRepository->find(2));
        $question8->setNiveau($this->niveauRepository->find(1));
        $manager->persist($question8);

        $question9 = new Question();
        $question9->setPosition(9);
        $question9->setEnonce("Que signifie le sigle SQL?");
        $question9->setEstEliminatoire(false);
        $question9->setEstActif(false);
        $question9->setDomaine($this->domaineRepository->find(2));
        $question9->setNiveau($this->niveauRepository->find(1));
        $manager->persist($question9);

        $question10 = new Question();
        $question10->setPosition(10);
        $question10->setEnonce("Que signifie le sigle SQL?");
        $question10->setEstEliminatoire(false);
        $question10->setEstActif(false);
        $question10->setDomaine($this->domaineRepository->find(2));
        $question10->setNiveau($this->niveauRepository->find(1));
        $manager->persist($question10);

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
