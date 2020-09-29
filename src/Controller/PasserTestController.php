<?php

namespace App\Controller;

use App\Repository\TestTechniqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class PasserTestController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/passer/test", name="passer_test")
     */
    public function index()
    {
        return $this->render('passer_test/accueil.html.twig', [
            'controller_name' => 'PasserTestController',
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/passer/test/start", name="start_test", methods={"GET","POST"})
     */
    public function start(Request $request, TestTechniqueRepository $testTechniqueRepository)
    {
        return $this->render('passer_test/start.html.twig', [
            'tests_techniques' => $testTechniqueRepository->findAll(),
        ]);
    }

}
