<?php

namespace App\Controller;

use App\Entity\Receips;
use App\Entity\Rooms;
use App\Entity\Options;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class Receip extends Controller
{
    /**
     * @Route("/receips/index", name="receips_index", methods="GET")
     */
    public function receip()
    {
        $rooms = $this->getDoctrine()
            ->getRepository(Rooms::class)
            ->findAll();
        
        $options = $this->getDoctrine()
            ->getRepository(Options::class)
            ->findAll();


        $receip = new Receips;
        $form = $this->createForm(UserType::class, $receip, $rooms);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            

            // return welcome route
            return $this->redirectToRoute('welcome/connected');
        }

        return $this->render('receips/index.html.twig', [
            'rooms' => $rooms,
            'options' => $options,
            'form' => $form->createView()
        ]);
    }

    /**
     * check availability at room selected
     * @Route("/receips/availability", name="receips_availability", methods="GET")
     */
    public function availability(Request $request)
    {
        $room = $this->getDoctrine()
            ->getRepository(Rooms::class)
            ->findOneBy([
                'id' => $id
        ]);

        if (!$room)
        {
            $this->session->getFlashBag()->add('info', 'this room is not available');    
        }
        else
        {
            $this->session->getFlashBag()->add('info', 'this room is available');    
        }
        
        return $this->redirectToRoute('receips/index');
    }


    
}