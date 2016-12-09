<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\ModelEntity;
use AppBundle\Form\ModelEntityType;

class DefaultController extends Controller {

    /**
     * @Route("/")
     */
    public function indexAction(Request $request) {
        // replace this example code with whatever you need

        return $this->render('default/index.html.twig', [
                    'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * Finds and displays list of all antecedents.
     */
    public function newModelAction(Request $request) {
        $entity = new ModelEntity();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        }

        return $this->render('AppBundle:Default:newModel.html.twig', array('entity' => $entity,
                    'form' => $form->createView()));
    }

    /**
     * Creates a form to create a Discipline entity.
     *
     * @param Discipline $entity The entity
     *
     * @return Form The form
     */
    private function createCreateForm(ModelEntity $entity) {
        $form = $this->createForm(new ModelEntityType(), $entity, array(
            'action' => $this->generateUrl('default_add-model-entity'),
            'method' => 'POST',
        ));


        return $form;
    }

}
