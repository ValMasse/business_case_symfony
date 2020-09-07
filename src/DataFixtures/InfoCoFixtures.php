<?php

namespace App\DataFixtures;

use App\Entity\InfoCo;
use App\Repository\AdresseRepository;
use App\Repository\SessionRepository;
use App\Repository\TestTechniqueRepository;
use App\Repository\UserRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class InfoCoFixtures extends Fixture implements DependentFixtureInterface
{
    private $adresseRepository;
    private $userRepository;
    private $sessionRepository;
    private $testTechniqueRepository;

    public function __construct(AdresseRepository $adresseRepository,
                                UserRepository $userRepository,
                                SessionRepository $sessionRepository,
                                TestTechniqueRepository $testTechniqueRepository) {
        $this->adresseRepository = $adresseRepository;
        $this->userRepository = $userRepository;
        $this->sessionRepository = $sessionRepository;
        $this->testTechniqueRepository = $testTechniqueRepository;
    }
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        $users = $this->userRepository->findAll();

        for($i = 0; $i < 15; $i++){        
        $infoCo1 = new InfoCo();
        $infoCo1->setDate($faker->dateTimeBetween("- 1 year", "now"));
        $infoCo1->setAdresse($this->adresseRepository->find(random_int(1, 3)));
        $infoCo1->setSession($this->sessionRepository->find(random_int(1, 3)));
        // vérifier nombre de tests techinques en BDD
        $infoCo1->setTestTechnique($this->testTechniqueRepository->find(random_int(1, 10)));
        $manager->persist($infoCo1);
    }

        $manager->flush();

    
    }

    public function getDependencies() : array
    {
        return [
            AdresseFixtures::class,
            UserFixtures::class,
            SessionFixtures::class,
            TestTechniqueFixtures::class
        ];
    }
}
