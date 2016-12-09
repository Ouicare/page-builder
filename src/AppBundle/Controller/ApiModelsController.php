<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Traits\ModelCategory;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class ApiModelsController extends FOSRestController {

    use ModelCategory;

    public function getInputAction() {
        $result = $this->modelCategory;
        $view = $this->view($result, 200)->setFormat("json");
        return $this->handleView($view);
    }

    public function postOutputModelAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $trans = $this->get('translator');
        $response = array();
        if ($request->getMethod() == 'POST') {
            //  $result = $request->request->get("data");
            dump($request);
            die();
        }
        $view = $this->view($response, 200)->setFormat("json");
        return $this->handleView($view);
    }

}
