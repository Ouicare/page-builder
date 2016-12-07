<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ModelsController extends Controller {

    public function ModelsPopupAction() {
        return $this->render('AppBundle:Models:models_popup.html.twig');
    }

}
