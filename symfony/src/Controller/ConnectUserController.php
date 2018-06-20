<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18/06/2018
 * Time: 16:25
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ConnectUserController extends Controller
{
    /**
     * @Route("/welcome/login", name="login")
     *
     */
    public function connectUser(Request $request, AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        //last email entered by the user
        $lastEmail = $authenticationUtils->getLastUsername();

        return $this->render('welcome/login.html.twig', array(
            'last_email' => $lastEmail,
            'error' => $error,
        ));
    }
}