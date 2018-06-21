<?php

namespace App\Controller;

use App\Entity\Receips;
use App\Entity\Rooms;
use App\Entity\Options;
use App\Form\ReceipsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;

class ReceipsController extends Controller
{
    /**
     * @Route("/receips/index", name="receips_index", methods="GET")
     */
    public function index(Request $request)
    {
        $rooms = $this->getDoctrine()
            ->getRepository(Rooms::class)
            ->findAll();
        
        $options = $this->getDoctrine()
            ->getRepository(Options::class)
            ->findAll();


        $receip = new Receips;
        $form = $this->createForm(ReceipsType::class, $receip);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            // cal function add receips 

            // return welcome route
            return $this->redirectToRoute('receips/index');
        }

        return $this->render('receips/index.html.twig', [
            'rooms' => $rooms,
            'options' => $options,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/receips/availabitlity", name="receips_availability", methods="GET")
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