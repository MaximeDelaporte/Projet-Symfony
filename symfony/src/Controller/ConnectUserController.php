<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18/06/2018
 * Time: 16:25
 */

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class ConnectUserController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     *
     */
    public function connectUser(AuthenticationUtils $helper): Response
    {
        return $this->render('welcome/login.html.twig', [
            'last_email' => $helper->getLastUsername(),
            'error' => $helper->getLastAuthenticationError(),
        ]);
    }

    public function logout(): void
    {
        throw new \Exception('This should never be reached!');
    }
}