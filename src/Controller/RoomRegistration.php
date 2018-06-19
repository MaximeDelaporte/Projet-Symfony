<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19/06/2018
 * Time: 09:16
 */

namespace App\Controller;

use App\Entity\Rooms;
use App\Form\RoomType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RoomRegistration extends Controller
{
    /**
     * @Route("/room/create", name="create Room")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function register(Request $request)
    {
        $room = new Rooms();
        $form = $this->createForm(RoomType::class, $room);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($room);
            $entityManager->flush();

            //redirect to a route which send a confirmation that his account is create
            return $this->redirectToRoute('welcome/connected');
        }

        return $this->render(
            'create-room.html.twig',
            array('form' => $form->createView())
        );
    }
}