<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Traits\ModelCategory;
use FOS\RestBundle\Controller\FOSRestController;

class ApiModelsController extends FOSRestController {

    use ModelCategory;

    public function getInputAction() {
        $result = $this->modelCategory;
        $view = $this->view($result, 200)->setFormat("json");
        return $this->handleView($view);
    }

}
