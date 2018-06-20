<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    /**
     * Matches /welcome exactly
     *
     * @Route("/", name="welcome")
     */
    public function index()
    {
        return $this->render('welcome/index.html.twig');
    }

    /**
     * @Route("/welcome/connected", name="welcome_connected")
     */

    public function connected()
    {
        return $this->render('welcome/connected.html.twig');
    }

    /**
     * @Route("/welcome/disconnected", name="disconnecting")
     */

    public function disconnected()
    {
        return $this->redirectToRoute('welcome');
    }
}
