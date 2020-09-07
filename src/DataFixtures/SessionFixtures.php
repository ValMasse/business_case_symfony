<?php

namespace App\DataFixtures;

use App\Entity\Session;
use App\Repository\ChefProjetRepository;
use App\Repository\FormationRepository;
use App\Repository\InfoCoRepository;
use App\Repository\VilleSessionRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SessionFixtures extends Fixture implements DependentFixtureInterface
{
    private $villeSessionRepository;
    private $formationRepository;
    private $infoCoRepository;
    private $chefProjetRepository;
    

    public function __construct(VilleSessionRepository $villeSessionRepository,
                                FormationRepository $formationRepository,
                                InfoCoRepository $infoCoRepository,
                                ChefProjetRepository $chefProjetRepository) {
        $this->villeSessionRepository = $villeSessionRepository;
        $this->formationRepository = $formationRepository;
        $this->infoCoRepository = $infoCoRepository;
        $this->chefProjetRepository = $chefProjetRepository;
    }

    public function load(ObjectManager $manager)
    {
        for($i = 0; $i < 10; $i++){        
        $session = new Session();
        $session->setNumero(random_int(1, 10));
        $session->setVilleSession($this->villeSessionRepository->find((random_int(1, 10))));
        $session->setFormation($this->formationRepository->find((random_int(1, 4))));
        // manque liste d'infoCo
        $session->setChefProjet($this->chefProjetRepository->find((random_int(1, 2))));
        $manager->persist($session);
        }
        

        $manager->flush();
    }

    public function getDependencies() : array
    {
        return [
            VilleSessionFixtures::class,
            FormationFixtures::class,
            InfoCoFixtures::class,
            ChefProjetFixtures::class
        ];
    }
}
