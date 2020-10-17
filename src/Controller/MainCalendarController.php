<?php

namespace App\Controller;

use App\Repository\CalendarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainCalendarController extends AbstractController
{
    /**
     * @Route("/main/calendar", name="main_calendar")
     */
    public function display(CalendarRepository $calendarRepository)
    {
        $events = $calendarRepository->findAll();

        $rdvs = [];

        foreach($events as $event){
            $rdvs[] = [
                'id' => $event->getId(),
                'start' => $event->getStart()->format('Y-m-d H:i:s'),
                'end' => $event->getEnd()->format('Y-m-d H:i:s'),
                'title' => $event->getTitle(),
                'description' => $event->getDescription(),
                'backgroundColor' => $event->getBacckgroundColor(),
                'borderColor' => $event->getBorderColor(),
                'textColor' => $event->getTextColor(),
                'allDay' => $event->getAllDay(),
            ]; 
        }

        $data = json_encode($rdvs);
        
        return $this->render('main_calendar/index.html.twig', compact('data'));
    }
}
