<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 18/06/2018
 * Time: 16:25
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class login
{
    public function index(Request $request): Response
    {
        return new Response('Login',$request->get('name', 'password'));
    }
}