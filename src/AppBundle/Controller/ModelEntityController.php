<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ModelEntity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Modelentity controller.
 *
 */
class ModelEntityController extends Controller {

    /**
     * Lists all modelEntity entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $modelEntities = $em->getRepository('AppBundle:ModelEntity')->findAll();

        return $this->render('AppBundle:modelentity:index.html.twig', array(
                    'modelEntities' => $modelEntities,
        ));
    }

    /**
     * Creates a new modelEntity entity.
     *
     */
    public function newAction(Request $request) {
        $modelEntity = new Modelentity();
        $form = $this->createForm('AppBundle\Form\ModelEntityType', $modelEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($modelEntity);
            $em->flush($modelEntity);

            return $this->redirectToRoute('modelentity_show', array('id' => $modelEntity->getId()));
        }

        return $this->render('AppBundle:modelentity:new.html.twig', array(
                    'modelEntity' => $modelEntity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a modelEntity entity.
     *
     */
    public function showAction(ModelEntity $modelEntity) {
        $deleteForm = $this->createDeleteForm($modelEntity);

        return $this->render('AppBundle:modelentity:show.html.twig', array(
                    'modelEntity' => $modelEntity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing modelEntity entity.
     *
     */
    public function editAction(Request $request, ModelEntity $modelEntity) {
        $deleteForm = $this->createDeleteForm($modelEntity);
        $editForm = $this->createForm('AppBundle\Form\ModelEntityType', $modelEntity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('modelentity_edit', array('id' => $modelEntity->getId()));
        }

        return $this->render('AppBundle:modelentity:edit.html.twig', array(
                    'modelEntity' => $modelEntity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a modelEntity entity.
     *
     */
    public function deleteAction(Request $request, ModelEntity $modelEntity) {
        $form = $this->createDeleteForm($modelEntity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($modelEntity);
            $em->flush($modelEntity);
        }

        return $this->redirectToRoute('modelentity_index');
    }

    /**
     * Creates a form to delete a modelEntity entity.
     *
     * @param ModelEntity $modelEntity The modelEntity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ModelEntity $modelEntity) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('modelentity_delete', array('id' => $modelEntity->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
