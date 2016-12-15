<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Model;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ModelsController extends Controller {

    public function ModelsPopupAction() {
        return $this->render('AppBundle:Models:models_popup.html.twig');
    }

    public function showAction(Model $model) {
        return $this->render('AppBundle:Models:show.html.twig', array('model' => $model));
    }

}
