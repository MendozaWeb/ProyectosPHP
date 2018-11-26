<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author Admin
 */
class Cliente {
    private $cod;
    private $nom;
    private $ape;
    private $edad;
    private $ruc;
    private $dir;
    
    function __construct($cod, $nom, $ape, $edad, $ruc, $dir) {
        $this->cod = $cod;
        $this->nom = $nom;
        $this->ape = $ape;
        $this->edad = $edad;
        $this->ruc = $ruc;
        $this->dir = $dir;
    }
    
    function getCod() {
        return $this->cod;
    }

    function getNom() {
        return $this->nom;
    }

    function getApe() {
        return $this->ape;
    }

    function getEdad() {
        return $this->edad;
    }

    function getRuc() {
        return $this->ruc;
    }

    function getDir() {
        return $this->dir;
    }

    function setCod($cod) {
        $this->cod = $cod;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setApe($ape) {
        $this->ape = $ape;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setRuc($ruc) {
        $this->ruc = $ruc;
    }

    function setDir($dir) {
        $this->dir = $dir;
    }



}
