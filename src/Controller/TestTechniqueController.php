<?php

namespace App\Controller;

use App\Entity\TestTechnique;
use App\Form\TestTechniqueType;
use App\Repository\QuestionRepository;
use App\Repository\TestTechniqueRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/test/technique")
 */
class TestTechniqueController extends AbstractController
{
    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/", name="test_technique_index", methods={"GET"})
     */
    public function index(TestTechniqueRepository $testTechniqueRepository): Response
    {
        return $this->render('test_technique/index.html.twig', [
            'test_techniques' => $testTechniqueRepository->findAll(),
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/new", name="test_technique_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $testTechnique = new TestTechnique();
        $form = $this->createForm(TestTechniqueType::class, $testTechnique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($testTechnique);
            $entityManager->flush();

            return $this->redirectToRoute('test_technique_index');
        }

        return $this->render('test_technique/new.html.twig', [
            'test_technique' => $testTechnique,
            'form' => $form->createView(),
        ]);
    }
            // Fonction pour afficher la liste des questions dispo pour les tests techniques
    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/{id}", name="test_technique_show", methods={"GET"})
     */
    public function show(TestTechnique $testTechnique, QuestionRepository $questionRepository): Response
    {
        return $this->render('test_technique/show.html.twig', [
            'test_technique' => $testTechnique,
            'questions' => $questionRepository->findAll(),
            //'questionsComps' => $questionRepository->findQuestionsForEachTest(),
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/{id}/edit", name="test_technique_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TestTechnique $testTechnique, QuestionRepository $questionRepository): Response
    {
        $form = $this->createForm(TestTechniqueType::class, $testTechnique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('test_technique_index');
        }

        return $this->render('test_technique/edit.html.twig', [
            'test_technique' => $testTechnique,
            'form' => $form->createView(),
            'questions' => $questionRepository->findAll(),
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/{id}", name="test_technique_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TestTechnique $testTechnique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$testTechnique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($testTechnique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('test_technique_index');
    }
}
