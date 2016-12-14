<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ModelController extends Controller {

    public function listAction() {
        $em = $this->getDoctrine()->getManager();
        $models = $em->getRepository("AppBundle:Model")->findAll();
        return $this->render('AppBundle:Model:list.html.twig', array(
                    'models' => $models
        ));
    }

    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();
        $currentModel = $em->getRepository("AppBundle:Model")->find($id);
        return $this->render('AppBundle:Model:show.html.twig', array(
                    'model' => $currentModel
        ));
    }

}
