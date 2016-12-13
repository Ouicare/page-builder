<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Layout
 *
 * @author abbadi
 */

namespace AppBundle\Classes;

class Layout {

    //put your code here
    private $id;
    private $title;
    private $type;
    private $description;
    private $content;
    private $composants;
    private $left;
    private $right;

    function __construct($object) {
        $this->id = $object->getId();
        $this->title = $object->getTitle();
        $this->type = $object->getType();
        $this->description = $object->getDescription();
        $this->content = $object->getContent();
        if ($this->title == '1 Column') {
            $this->composants = array();
        } else if ($this->title == '2 Columns') {
            $this->left = array();
            $this->right = array();
        }
    }

    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getDescription() {
        return $this->description;
    }

    function getComposants() {
        return $this->composants;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setComposants($composants) {
        $this->composants = $composants;
    }

    function getType() {
        return $this->type;
    }

    function getContent() {
        return $this->content;
    }

    function getLeft() {
        return $this->left;
    }

    function getRight() {
        return $this->right;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setLeft($left) {
        $this->left = $left;
    }

    function setRight($right) {
        $this->right = $right;
    }

}
