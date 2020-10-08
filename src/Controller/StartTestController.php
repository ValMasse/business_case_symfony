<?php

namespace App\Controller;

use App\Repository\TestTechniqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class StartTestController extends AbstractController
{
    /**
     * @IsGranted("ROLE_USER")
     * @Route("/start", name="start_test_index")
     */
    public function index()
    {
        return $this->render('start_test/index.html.twig', [
            'controller_name' => 'StartTestController',
        ]);
    }

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/start/test", name="start_test", methods={"GET","POST"})
     */
    public function start(Request $request, TestTechniqueRepository $testTechniqueRepository)
    {
        return $this->render('start_test/startTest.html.twig', [
            'tests_techniques' => $testTechniqueRepository->findAll(),
        ]);
    }
}
