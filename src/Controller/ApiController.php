<?php

namespace App\Controller;

use App\Entity\Calendar;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/api", name="api")
     */
    public function index()
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }
    
    // La méthode PUT uniquement possible, pas de GET
    // elle permet de créer un évènement si celui-ci n'existe pas

    // Le ? --> récuperer un objet potentiel Calendar
    // --> Nous autorise à passer un id qui potentiellement n'existera pas
    /**
     * @Route("/api/{id}/edit", name="api_event_edit", methods={"PUT"})
     */
    public function majEvent(?Calendar $calendar, Request $request)
    {
        // On récupère les données
        $donnees = json_decode($request->getContent());

        // On vérifie qu"on a bien toutes les données !
        
        if(
            isset($donnees->title) && !empty($donnees->title) &&
            isset($donnees->start) && !empty($donnees->start) &&
            isset($donnees->description) && !empty($donnees->description) &&
            isset($donnees->backgroundColor) && !empty($donnees->backgroundColor) &&
            isset($donnees->borderColor) && !empty($donnees->borderColor) &&
            isset($donnees->textColor) && !empty($donnees->textColor)  
            )
        {
            // Les données sont complètes.
            $code = 200;

            // On vérifie si l'id existe
            if(!$calendar){
                // On instancie un rdv
                $calendar = new Calendar();

                // On change le code
                $code = 201;
            }

                // On hydrate l'objet avec nos données
                $calendar->setTitle($donnees->title);
            $calendar->setDescription($donnees->description);
            $calendar->setStart(new DateTime($donnees->start));
            if($donnees->allDay){
                $calendar->setEnd(new DateTime($donnees->start));
            }else{
                $calendar->setEnd(new DateTime($donnees->end));
            }
            $calendar->setAllDay($donnees->allDay);
            $calendar->setBacckgroundColor($donnees->backgroundColor);
            $calendar->setBorderColor($donnees->borderColor);
            $calendar->setTextColor($donnees->textColor);

                $em = $this->getDoctrine()->getManager();
                $em->persist($calendar);
                $em->flush();

                // On retourne le code
                return new Response('OK', $code);
            
        }
        else {
            // Les données ne sont pas complètes.
            return new Response('Données incomplètes', 404);
        }


    }
}
