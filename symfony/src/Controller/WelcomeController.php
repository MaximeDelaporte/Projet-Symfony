<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WelcomeController extends Controller
{
    /**
     * Matches / exactly
     *
     * @Route("/", name="welcome")
     */
    public function index()
    {
        return $this->render('welcome/index.html.twig');
    }

    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        return $this->render('Admin/index.html.twig');
    }

    /**
     * @Route("/welcome/connected", name="welcome_connected")
     */

    public function connected()
    {
        return $this->render('welcome/connected.html.twig');
    }

    /**
     * La route pour se deconnecter
     *
     * Mais celle ci ne doit jamais être executé car symfony l'interceptera avant.
     *
     * @Route("/welcome/disconnected", name="disconnecting")
     */

    public function disconnected(): void
    {
        //return $this->redirectToRoute('welcome');
        throw new \Exception('This should never be reached!');
    }
}
