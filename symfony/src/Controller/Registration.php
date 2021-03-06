<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19/06/2018
 * Time: 09:16
 */

namespace App\Controller;

use App\Entity\Users;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class Registration extends Controller
{
    /**
     * @Route("/registration", name="registration")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new Users();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setUsername( $user->getSurname() . " ".$user->getLastname());
            $user->setRoles(['ROLE_USER']);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            //redirect to a route which send a confirmation that his account is create
            return $this->redirectToRoute('login');
        }

        return $this->render(
            'register.html.twig',
            array('form' => $form->createView())
        );
    }
}