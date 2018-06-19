<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19/06/2018
 * Time: 09:16
 */

namespace App\Controller;

use App\Entity\Options;
use App\Form\OptionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class OptionCreation extends Controller
{
    /**
     * @Route("/option/create", name="create Option")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request)
    {
        $room = new Options();
        $form = $this->createForm(OptionType::class, $room);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($room);
            $entityManager->flush();

            //redirect to a route which send a confirmation that his account is create
            return $this->redirectToRoute('welcome/connected');
        }

        return $this->render(
            'create-option.html.twig',
            array('form' => $form->createView())
        );
    }
}