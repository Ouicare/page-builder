<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Traits\ModelCategory;
use AppBundle\Entity\Traits\ModelType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Classes\Layout;
use AppBundle\Classes\Header;
use AppBundle\Entity\Model;

class ApiModelsController extends FOSRestController {

    use ModelType;

use ModelCategory;

    /**
     * get all input component
     * @return type
     */
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
                $data[] = array_merge($attr, array('ticked' => false));
            }
            $value->setAttributes($data);
            $result['graphicals'][] = $value;
        }
        $view = $this->view($result, 200)->setFormat("json");
        return $this->handleView($view);
    }

    /**
     * Save model as json
     * @param Request $request
     * @return type
     */
    public function postOutputModelAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $trans = $this->get('translator');
        $response = array();
        if ($request->getMethod() == 'POST') {
            $data = $request->request->get("data");
            $name = $data['name'];
            $category = $data['category'];
            $type = $data['type'];
            $items = $data['items'];
            $model = new Model();
            $model->setCategory($category);
            $model->setType($type);
            $model->setContent($items);
            $model->setName($name);
            $em->persist($model);
            $em->flush();
        }
        $view = $this->view($response, 200)->setFormat("json");
        return $this->handleView($view);
    }

    /**
     * get modelEntities for summernote
     */
    public function getEntitiesModelsAction() {
        $em = $this->getDoctrine()->getManager();
        $models = array();

        $modelEntities = $em->getRepository('AppBundle:ModelEntity')->findAll();
        foreach ($modelEntities as $value) {
            $data = array();
            $data['id'] = $value->getId();
            $data['label'] = $value->getTitle();
            foreach ($value->getAttributes() as $attr) {
                $childreens[] = array('label' => $attr['label'], 'name' => $attr['name'], 'data' => array('description' => '', 'parent' => $value->getTitle()));
            }
            $data['children'] = $childreens;
            $models[] = $data;
        }

        $view = $this->view($models, 200)->setFormat("json");
        return $this->handleView($view);
    }

}
