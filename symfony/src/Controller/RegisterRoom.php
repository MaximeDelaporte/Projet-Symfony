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
use Symfony\Component\HttpFoundation\Response;

class RegisterRoom extends Controller
{
    /**
     * @Route("/postRoom", name="postRoom")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postRoom(Request $request)
    {
        $room = new Rooms();
        $form = $this->createForm(RoomType::class, $room);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($room);
            $entityManager->flush();

            return new Response('Saved new product with id '.$room->id());
            
        }
    }

}