<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DCliente
 *
 * @author Admin
 */
require_once 'Conexion.php';
require_once '../Modelo/Cliente.php';

class DCliente {
    
    
    public function getEliminar($cod){
        $con=new Conexion();
        mysqli_query($con->getCon(), "Delete from Cliente where cod_cli='".$cod."'")
                or die('Error no se pudo eliminar');
        return "Registro eliminado";
    }
        
    public function getConsulta(){
        $r = "" ;
        $r = $r . "<table id=table width=300 align=center class='table table-responsive'>";
        $r = $r . "<thead>";
        $r = $r . "<tr class='bg-primary'>";
        $r = $r . "<th>Codigo</th>";
        $r = $r . "<th>Nombre</th>";
        $r = $r . "<th>Apellido</th>";
        $r = $r . "<th>Edad</th>";
        $r = $r . "<th>Ruc</th>";
        $r = $r . "<th>Dirección</th>";
        $r = $r . "<th></th>";
        $r = $r . "<th></th>";
        $r = $r . "</tr>";
        $r = $r . "</thead><tbody>";
        
        $con=new Conexion();
        $result= mysqli_query($con->getCon(), "Select * from Cliente");
        while($row= mysqli_fetch_array($result)){
            $r = $r . "<tr>";
            $r = $r . "<th scope='row'>" . $row[0] . "</th>";
            $r = $r . "<td>" . $row[1] . "</td>";
            $r = $r . "<td>" . $row[2] . "</td>";
            $r = $r . "<td>" . $row[3] . "</td>";
            $r = $r . "<td>" . $row[4] . "</td>";
            $r = $r . "<td>" . $row[5] . "</td>";
            $r = $r . "<td><input type='button' onclick=getEliminar('Vistas/VCliente.php','".$row[0]."') name=btnEli value='Elim'></td>";
            $r = $r . "<td><input type='button' onclick=getEditar('Vistas/VCliente.php','".$row[0]."') name=btnEdi value='Editar'></td>";
            $r = $r . "</tr>";
        }
        $r = $r . "</tbody></table>";
        return $r;
        
    }
    
    
    
}
