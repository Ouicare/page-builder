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

}
