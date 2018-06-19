<?php

namespace App\Controller;

use App\Entity\Room;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RoomRegistration extends Controller
{
    /**
     * @Route("/postRoom", name="registration")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function PostRoom(Request $request)
    {
        $room = new Room();
        $form->handleRequest($request);
        

        if ($form->isSubmitted() && $form->isValid()) {
            
            $room->name = $name;
            $room->location = $location;
            $room->city = $city;
            $room->cp = $cp;
            $room->description = $description;
            $room->capacity = $capacity;
            $room->isRented = $isRented;
            $room->rentingDateBegin = $rentingDateBegin;
            $room->rentingDateEnd = $rentingDateEnd;
            

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($room);
            $entityManager->flush();

            return new Response('Saved new product with id '.$$room->id());
            
        }

        
    }
}