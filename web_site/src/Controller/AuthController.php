<?php

namespace App\Controller;

use App\Entity\UserListing;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class AuthController extends AbstractController
{
    /**
     * @Route("/auth", name="auth")
     */
    public function index()
    {
        return $this->render('auth/index.html.twig', [
            'controller_name' => 'AuthController',
        ]);
    }

    /**
     * La page d'acceiul de l'application
     * @Route ("/" , name="home" )
     */

    public function home()
    {
        return $this->render('auth/home.html.twig');
    }

    /**
     * @Route("/inscription", name="security_registration")
     * @Route("/info_{id}_edit", name="user_edit")
     */
    public function registration(UserListing $user = null,Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $encoder){
        $new=false;
        if(!$user){
            $user = new UserListing();
            $new=true;
        }
        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if($new){
                $hash = $encoder->encodePassword($user, $user->getPassword());

                $user->setPassword($hash);
            }
            $entityManager->persist($user);
            $entityManager->flush();
            if($new){
                return $this->redirectToRoute('security_login');
            }
            else
            {
                $this->addFlash('infoperso', 'Vos changement ont été pris en compte !');
                return $this->redirectToRoute('home');
            }
        }

        return $this->render('auth/registration.html.twig', [
            'form'=> $form->createView(),
            'editMode' => $user->getId() !== null
        ]);

    }

    /**
     * @Route("/connexion", name="security_login")
     */
    public function login (AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        return $this->render('auth/login.html.twig', [
            'error' => $error
        ]);
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout(){}


  //fin de controller
}
