<?php

namespace App\DataFixtures;

use App\Entity\Question;
use App\Repository\DomaineRepository;
use App\Repository\NiveauRepository;
use App\Repository\TestTechniqueRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class QuestionFixtures extends Fixture implements DependentFixtureInterface
{

    private $domaineRepository;
    private $niveauRepository;
    private $testTechniqueRepository;

    public function __construct(DomaineRepository $domaineRepository,
                                NiveauRepository $niveauRepository,
                                TestTechniqueRepository $testTechniqueRepository) {
        $this->domaineRepository = $domaineRepository;
        $this->niveauRepository = $niveauRepository;
        $this->testTechniqueRepository = $testTechniqueRepository;
    }

    public function load(ObjectManager $manager)
    {       
        $question1 = new Question();
        $question1->setEnonce("Symfony est framework comportant quel langage?");
        $question1->setEstEliminatoire((bool)random_int(0, 1));
        $question1->setEstActif(false);
        $question1->setDomaine($this->domaineRepository->find(2));
        $question1->setNiveau($this->niveauRepository->find(2));
        $question1->setTestTechnique($this->testTechniqueRepository->find(1));
        $manager->persist($question1);        

        $question2 = new Question();
        $question2->setEnonce("Que signifie le sigle SQL?");
        $question2->setEstEliminatoire(false);
        $question2->setEstActif(false);
        $question2->setDomaine($this->domaineRepository->find(2));
        $question2->setNiveau($this->niveauRepository->find(2));
        $question2->setTestTechnique($this->testTechniqueRepository->find(2));
        $manager->persist($question2); 

        $question3 = new Question();
        $question3->setEnonce("Quelles sont les dispositions des touches pour un clavier français?");
        $question3->setEstEliminatoire(true);
        $question3->setEstActif(false);
        $question3->setDomaine($this->domaineRepository->find(4));
        $question3->setNiveau($this->niveauRepository->find(1));
        $question3->setTestTechnique($this->testTechniqueRepository->find(3));
        $manager->persist($question3); 

        $question4 = new Question();
        $question4->setEnonce("Que signifie CSS?");
        $question4->setEstEliminatoire(true);
        $question4->setEstActif(false);
        $question4->setDomaine($this->domaineRepository->find(1));
        $question4->setNiveau($this->niveauRepository->find(1));
        $question4->setTestTechnique($this->testTechniqueRepository->find(4));
        $manager->persist($question4); 

        $question5 = new Question();
        $question5->setEnonce("Que signifie les lettres WAMP?");
        $question5->setEstEliminatoire(false);
        $question5->setEstActif(false);
        $question5->setDomaine($this->domaineRepository->find(2));
        $question5->setNiveau($this->niveauRepository->find(3));
        $question5->setTestTechnique($this->testTechniqueRepository->find(5));
        $manager->persist($question5); 

        $question6 = new Question();
        $question6->setEnonce("Java est il un langage typé?");
        $question6->setEstEliminatoire(false);
        $question6->setEstActif(false);
        $question6->setDomaine($this->domaineRepository->find(2));
        $question6->setNiveau($this->niveauRepository->find(1));
        $question6->setTestTechnique($this->testTechniqueRepository->find(6));
        $manager->persist($question6); 

        $question7 = new Question();
        $question7->setEnonce("Quel est le nom du serveur embarqué de l'IDE Eclipse?");
        $question7->setEstEliminatoire(false);
        $question7->setEstActif(false);
        $question7->setDomaine($this->domaineRepository->find(2));
        $question7->setNiveau($this->niveauRepository->find(3));
        $question7->setTestTechnique($this->testTechniqueRepository->find(7));
        $manager->persist($question7); 

        $question8 = new Question();
        $question8->setEnonce("Qui est le créateur du langage JAVA?");
        $question8->setEstEliminatoire(false);
        $question8->setEstActif(false);
        $question8->setDomaine($this->domaineRepository->find(2));
        $question8->setNiveau($this->niveauRepository->find(1));
        $question8->setTestTechnique($this->testTechniqueRepository->find(8));
        $manager->persist($question8);

        $question9 = new Question();
        $question9->setEnonce("Qu'est ce que Moodle?");
        $question9->setEstEliminatoire(false);
        $question9->setEstActif(false);
        $question9->setDomaine($this->domaineRepository->find(3));
        $question9->setNiveau($this->niveauRepository->find(1));
        $question9->setTestTechnique($this->testTechniqueRepository->find(9));
        $manager->persist($question9);

        $question10 = new Question();
        $question10->setEnonce("Qu'apelle t-on Wordpress?");
        $question10->setEstEliminatoire(false);
        $question10->setEstActif(false);
        $question10->setDomaine($this->domaineRepository->find(3));
        $question10->setNiveau($this->niveauRepository->find(1));
        $question10->setTestTechnique($this->testTechniqueRepository->find(10));
        $manager->persist($question10);

        $question11 = new Question();
        $question11->setEnonce("Sur internet, que signifie www?");
        $question11->setEstEliminatoire(false);
        $question11->setEstActif(false);
        $question11->setDomaine($this->domaineRepository->find(3));
        $question11->setNiveau($this->niveauRepository->find(1));
        $question11->setTestTechnique($this->testTechniqueRepository->find(1));
        $manager->persist($question11); 

        $question12 = new Question();
        $question12->setEnonce("Sur internet, que signifie HTTP?");
        $question12->setEstEliminatoire(true);
        $question12->setEstActif(false);
        $question12->setDomaine($this->domaineRepository->find(3));
        $question12->setNiveau($this->niveauRepository->find(2));
        $question12->setTestTechnique($this->testTechniqueRepository->find(2));
        $manager->persist($question12); 

        $question13 = new Question();
        $question13->setEnonce("Les langages Java et Javascript sont des choses identiques?");
        $question13->setEstEliminatoire(false);
        $question13->setEstActif(false);
        $question13->setDomaine($this->domaineRepository->find(4));
        $question13->setNiveau($this->niveauRepository->find(1));
        $question13->setTestTechnique($this->testTechniqueRepository->find(3));
        $manager->persist($question13); 

        $question14 = new Question();
        $question14->setEnonce("Quelle est la différence entre les méthodes GET et POST?");
        $question14->setEstEliminatoire(false);
        $question14->setEstActif(false);
        $question14->setDomaine($this->domaineRepository->find(2));
        $question14->setNiveau($this->niveauRepository->find(2));
        $question14->setTestTechnique($this->testTechniqueRepository->find(4));
        $manager->persist($question14); 

        $question15 = new Question();
        $question15->setEnonce("Que signifie HTML?");
        $question15->setEstEliminatoire(false);
        $question15->setEstActif(false);
        $question15->setDomaine($this->domaineRepository->find(1));
        $question15->setNiveau($this->niveauRepository->find(3));
        $question15->setTestTechnique($this->testTechniqueRepository->find(5));
        $manager->persist($question15); 

        $question16 = new Question();
        $question16->setEnonce("Angular est un framework qui concerne quel langage?");
        $question16->setEstEliminatoire(false);
        $question16->setEstActif(false);
        $question16->setDomaine($this->domaineRepository->find(1));
        $question16->setNiveau($this->niveauRepository->find(3));
        $question16->setTestTechnique($this->testTechniqueRepository->find(6));
        $manager->persist($question16); 

        $question17 = new Question();
        $question17->setEnonce("Lequel de ces langages est le plus ancien, PHP ou bien JAVA?");
        $question17->setEstEliminatoire(false);
        $question17->setEstActif(false);
        $question17->setDomaine($this->domaineRepository->find(2));
        $question17->setNiveau($this->niveauRepository->find(2));
        $question17->setTestTechnique($this->testTechniqueRepository->find(7));
        $manager->persist($question17);

        $question18 = new Question();
        $question18->setEnonce("Le W3C est une entreprise ou un organisme?");
        $question18->setEstEliminatoire(false);
        $question18->setEstActif(false);
        $question18->setDomaine($this->domaineRepository->find(3));
        $question18->setNiveau($this->niveauRepository->find(2));
        $question18->setTestTechnique($this->testTechniqueRepository->find(8));
        $manager->persist($question18);

        $question19 = new Question();
        $question19->setEnonce("Opera est langage de programmation, ou bien un navigateur?");
        $question19->setEstEliminatoire(false);
        $question19->setEstActif(false);
        $question19->setDomaine($this->domaineRepository->find(4));
        $question19->setNiveau($this->niveauRepository->find(1));
        $question19->setTestTechnique($this->testTechniqueRepository->find(9));
        $manager->persist($question19);

        $question20 = new Question();
        $question20->setEnonce("Java est un langage orienté Objet?");
        $question20->setEstEliminatoire(false);
        $question20->setEstActif(false);
        $question20->setDomaine($this->domaineRepository->find(2));
        $question20->setNiveau($this->niveauRepository->find(2));
        $question20->setTestTechnique($this->testTechniqueRepository->find(10));
        $manager->persist($question20);

        $manager->flush();

    }

    public function getDependencies() : array
    {
        return [
            DomaineFixtures::class,
            NiveauFixtures::class,
            TestTechniqueFixtures::class
        ];
    }
}
