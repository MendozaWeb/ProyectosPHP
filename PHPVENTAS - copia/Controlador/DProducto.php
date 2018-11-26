<?php

require_once 'Conexion.php';
require_once '../Modelo/Producto.php';
require_once '../Controlador/MensException.php';

Class DProducto {

    private $vector;

    function __construct() {
        
    }

    public function getArrayList(Producto $pr) {
        $this->vector = array('cod_prod' => $pr->getCod(),
            'nom_prod' => $pr->getNom(),
            'pre_prod' => $pr->getPre(),
            'stock_prod' => $pr->getStock(),
            'cat_prod' => $pr->getCat());
    }

    public function getItemArray() {
        return $this->vector;
    }

    public function getEliminar($bus) {
        $r = "";
        try {
        $con = new Conexion();
        $pre=$con->getCon()->prepare("CALL SP_ELI_PROD(?)");
        $pre->bindValue(1, $bus);
        $pre->execute();
        
        return print_r($key($pre->fetch()))."";
        }catch (exception $e){
        $MS = new MensException();
        $r = $MS->getErrorMensaje("Error en Consulta: ", $e->get);
    }
     return $r;
    }
    public function getRegistrar(Producto $pr){
        TRY{
        $con = new Conexion();
        $pre = $con->getCon()->prepare("CALL SP_INS_ACT_PROD(?,?,?,?,?)");
        $pre->bindValue(1, $pr->getNom());
        $pre->bindValue(2, $pr->getPre());
        $pre->bindValue(3, $pr->getStock());
        $pre->bindValue(4, $pr->getCat());
        $pre->bindValue(5, $pr->getMar());

        $pre->execute();
        $pre->fetch();
    
        } catch (Exception $e) {
            $MS = new MensException();
            $r=$MS->getErrorMensaje("Error en Consulta:",$e->getMessage());
        }
        
        return "Datos registrados";
    }

    public function getActualizar(Producto $pr) {
        $con = new Conexion();
        /*$con->getCon()->query("UPDATE PRODUCTO SET NOM_PROD='" . $pr->getNom() . "',"
                        . "                               PRE_PROD=" . $pr->getPre() . ","
                        . "                               STOCK_PROD=" . $pr->getStock() . ","
                        . "                               CAT_PROD='" . $pr->getCat() . "' "
                        . "           WHERE COD_PROD=" . $pr->getCod())
                or die(mysqli_error($con->getCon()));*/
    $pre=$con->getCon()->prepare("CALL SP_ACT_PROD(?,?,?,?,?,?)");
    $pre->bindValue(1,$pr->getCod());
    $pre->bindValue(2,$pr->getNom());
    $pre->bindValue(3,$pr->getPre());
    $pre->bindValue(4,$pr->getStock());
    $pre->bindValue(5,$pr->getCat());
    $pre->bindValue(6,$pr->getMar());
    $pre->execute();
        return "Registro Actualizado";
    }

    public function getBus($cod) {
        $con = new Conexion();
        $pre = $con->getCon()->prepare("CALL SP_BUS_PROD(?,?)");
        $pre->bindValue(1,$cod);
        $pre->bindValue(2,'NULL');
        $pre->execute();
        
        foreach ($pre as $key => $row){
            return new Producto($row[0], $row[1], $row[2], $row[3], $row[4],$row[5]);
        }
    }

   public function getConsulta($cod, $nom) {
        $r = "";

        try {
            $con = new Conexion();

            $r = $r . "<table id=table width=300 align=center class='table table-responsive'>";
            $r = $r . "<thead>";
            $r = $r . "<tr class='bg-primary'>";
            $r = $r . "<th>Codigo</th>";
            $r = $r . "<th>Nombre</th>";
            $r = $r . "<th>Precio</th>";
            $r = $r . "<th>Stock</th>";
            $r = $r . "<th>Categoria</th>";
            $r = $r . "<th>Marca</th>";
            $r = $r . "<th></th>";
            $r = $r . "<th></th>";
            $r = $r . "</tr>";
            $r = $r . "</thead><tbody>";

            //$consulta = $con->getCon()->query('select * from producto');
            $consulta = $con->getCon()->prepare('CALL SP_BUS_PROD(:COD,:NOM)');
            $consulta->bindParam(':COD', $cod);
            $consulta->bindParam(':NOM', $nom);
            $consulta->execute();

            foreach ($consulta as $key => $row) {
                $r = $r . "<tr>";
                $r = $r . "<th scope='row'>" . $row['COD_PROD'] . "</th>";
                $r = $r . "<td>" . $row['NOM_PROD'] . "</td>";
                $r = $r . "<td>" . $row['PRE_PROD'] . "</td>";
                $r = $r . "<td>" . $row['STOCK_PROD'] . "</td>";
                $r = $r . "<td>" . $row['N0M_CAT'] . "</td>";
                $r = $r . "<td>" . $row['NOM_MAR'] . "</td>";
                $r = $r . "<td><input type='button' onclick=getEliminar('Vistas/VProducto.php','" . $row['COD_PROD'] . "') name=btnEli value='Elim'></td>";
                $r = $r . "<td><input type='button' onclick=getEditar('Vistas/VProducto.php','" . $row['COD_PROD'] . "') name=btnEdi value='Editar'></td>";
                $r = $r . "</tr>";
            }
            $r = $r . "</tbody></table>";
        } catch (Exception $e) {
            $MS = new MensException();
            $r=$MS->getErrorMensaje("Error en Consulta:",$e->getMessage());
        }

        return $r;
    }

}

?>
