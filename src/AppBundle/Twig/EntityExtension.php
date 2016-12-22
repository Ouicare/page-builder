<?php

namespace AppBundle\Twig;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ModelExtension
 *
 * @author Mohamed Amine ABBADI
 */
class EntityExtension extends \Twig_Extension {

    protected $em;

    public function __construct($em) {
        $this->em = $em;
    }

    public function getFilters() {
        return array(
            new \Twig_SimpleFilter('entitytable', array($this, 'getEntityTable'), array('needs_environment' => true, 'is_safe' => array('html'))),
        );
    }

    public function getEntityTable(\Twig_Environment $environment, $composant) {

        $type = $composant['type'];

        $entities = $this->em->getRepository($type)->findAll();
        return $environment->render('AppBundle:Model:model_extenstion.html.twig', array(
                    'entities' => $entities, 'composant' => $composant));
    }

    public function getName() {
        return 'app_entity_extension';
    }

}
