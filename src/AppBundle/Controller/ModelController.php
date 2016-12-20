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

    public function showAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $currentModel = $em->getRepository("AppBundle:Model")->find($id);
        $data = array(
            'model' => $currentModel,
        );
//        foreach ($currentModel->getEntities() as $entity) {
//            /* @var $entity \AppBundle\Entity\ModelEntity */
//            $param = $request->query->get(strtolower($entity->getName()));
//            if (!$param) {
//                $value = $em->getRepository($entity->getType())->findAll();
//            } else {
//                $value = $em->getRepository($entity->getType())->find($param);
//                if (!$value) {
//                    throw $this->createNotFoundException('Unable to find required entity.');
//                }
//            }
//            $data[$entity->getName()] = $value;
//            //Get the rest
//        }
        return $this->render('AppBundle:Model:show.html.twig', $data);
    }

}
