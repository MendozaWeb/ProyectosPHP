<?php

/**
 * Description of Producto
 *
 * @author Administrador
 */
class Producto {

    private $cod;
    private $nom;
    private $pre;
    private $stock;
    private $cat;
    private $mar;

    function __construct($cod, $nom, $pre, $stock, $cat, $mar) {
        $this->cod = $cod;
        $this->nom = $nom;
        $this->pre = $pre;
        $this->stock = $stock;
        $this->cat = $cat;
        $this->mar = $mar;
    }

    function getCod() {
        return $this->cod;
    }

    function getNom() {
        return $this->nom;
    }

    function getPre() {
        return $this->pre;
    }

    function getStock() {
        return $this->stock;
    }

    function getCat() {
        return $this->cat;
    }

    function setCod($cod) {
        $this->cod = $cod;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPre($pre) {
        $this->pre = $pre;
    }

    function setStock($stock) {
        $this->stock = $stock;
    }

    function setCat($cat) {
        $this->cat = $cat;
    }

    function getMar() {
        return $this->mar;
    }

    function setMar($mar) {
        $this->mar = $mar;
    }

}
