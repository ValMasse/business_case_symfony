<?php

namespace App\DataFixtures;

use App\Entity\TestTechnique;
use App\Repository\AdministrateurRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class TestTechniqueFixtures extends Fixture implements DependentFixtureInterface
{

    private $administrateurRepository;

    public function __construct(AdministrateurRepository $administrateurRepository) {
        $this->administrateurRepository = $administrateurRepository;
    }

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 10; $i++){        
        $testTechnique = new TestTechnique();
        $testTechnique->setAdministrateur($this->administrateurRepository->find(random_int(1, 2)));
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
