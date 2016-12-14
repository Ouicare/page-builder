<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ModelController extends Controller
{
    public function listAction()
    {
        return $this->render('AppBundle:Model:list.html.twig', array(
            // ...
        ));
    }

    public function showAction()
    {
        return $this->render('AppBundle:Model:show.html.twig', array(
            // ...
        ));
    }

}
