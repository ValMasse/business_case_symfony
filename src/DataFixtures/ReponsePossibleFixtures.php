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
            // CONCERNE LA QUESTION 1
        $reponsePossible1 = new ReponsePossible();
        $reponsePossible1->setCode("001");
        $reponsePossible1->setIntitule("Java");
        $reponsePossible1->setEstJuste(false);
        $reponsePossible1->setEstActif(false);
        $reponsePossible1->setQuestion($this->questionRepository->findOneBy(1));
        $manager->persist($reponsePossible1);   
        
        $reponsePossible2 = new ReponsePossible();
        $reponsePossible2->setCode("002");
        $reponsePossible2->setIntitule("C#");
        $reponsePossible2->setEstJuste(false);
        $reponsePossible2->setEstActif(false);
        $reponsePossible2->setQuestion($this->questionRepository->findOneBy(1));
        $manager->persist($reponsePossible2);

        $reponsePossible3 = new ReponsePossible();
        $reponsePossible3->setCode("003");
        $reponsePossible3->setIntitule("PHP");
        $reponsePossible3->setEstJuste(true);
        $reponsePossible3->setEstActif(false);
        $reponsePossible3->setQuestion($this->questionRepository->findOneBy(1));
        $manager->persist($reponsePossible3);

        // CONCERNE LA QUESTION 2
        $reponsePossible4 = new ReponsePossible();
        $reponsePossible4->setCode("004");
        $reponsePossible4->setIntitule("Structured Query Langage");
        $reponsePossible4->setEstJuste(true);
        $reponsePossible4->setEstActif(false);
        $reponsePossible4->setQuestion($this->questionRepository->findOneBy(2));
        $manager->persist($reponsePossible4);   
        
        $reponsePossible5 = new ReponsePossible();
        $reponsePossible5->setCode("005");
        $reponsePossible5->setIntitule("Structured Queries Lang");
        $reponsePossible5->setEstJuste(false);
        $reponsePossible5->setEstActif(false);
        $reponsePossible5->setQuestion($this->questionRepository->findOneBy(2));
        $manager->persist($reponsePossible5);

        $reponsePossible6 = new ReponsePossible();
        $reponsePossible6->setCode("006");
        $reponsePossible6->setIntitule("Specific Query Langage");
        $reponsePossible6->setEstJuste(false);
        $reponsePossible6->setEstActif(false);
        $reponsePossible6->setQuestion($this->questionRepository->findOneBy(2));
        $manager->persist($reponsePossible6);

        // CONCERNE LA QUESTION 3
        $reponsePossible7 = new ReponsePossible();
        $reponsePossible7->setCode("007");
        $reponsePossible7->setIntitule("AQZSED");
        $reponsePossible7->setEstJuste(false);
        $reponsePossible7->setEstActif(false);
        $reponsePossible7->setQuestion($this->questionRepository->findOneBy(3));
        $manager->persist($reponsePossible7);   
        
        $reponsePossible8 = new ReponsePossible();
        $reponsePossible8->setCode("008");
        $reponsePossible8->setIntitule("QWERTY");
        $reponsePossible8->setEstJuste(false);
        $reponsePossible8->setEstActif(false);
        $reponsePossible8->setQuestion($this->questionRepository->findOneBy(3));
        $manager->persist($reponsePossible8);

        $reponsePossible9 = new ReponsePossible();
        $reponsePossible9->setCode("009");
        $reponsePossible9->setIntitule("AZERTY");
        $reponsePossible9->setEstJuste(true);
        $reponsePossible9->setEstActif(false);
        $reponsePossible9->setQuestion($this->questionRepository->findOneBy(3));
        $manager->persist($reponsePossible9);

        // CONCERNE LA QUESTION 4
        $reponsePossible10 = new ReponsePossible();
        $reponsePossible10->setCode("010");
        $reponsePossible10->setIntitule("Cascade sheet style");
        $reponsePossible10->setEstJuste(false);
        $reponsePossible10->setEstActif(false);
        $reponsePossible10->setQuestion($this->questionRepository->findOneBy(4));
        $manager->persist($reponsePossible10);   
        
        $reponsePossible11 = new ReponsePossible();
        $reponsePossible11->setCode("011");
        $reponsePossible11->setIntitule("Cascade Style Sheet");
        $reponsePossible11->setEstJuste(true);
        $reponsePossible11->setEstActif(false);
        $reponsePossible11->setQuestion($this->questionRepository->findOneBy(4));
        $manager->persist($reponsePossible11);

        $reponsePossible12 = new ReponsePossible();
        $reponsePossible12->setCode("012");
        $reponsePossible12->setIntitule("Custom Style Sheet");
        $reponsePossible12->setEstJuste(false);
        $reponsePossible12->setEstActif(false);
        $reponsePossible12->setQuestion($this->questionRepository->findOneBy(4));
        $manager->persist($reponsePossible12);

        // CONCERNE LA QUESTION 5
        $reponsePossible13 = new ReponsePossible();
        $reponsePossible13->setCode("013");
        $reponsePossible13->setIntitule("Windows Apache MySql Php");
        $reponsePossible13->setEstJuste(true);
        $reponsePossible13->setEstActif(false);
        $reponsePossible13->setQuestion($this->questionRepository->findOneBy(5));
        $manager->persist($reponsePossible13);   
        
        $reponsePossible14 = new ReponsePossible();
        $reponsePossible14->setCode("014");
        $reponsePossible14->setIntitule("Windows Answer MySql Php");
        $reponsePossible14->setEstJuste(false);
        $reponsePossible14->setEstActif(false);
        $reponsePossible14->setQuestion($this->questionRepository->findOneBy(5));
        $manager->persist($reponsePossible14);

        $reponsePossible15 = new ReponsePossible();
        $reponsePossible15->setCode("015");
        $reponsePossible15->setIntitule("Windows Apache Multimedia Php");
        $reponsePossible15->setEstJuste(false);
        $reponsePossible15->setEstActif(false);
        $reponsePossible15->setQuestion($this->questionRepository->findOneBy(5));
        $manager->persist($reponsePossible15);

        // CONCERNE LA QUESTION 6
        $reponsePossible16 = new ReponsePossible();
        $reponsePossible16->setCode("016");
        $reponsePossible16->setIntitule("Oui");
        $reponsePossible16->setEstJuste(true);
        $reponsePossible16->setEstActif(false);
        $reponsePossible16->setQuestion($this->questionRepository->findOneBy(6));
        $manager->persist($reponsePossible16);   
        
        $reponsePossible17 = new ReponsePossible();
        $reponsePossible17->setCode("017");
        $reponsePossible17->setIntitule("Non");
        $reponsePossible17->setEstJuste(false);
        $reponsePossible17->setEstActif(false);
        $reponsePossible17->setQuestion($this->questionRepository->findOneBy(6));
        $manager->persist($reponsePossible17);

        // CONCERNE LA QUESTION 7
        $reponsePossible18 = new ReponsePossible();
        $reponsePossible18->setCode("018");
        $reponsePossible18->setIntitule("TomEtJerry");
        $reponsePossible18->setEstJuste(false);
        $reponsePossible18->setEstActif(false);
        $reponsePossible18->setQuestion($this->questionRepository->findOneBy(7));
        $manager->persist($reponsePossible18);

        $reponsePossible19 = new ReponsePossible();
        $reponsePossible19->setCode("019");
        $reponsePossible19->setIntitule("Tom-Tom");
        $reponsePossible19->setEstJuste(false);
        $reponsePossible19->setEstActif(false);
        $reponsePossible19->setQuestion($this->questionRepository->findOneBy(7));
        $manager->persist($reponsePossible19);

        $reponsePossible20 = new ReponsePossible();
        $reponsePossible20->setCode("020");
        $reponsePossible20->setIntitule("Tomcat");
        $reponsePossible20->setEstJuste(true);
        $reponsePossible20->setEstActif(false);
        $reponsePossible20->setQuestion($this->questionRepository->findOneBy(7));
        $manager->persist($reponsePossible20);

        // CONCERNE LA QUESTION 8
        $reponsePossible21 = new ReponsePossible();
        $reponsePossible21->setCode("021");
        $reponsePossible21->setIntitule("Mark Zuckerberg");
        $reponsePossible21->setEstJuste(false);
        $reponsePossible21->setEstActif(false);
        $reponsePossible21->setQuestion($this->questionRepository->findOneBy(8));
        $manager->persist($reponsePossible21);

        $reponsePossible22 = new ReponsePossible();
        $reponsePossible22->setCode("022");
        $reponsePossible22->setIntitule("James Gosling");
        $reponsePossible22->setEstJuste(false);
        $reponsePossible22->setEstActif(false);
        $reponsePossible22->setQuestion($this->questionRepository->findOneBy(8));
        $manager->persist($reponsePossible22);

        $reponsePossible23 = new ReponsePossible();
        $reponsePossible23->setCode("023");
        $reponsePossible23->setIntitule("Steve Jobs");
        $reponsePossible23->setEstJuste(true);
        $reponsePossible23->setEstActif(false);
        $reponsePossible23->setQuestion($this->questionRepository->findOneBy(8));
        $manager->persist($reponsePossible23);

        // CONCERNE LA QUESTION 9
        $reponsePossible24 = new ReponsePossible();
        $reponsePossible24->setCode("024");
        $reponsePossible24->setIntitule("un hébergeur");
        $reponsePossible24->setEstJuste(false);
        $reponsePossible24->setEstActif(false);
        $reponsePossible24->setQuestion($this->questionRepository->findOneBy(9));
        $manager->persist($reponsePossible24);

        $reponsePossible25 = new ReponsePossible();
        $reponsePossible25->setCode("025");
        $reponsePossible25->setIntitule("une boite mail");
        $reponsePossible25->setEstJuste(false);
        $reponsePossible25->setEstActif(false);
        $reponsePossible25->setQuestion($this->questionRepository->findOneBy(9));
        $manager->persist($reponsePossible25);

        $reponsePossible26 = new ReponsePossible();
        $reponsePossible26->setCode("026");
        $reponsePossible26->setIntitule("Une plateforme d'apprentissage en ligne");
        $reponsePossible26->setEstJuste(true);
        $reponsePossible26->setEstActif(false);
        $reponsePossible26->setQuestion($this->questionRepository->findOneBy(9));
        $manager->persist($reponsePossible26);

        // CONCERNE LA QUESTION 10
        $reponsePossible27 = new ReponsePossible();
        $reponsePossible27->setCode("027");
        $reponsePossible27->setIntitule("un système de gestion de contenu");
        $reponsePossible27->setEstJuste(true);
        $reponsePossible27->setEstActif(false);
        $reponsePossible27->setQuestion($this->questionRepository->findOneBy(10));
        $manager->persist($reponsePossible27);

        $reponsePossible28 = new ReponsePossible();
        $reponsePossible28->setCode("028");
        $reponsePossible28->setIntitule("un système de gestion de base de données");
        $reponsePossible28->setEstJuste(false);
        $reponsePossible28->setEstActif(false);
        $reponsePossible28->setQuestion($this->questionRepository->findOneBy(10));
        $manager->persist($reponsePossible28);

        $reponsePossible29 = new ReponsePossible();
        $reponsePossible29->setCode("029");
        $reponsePossible29->setIntitule("un langage de programmation");
        $reponsePossible29->setEstJuste(false);
        $reponsePossible29->setEstActif(false);
        $reponsePossible29->setQuestion($this->questionRepository->findOneBy(10));
        $manager->persist($reponsePossible29);

        // CONCERNE LA QUESTION 11
        $reponsePossible30 = new ReponsePossible();
        $reponsePossible30->setCode("030");
        $reponsePossible30->setIntitule("world web wide");
        $reponsePossible30->setEstJuste(false);
        $reponsePossible30->setEstActif(false);
        $reponsePossible30->setQuestion($this->questionRepository->findOneBy(11));
        $manager->persist($reponsePossible30);

        $reponsePossible31 = new ReponsePossible();
        $reponsePossible31->setCode("031");
        $reponsePossible31->setIntitule("world wide web");
        $reponsePossible31->setEstJuste(true);
        $reponsePossible31->setEstActif(false);
        $reponsePossible31->setQuestion($this->questionRepository->findOneBy(11));
        $manager->persist($reponsePossible31);

        $reponsePossible32 = new ReponsePossible();
        $reponsePossible32->setCode("032");
        $reponsePossible32->setIntitule("wide web world");
        $reponsePossible32->setEstJuste(false);
        $reponsePossible32->setEstActif(false);
        $reponsePossible32->setQuestion($this->questionRepository->findOneBy(11));
        $manager->persist($reponsePossible32);

        // CONCERNE LA QUESTION 12
        $reponsePossible33 = new ReponsePossible();
        $reponsePossible33->setCode("033");
        $reponsePossible33->setIntitule("hyper protocole text processus");
        $reponsePossible33->setEstJuste(false);
        $reponsePossible33->setEstActif(false);
        $reponsePossible33->setQuestion($this->questionRepository->findOneBy(12));
        $manager->persist($reponsePossible33);

        $reponsePossible34 = new ReponsePossible();
        $reponsePossible34->setCode("034");
        $reponsePossible34->setIntitule("hypertext transfer proctocol");
        $reponsePossible34->setEstJuste(true);
        $reponsePossible34->setEstActif(false);
        $reponsePossible34->setQuestion($this->questionRepository->findOneBy(12));
        $manager->persist($reponsePossible34);

        $reponsePossible35 = new ReponsePossible();
        $reponsePossible35->setCode("035");
        $reponsePossible35->setIntitule("hypertext trade processus");
        $reponsePossible35->setEstJuste(false);
        $reponsePossible35->setEstActif(false);
        $reponsePossible35->setQuestion($this->questionRepository->findOneBy(12));
        $manager->persist($reponsePossible35);

        // CONCERNE LA QUESTION 13
        $reponsePossible36 = new ReponsePossible();
        $reponsePossible36->setCode("036");
        $reponsePossible36->setIntitule("oui");
        $reponsePossible36->setEstJuste(false);
        $reponsePossible36->setEstActif(false);
        $reponsePossible36->setQuestion($this->questionRepository->findOneBy(13));
        $manager->persist($reponsePossible36);

        $reponsePossible37 = new ReponsePossible();
        $reponsePossible37->setCode("037");
        $reponsePossible37->setIntitule("non");
        $reponsePossible37->setEstJuste(true);
        $reponsePossible37->setEstActif(false);
        $reponsePossible37->setQuestion($this->questionRepository->findOneBy(13));
        $manager->persist($reponsePossible37);

        // CONCERNE LA QUESTION 14        
        $reponsePossible38 = new ReponsePossible();
        $reponsePossible38->setCode("038");
        $reponsePossible38->setIntitule("elles sont identiques");
        $reponsePossible38->setEstJuste(false);
        $reponsePossible38->setEstActif(false);
        $reponsePossible38->setQuestion($this->questionRepository->findOneBy(14));
        $manager->persist($reponsePossible38);

        $reponsePossible39 = new ReponsePossible();
        $reponsePossible39->setCode("039");
        $reponsePossible39->setIntitule("post permet de recuperer une donnée, get de l'envoyer");
        $reponsePossible39->setEstJuste(false);
        $reponsePossible39->setEstActif(false);
        $reponsePossible39->setQuestion($this->questionRepository->findOneBy(14));
        $manager->persist($reponsePossible39);

        $reponsePossible40 = new ReponsePossible();
        $reponsePossible40->setCode("040");
        $reponsePossible40->setIntitule("post permet de recuperer une donnée, get de l'envoyer");
        $reponsePossible40->setEstJuste(true);
        $reponsePossible40->setEstActif(false);
        $reponsePossible40->setQuestion($this->questionRepository->findOneBy(14));
        $manager->persist($reponsePossible40);

        // CONCERNE LA QUESTION 15        
        $reponsePossible41 = new ReponsePossible();
        $reponsePossible41->setCode("041");
        $reponsePossible41->setIntitule("hypertext markup langage");
        $reponsePossible41->setEstJuste(true);
        $reponsePossible41->setEstActif(false);
        $reponsePossible41->setQuestion($this->questionRepository->findOneBy(15));
        $manager->persist($reponsePossible41);

        $reponsePossible42 = new ReponsePossible();
        $reponsePossible42->setCode("042");
        $reponsePossible42->setIntitule("hyperlien markup langage");
        $reponsePossible42->setEstJuste(false);
        $reponsePossible42->setEstActif(false);
        $reponsePossible42->setQuestion($this->questionRepository->findOneBy(15));
        $manager->persist($reponsePossible42);

        $reponsePossible43 = new ReponsePossible();
        $reponsePossible43->setCode("043");
        $reponsePossible43->setIntitule("hypertetxt media langage");
        $reponsePossible43->setEstJuste(false);
        $reponsePossible43->setEstActif(false);
        $reponsePossible43->setQuestion($this->questionRepository->findOneBy(15));
        $manager->persist($reponsePossible43);

        // CONCERNE LA QUESTION 16        
        $reponsePossible44 = new ReponsePossible();
        $reponsePossible44->setCode("044");
        $reponsePossible44->setIntitule("java");
        $reponsePossible44->setEstJuste(false);
        $reponsePossible44->setEstActif(false);
        $reponsePossible44->setQuestion($this->questionRepository->findOneBy(16));
        $manager->persist($reponsePossible44);

        $reponsePossible45 = new ReponsePossible();
        $reponsePossible45->setCode("045");
        $reponsePossible45->setIntitule("javascript");
        $reponsePossible45->setEstJuste(true);
        $reponsePossible45->setEstActif(false);
        $reponsePossible45->setQuestion($this->questionRepository->findOneBy(16));
        $manager->persist($reponsePossible45);

        $reponsePossible46 = new ReponsePossible();
        $reponsePossible46->setCode("046");
        $reponsePossible46->setIntitule("C++");
        $reponsePossible46->setEstJuste(false);
        $reponsePossible46->setEstActif(false);
        $reponsePossible46->setQuestion($this->questionRepository->findOneBy(16));
        $manager->persist($reponsePossible46);

        // CONCERNE LA QUESTION 17        
        $reponsePossible47 = new ReponsePossible();
        $reponsePossible47->setCode("047");
        $reponsePossible47->setIntitule("java");
        $reponsePossible47->setEstJuste(false);
        $reponsePossible47->setEstActif(false);
        $reponsePossible47->setQuestion($this->questionRepository->findOneBy(17));
        $manager->persist($reponsePossible47);

        $reponsePossible48 = new ReponsePossible();
        $reponsePossible48->setCode("048");
        $reponsePossible48->setIntitule("PHP");
        $reponsePossible48->setEstJuste(true);
        $reponsePossible48->setEstActif(false);
        $reponsePossible48->setQuestion($this->questionRepository->findOneBy(17));
        $manager->persist($reponsePossible48);

        // CONCERNE LA QUESTION 18
        $reponsePossible49 = new ReponsePossible();
        $reponsePossible49->setCode("049");
        $reponsePossible49->setIntitule("une entreprise");
        $reponsePossible49->setEstJuste(false);
        $reponsePossible49->setEstActif(false);
        $reponsePossible49->setQuestion($this->questionRepository->findOneBy(18));
        $manager->persist($reponsePossible49);

        $reponsePossible50 = new ReponsePossible();
        $reponsePossible50->setCode("050");
        $reponsePossible50->setIntitule("un organisme");
        $reponsePossible50->setEstJuste(true);
        $reponsePossible50->setEstActif(false);
        $reponsePossible50->setQuestion($this->questionRepository->findOneBy(18));
        $manager->persist($reponsePossible50);

        // CONCERNE LA QUESTION 19
        $reponsePossible51 = new ReponsePossible();
        $reponsePossible51->setCode("051");
        $reponsePossible51->setIntitule("un langage");
        $reponsePossible51->setEstJuste(false);
        $reponsePossible51->setEstActif(false);
        $reponsePossible51->setQuestion($this->questionRepository->findOneBy(19));
        $manager->persist($reponsePossible51);

        $reponsePossible52 = new ReponsePossible();
        $reponsePossible52->setCode("052");
        $reponsePossible52->setIntitule("un navigateur");
        $reponsePossible52->setEstJuste(true);
        $reponsePossible52->setEstActif(false);
        $reponsePossible52->setQuestion($this->questionRepository->findOneBy(19));
        $manager->persist($reponsePossible52);

        // CONCERNE LA QUESTION 20
        $reponsePossible53 = new ReponsePossible();
        $reponsePossible53->setCode("053");
        $reponsePossible53->setIntitule("oui");
        $reponsePossible53->setEstJuste(true);
        $reponsePossible53->setEstActif(false);
        $reponsePossible53->setQuestion($this->questionRepository->findOneBy(20));
        $manager->persist($reponsePossible51);

        $reponsePossible54 = new ReponsePossible();
        $reponsePossible54->setCode("054");
        $reponsePossible54->setIntitule("non");
        $reponsePossible54->setEstJuste(false);
        $reponsePossible54->setEstActif(false);
        $reponsePossible54->setQuestion($this->questionRepository->findOneBy(20));
        $manager->persist($reponsePossible54);

        $manager->flush();
    }

    public function getDependencies() : array
    {
        return [
            QuestionFixtures::class,
        ];
    }
}
