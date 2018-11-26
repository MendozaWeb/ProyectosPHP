<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MensajeErrorException
 *
 * @author Administrador
 */
class MensException {

    function __construct() {
        
    }

    public function getErrorMensaje($tit, $men) {
        return "<div class='alert alert-danger alert-dismissable fade in'>
                <a href='#' class='close' data-dismiss='alert' 
                aria-label='close'>&times;</a>
                <strong>" . $tit . "!</strong>
                    " . $men . "
                </div>";
    }

}
