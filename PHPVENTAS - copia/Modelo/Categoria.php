<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categoria
 *
 * @author Admin
 */
class Categoria {
    private $codcat;
    private $nomcat;
    
    function __construct($codcat, $nomcat) {
        $this->codcat = $codcat;
        $this->nomcat = $nomcat;
    }
    
    function getCodcat() {
        return $this->codcat;
    }

    function getNomcat() {
        return $this->nomcat;
    }

    function setCodcat($codcat) {
        $this->codcat = $codcat;
    }

    function setNomcat($nomcat) {
        $this->nomcat = $nomcat;
    }
}
