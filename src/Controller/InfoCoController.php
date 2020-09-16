<?php

namespace App\Controller;

use App\Entity\InfoCo;
use App\Form\InfoCoType;
use App\Repository\InfoCoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/info/co")
 */
class InfoCoController extends AbstractController
{
    /**
     * @Route("/", name="info_co_index", methods={"GET"})
     */
    public function index(InfoCoRepository $infoCoRepository): Response
    {
        return $this->render('info_co/index.html.twig', [
            'info_cos' => $infoCoRepository->findAll(),
        ]);
    }

    /**
     * @IsGranted("ROLE_CHEFPROJET")
     * @Route("/new", name="info_co_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $infoCo = new InfoCo();
        $form = $this->createForm(InfoCoType::class, $infoCo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($infoCo);
            $entityManager->flush();

            return $this->redirectToRoute('info_co_index');
        }

        return $this->render('info_co/new.html.twig', [
            'info_co' => $infoCo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_CHEFPROJET")
     * @Route("/{id}", name="info_co_show", methods={"GET"})
     */
    public function show(InfoCo $infoCo): Response
    {
        return $this->render('info_co/show.html.twig', [
            'info_co' => $infoCo,
        ]);
    }

    /**
     * @IsGranted("ROLE_CHEFPROJET")
     * @Route("/{id}/edit", name="info_co_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, InfoCo $infoCo): Response
    {
        $form = $this->createForm(InfoCoType::class, $infoCo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('info_co_index');
        }

        return $this->render('info_co/edit.html.twig', [
            'info_co' => $infoCo,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_CHEFPROJET")
     * @Route("/{id}", name="info_co_delete", methods={"DELETE"})
     */
    public function delete(Request $request, InfoCo $infoCo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$infoCo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($infoCo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('info_co_index');
    }
}
