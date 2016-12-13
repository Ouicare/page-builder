<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Traits\ModelCategory;
use AppBundle\Entity\Traits\ModelType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Classes\Layout;
use AppBundle\Classes\Header;

class ApiModelsController extends FOSRestController {

    use ModelType;

use ModelCategory;

    public function getInputAction() {
        $em = $this->getDoctrine()->getManager();
        $result = array();
        // catégorie
        foreach ($this->modelCategory as $value) {
            $result['categories'] [] = $value;
        }

        // type
        foreach ($this->modelType as $value) {
            $result['types'] [] = $value;
        }

        // headers
        $headers = $em->getRepository('AppBundle:VisualElement')->findByType('header');
        foreach ($headers as $value) {
            $result['headers'][] = new Header($value);
        }

        // layout
        $layouts = $em->getRepository('AppBundle:VisualElement')->findByType('layout');
        foreach ($layouts as $value) {
            $result['layouts'][] = new Layout($value);
        }
        // composant graphique

        $modelEntities = $em->getRepository('AppBundle:ModelEntity')->findAll();
        foreach ($modelEntities as $value) {
            $data = array();
            foreach ($value->getAttributes() as $attr) {
                $data[] = array('name' => $attr, 'ticked' => false);
            }
            $value->setAttributes($data);
            $result['graphicals'][] = $value;
        }

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
