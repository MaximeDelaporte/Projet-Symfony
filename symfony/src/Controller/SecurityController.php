<?php // src/Controller/SecurityController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        //last email entered by the user
        $lastEmail = $authenticationUtils->getLastUsername();
        return $this->render('Welcome/login.html.twig', array(
            'last_email' => $lastEmail,
            'error' => $error,
        ));
    }
}