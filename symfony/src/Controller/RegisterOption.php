<?php 
 
namespace App\Controller; 
 
use App\Entity\Option; 
use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use Symfony\Component\HttpFoundation\Request; 
use Symfony\Component\HttpFoundation\Response; 
use Symfony\Component\Routing\Annotation\Route; 
 
class RegisterOption extends Controller 
{ 
    /** 
     * @Route("/postOption", name="postOption") 
     * @param Request $request 
     * @return \Symfony\Component\HttpFoundation\Response 
     */ 
    public function postOption(Request $request) 
    { 
        $option = new Option(); 
        $form->handleRequest($request); 
         
        if ($form->isSubmitted() && $form->isValid()) { 
             
            $option->name = $name; 
            $option->price = $price; 
                         
            $entityManager = $this->getDoctrine()->getManager(); 
            $entityManager->persist($option); 
            $entityManager->flush(); 
 
            return new Response('Saved new product with id '.$option->id()); 
             
        } 
    } 
}