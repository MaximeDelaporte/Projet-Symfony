<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    /**
     * Matches /welcome exactly
     *
     * @Route("/welcome", name="welcome")
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
        return $this->render('welcome/connected.html.twig', [
            'user_name' => 'My my',
        ]);
    }

    /**
     * @Route("/welcome/disconnected", name="disconnecting")
     */

    public function disconnected()
    {
        return $this->redirectToRoute('welcome');
    }
}
