<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EtudiantEntity
 *
 * @author SIMO
 */
class EtudiantEntity {
    //put your code here
    private $class;
    private $telephoneNumber;
    private $nom;
    
    function getClass() {
        return $this->class;
    }

    function getTelephoneNumber() {
        return $this->telephoneNumber;
    }

    function getNom() {
        return $this->nom;
    }

    public function setClass($class) {
        $this->class = $class;
    } 

    function setTelephoneNumber($telephoneNumber) {
        $this->telephoneNumber = $telephoneNumber;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }


}
