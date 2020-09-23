<?php

namespace App\DataFixtures;

use App\Entity\TestTechnique;
use App\Repository\AdministrateurRepository;
use App\Repository\QuestionRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class TestTechniqueFixtures extends Fixture implements DependentFixtureInterface
{

    private $administrateurRepository;
    private $questionRepository;

    public function __construct(AdministrateurRepository $administrateurRepository,
                                QuestionRepository $questionRepository) {
        $this->administrateurRepository = $administrateurRepository;
        $this->questionRepository = $questionRepository;
    }

    public function load(ObjectManager $manager)
    {
        $questions = $this->questionRepository->findAll();

        $faker = Factory::create('fr_FR');

        for($i = 1; $i < 11; $i++){        
        $testTechnique = new TestTechnique();
        $testTechnique->setAdministrateur($this->administrateurRepository->find(random_int(1, 2)));
        $testTechnique->setDate($faker->dateTimeBetween("- 1 year", "now"));
        $testTechnique->setIntitule("Test Technique N° $i");
        // MANQUE LISTE DE QUESTIONS DONC DOMAINES ETC ...
        $testTechnique->addQuestion($questions[array_rand($questions)]);
        $manager->persist($testTechnique);
        }
        $manager->flush();
    }

    public function getDependencies() : array
    {
        return [
            AdministrateurFixtures::class,
            QuestionFixtures::class
        ];
    }
}
