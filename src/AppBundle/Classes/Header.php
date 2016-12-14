<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Classes;

/**
 * Description of Header
 *
 * @author abbadi
 */
class Header {

    //put your code here
    private $id;
    private $title;
    private $type;
    private $description;
    private $content;
    private $text;
    private $tpl;

    function __construct($object) {
        $this->id = $object->getId();
        $this->title = $object->getTitle();
        $this->type = $object->getType();
        $this->description = $object->getDescription();
        $this->content = $object->getContent();
        $this->tpl = $this->type;
        if ($this->type == 'header') {
            $this->text = "";
        }
    }

    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getType() {
        return $this->type;
    }

    function getDescription() {
        return $this->description;
    }

    function getContent() {
        return $this->content;
    }

    function getText() {
        return $this->text;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setText($text) {
        $this->text = $text;
    }

    function getTpl() {
        return $this->tpl;
    }

    function setTpl($tpl) {
        $this->tpl = $tpl;
    }

}
