<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\AdminUserType;
use App\Form\ChefProjetUserType;
use App\Form\StandardUserType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @IsGranted("ROLE_USER")
 * @Route("/user")
 */
class UserController extends AbstractController
{
                             // PARTIE USER
    
    /**
     * @Route("/profile", name="user_profile")
     */
    
    public function profile() : Response
    {
        return $this->render('user/profile.html.twig');
    }


                                        // PARTIE ADMIN

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/profileAdmin", name="user_profile_admin")
     */
    
    public function profileAdmin() : Response
    {
        return $this->render('user/profileAdmin.html.twig');
    }

                                    // PARTIE CHEF DE PROJET

    /**
     * @IsGranted("ROLE_CHEFPROJET")
     * @Route("/profileChefProjet", name="user_profile_chefProjet")
     */
    public function profileChefProjet() : Response
    {
        return $this->render('user/profileChefProjet.html.twig');
    }

                                    // PARTIE CRUD

    /**
     * @IsGranted("ROLE_CHEFPROJET")
     * @Route("/index", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    /**
     * @IsGranted("ROLE_CHEFPROJET")
     * @Route("/new", name="user_new", methods={"GET","POST"})
     */
    public function new(Request $request, string $photoDir): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        $role = $form->get('role')->getData();

        $user->setRoles([$role]);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

                // Test du jeudi 17 sept
            if ($photo = $form['cv']->getData()){
                $filename = bin2hex(random_bytes(6)).'.'.$photo->guessExtension();
                try {
                    $photo->move($photoDir, $filename);
                } catch (FileException $e){
                    // Unable , give up !
                }
                $user->setCvFilename($filename);
                // fin test --> + paramètres foonction
            }

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_CHEFPROJET")
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): Response
    {
        return $this->render('user/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @IsGranted("ROLE_CHEFPROJET")
     * @Route("/{id}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_CHEFPROJET")
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    // PLANNING - GESTION DES ENTRETIENS AVEC LES CANDIDATS (Chef de Projet)
    /**
     * @IsGranted("ROLE_CHEFPROJET")
     * @Route("/agenda", name="agenda_index", methods={"GET","POST"})
     */
    public function indexPlanning(UserRepository $userRepository): Response
    {
        return $this->render('user/agenda.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    // EDITION POUR CHAQUE UTILISATEUR DE SON PROFIL PERSONNEL

    // USER STANDARD

    /**
     * @IsGranted("ROLE_USER")
     * @Route("/{id}/editer_mon_profil", name="user_editer_son_profil", methods={"GET","POST"})
     */
    public function editProfilUser(Request $request, User $user): Response
    {
        $standardUserForm = $this->createForm(StandardUserType::class, $user);
        $standardUserForm->handleRequest($request);
        

        if ($standardUserForm->isSubmitted() && $standardUserForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_profile');
        }

        return $this->render('user/editProfilUser.html.twig', [
            'user' => $user,
            'form' => $standardUserForm->createView(),
        ]);
    }

    // CHEF DE PROJET

    /**
     * @IsGranted("ROLE_CHEFPROJET")
     * @Route("/{id}/editer_mon_profil_chefDeProjet", name="user_editer_son_profil_chefDeProjet", methods={"GET","POST"})
     */
    public function editProfilChefProjet(Request $request, User $user): Response
    {
        $chefProjetForm = $this->createForm(ChefProjetUserType::class, $user);
        $chefProjetForm->handleRequest($request);

        if ($chefProjetForm->isSubmitted() && $chefProjetForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_profile_chefProjet');
        }

        return $this->render('user/editProfilUser.html.twig', [
            'user' => $user,
            'form' => $chefProjetForm->createView(),

        ]);
    }

    // ADMIN

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/{id}/editer_mon_profil_admin", name="user_editer_son_profil_admin", methods={"GET","POST"})
     */
    public function editProfilAdmin(Request $request, User $user): Response
    {
        $adminUserForm = $this->createForm(AdminUserType::class, $user);
        $adminUserForm->handleRequest($request);

        if ($adminUserForm->isSubmitted() && $adminUserForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_profile_admin');
        }

        return $this->render('user/editProfilAdmin.html.twig', [
            'user' => $user,
            'form' => $adminUserForm->createView(),
        ]);
    }


}
