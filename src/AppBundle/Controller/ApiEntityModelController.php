<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Traits\ModelCategory;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class ApiEntityModelController extends FOSRestController {

    public function getAction() {
        $result = $this->modelCategory;
        $view = $this->view($result, 200)->setFormat("json");
        return $this->handleView($view);
    }

    public function postAction(Request $request) {
        $response = array();
        if ($request->getMethod() == 'POST') {
            $result = $request->request->all();
            dump($result);
            die();
        }
        $view = $this->view($response, 200)->setFormat("json");
        return $this->handleView($view);
    }

    public function getFieldsAction($model) {
        $em = $this->getDoctrine()->getManager();
        $result = $em->getClassMetadata($model)->getFieldNames();
        $view = $this->view($result, 200)->setFormat("json");
        return $this->handleView($view);
    }

}
