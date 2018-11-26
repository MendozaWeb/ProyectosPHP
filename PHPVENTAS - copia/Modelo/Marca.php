<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Marca
 *
 * @author Admin
 */
class Marca {
    private $codmar;
    private $nommar;
    
    function __construct($codmar, $nommar) {
        $this->codmar = $codmar;
        $this->nommar = $nommar;
    }
    
    function getCodmar() {
        return $this->codmar;
    }

    function getNommar() {
        return $this->nommar;
    }

    function setCodmar($codmar) {
        $this->codmar = $codmar;
    }

    function setNommar($nommar) {
        $this->nommar = $nommar;
    }            
}
