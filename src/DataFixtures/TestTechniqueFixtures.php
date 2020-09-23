<?php

namespace App\DataFixtures;

use App\Entity\TestTechnique;
use App\Repository\AdministrateurRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class TestTechniqueFixtures extends Fixture implements DependentFixtureInterface
{

    private $administrateurRepository;

    public function __construct(AdministrateurRepository $administrateurRepository) {
        $this->administrateurRepository = $administrateurRepository;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for($i = 1; $i < 11; $i++){        
        $testTechnique = new TestTechnique();
        $testTechnique->setAdministrateur($this->administrateurRepository->find(random_int(1, 2)));
        $testTechnique->setDate($faker->dateTimeBetween("- 1 year", "now"));
        $testTechnique->setIntitule("Test Technique N° $i");
        $manager->persist($testTechnique);
        }
        $manager->flush();
    }

    public function getDependencies() : array
    {
        return [
            AdministrateurFixtures::class,
        ];
    }
}
