<?php

namespace contrib\TopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TrollController extends Controller
{    
    public function showAction()
    {
        return new Response("My Own Hello World !");
    }
    
    public function indexAction()
    {
        $content = $this->get('templating')->render('TopBundle:top:index.html.twig');
    
        return new Response($content);
    }
}
