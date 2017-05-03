<?php

namespace contrib\TopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TopBundle:Default:index.html.twig');
    }
    
    public function showAction()
    {
        return new Response("Notre propre Hello World !");
    }
}
