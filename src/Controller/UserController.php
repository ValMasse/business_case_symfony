<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_USER")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/profile", name="user_profile")
     */
    
    public function profile() : Response
    {
        return $this->render('user/profile.html.twig');
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/profileAdmin", name="user_profile_admin")
     */
    
    public function profileAdmin() : Response
    {
        return $this->render('user/profileAdmin.html.twig');
    }

    /**
     * @IsGranted("ROLE_CHEFPROJET")
     * @Route("/profileChefProjet", name="user_profile_chefProjet")
     */
    
    public function profileChefProjet() : Response
    {
        return $this->render('user/profileChefProjet.html.twig');
    }
}
