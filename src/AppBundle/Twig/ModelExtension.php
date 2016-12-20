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
class ModelExtension extends \Twig_Extension {

    protected $em;

    public function __construct($em) {
        $this->em = $em;
    }

    public function getFilters() {
        return array(
            new \Twig_SimpleFilter('params', array($this, 'getVariable'), array('is_safe' => array('html'))),
        );
    }

    public function getVariable($text) {
        $v = $this->get_all_string_between($text, '{{', '}}');
        foreach ($v as $value) {
            $pieces = explode(":", $value);
            $variable = $this->em->getRepository($pieces[0] . "Bundle:" . $pieces[1])->find(1);
            $myval = $variable->getProperty($pieces[2]);
            $text = str_replace("{{" . $value . "}}", $myval, $text);
        }
        return $text;
    }

    public function get_all_string_between($string, $start, $end) {
        $result = array();
        $string = " " . $string;
        $offset = 0;
        while (true) {
            $ini = strpos($string, $start, $offset);
            if ($ini == 0)
                break;
            $ini += strlen($start);
            $len = strpos($string, $end, $ini) - $ini;
            $result[] = substr($string, $ini, $len);
            $offset = $ini + $len;
        }
        return $result;
    }

    public function getName() {
        return 'app_extension';
    }

}
