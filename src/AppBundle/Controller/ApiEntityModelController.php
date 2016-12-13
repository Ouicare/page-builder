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
        $em = $this->getDoctrine()->getEntityManager();
        if ($request->getMethod() == 'POST') {
            $data = $request->request->all()['data'];
            $classNames = $em->getConfiguration()
                    ->getMetadataDriverImpl()
                    ->getAllClassNames();
            $modelEntity = new \AppBundle\Entity\ModelEntity();
            try {
                $form = $this->createForm('AppBundle\Form\ModelEntityType', $modelEntity, array('classNames' => $classNames));
                $form->submit($data);
                $modelEntity->setAttributes($data['attributes']);
                $em->persist($modelEntity);
                $em->flush();
                $status = 200;
                $result = array('success' => 'Ok');
            } catch (\Exception $exc) {
                $status = 500;
                $result = array('error' => $exc->getMessage());
            }
        }
        $view = $this->view($result, $status)->setFormat("json");
        return $this->handleView($view);
    }

    public function getFieldsAction($model) {
        $em = $this->getDoctrine()->getManager();
        $result = $em->getClassMetadata($model)->getFieldNames();
        $view = $this->view($result, 200)->setFormat("json");
        return $this->handleView($view);
    }

}
