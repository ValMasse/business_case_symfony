<?php

namespace App\Controller;

use App\Entity\Calendar;
use App\Form\CalendarType;
use App\Repository\CalendarRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_CHEFPROJET")
 * @Route("/calendar")
 */
class CalendarController extends AbstractController
{
    /**
     * @Route("/", name="calendar_index", methods={"GET"})
     */
    public function index(CalendarRepository $calendarRepository): Response
    {
        return $this->render('calendar/index.html.twig', [
            'calendars' => $calendarRepository->findAll(),
        ]);
    }

    /**
     * @Route("/calendar_display", name="calendar_home", methods={"GET"})
     */
    public function calendarDisplay(CalendarRepository $calendarRepository): Response
    {
        $events = $calendarRepository->findAll();

        $rdvs = [];

        foreach($events as $event){
            $rdvs[] = [
                'id' => $event->getId(),
                'start' => $event->getStart()->format('d-M-Y H:i:s'),
                'end' => $event->getEnd()->format('d-M-Y H:i:s'),
                'title' => $event->getTitle(),
                'comment' => $event->getComment(),
                'backgroundColor' => $event->getBackgroundColor(),
                'borderColor' => $event->getBorderColor(),
                'textColor' => $event->getTextColor(),
                'allDay' => $event->getAllDay(),
            ]; 
        }

        $data = json_encode($rdvs);

        return $this->render('calendar/calendar.html.twig', compact('data'));
    }

    /**
     * @Route("/new", name="calendar_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $calendar = new Calendar();
        $form = $this->createForm(CalendarType::class, $calendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($calendar);
            $entityManager->flush();

            return $this->redirectToRoute('calendar_index');
        }

        return $this->render('calendar/new.html.twig', [
            'calendar' => $calendar,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="calendar_show", methods={"GET"})
     */
    public function show(Calendar $calendar): Response
    {
        return $this->render('calendar/show.html.twig', [
            'calendar' => $calendar,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="calendar_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Calendar $calendar): Response
    {
        $form = $this->createForm(CalendarType::class, $calendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('calendar_index');
        }

        return $this->render('calendar/edit.html.twig', [
            'calendar' => $calendar,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="calendar_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Calendar $calendar): Response
    {
        if ($this->isCsrfTokenValid('delete'.$calendar->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($calendar);
            $entityManager->flush();
        }

        return $this->redirectToRoute('calendar_index');
    }
}
