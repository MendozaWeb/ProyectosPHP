<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <?php
        require_once '../Controlador/MensException.php';
        require_once 'Conexion.php';
        require_once '../Modelo/Categoria.php';

        Class DCategoria {

            private $vector;

            function __construct() {
                
            }

            public function getArrayList(Categoria $ct) {
                $this->vector = array('cod_cat' => $ct->getCod(),
                    'nom_cat' => $ct->getNom());
            }

            public function getItemArray() {
                return $this->vector;
            }

            public function getEliminar($bus) {
                $R = "";
                try {
                    $con = new Conexion();
                    $cat = $con->getCon()->prepare("CALL SP_ELI_CAT(?)");
                    $cat->bindValue(1, $bus);
                    $cat->execute();
                } catch (Exception $e) {
                    $MS = new MensException();
                    $r = $MS->getErrorMensaje("Error en Consulta:", $e->getMessage());
                }

                return $r;
            }

            public function getRegistrar(Categoria $ct) {
                $con = new Conexion();

                $cat = $con->getCon()->prepare(" CALL SP_INS_CAT(?)");
                $cat->bindValue(1, $ct->getNom());
                $cat->execute();
                $cat->fetch();

                return "Datos registrados";
            }

            public function getActualizar(Categoria $ct) {
                $con = new Conexion();
                /* $con->getCon()->query("UPDATE PRODUCTO SET NOM_PROD='" . $pr->getNom() . "',"
                  . "                               PRE_PROD=" . $pr->getPre() . ","
                  . "                               STOCK_PROD=" . $pr->getStock() . ","
                  . "                               CAT_PROD='" . $pr->getCat() . "' "
                  . "           WHERE COD_PROD=" . $pr->getCod())
                  or die(mysqli_error($con->getCon())); */
                $cat = $con->getCon()->prepare("CALL SP_ACTU_CAT(?,?)");
                $cat->bindValue(1, $ct->getCod());
                $cat->bindValue(2, $ct->getNom());
                $cat->execute();
                return "Registro Actualizado";
            }

            public function getBus($cod) {
                $con = new Conexion();
                $cat = $con->getCon()->prepare("CALL SP_BUS_CAT(?,?)");
                $cat->bindValue(1, $cod);
                $cat->bindValue(2, 'NULL');
                $cat->execute();

                foreach ($cat as $key => $row) {
                    return new Categoria($row[0], $row[1]);
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
                    $r = $r . "<th></th>";
                    $r = $r . "<th></th>";
                    $r = $r . "</tr>";
                    $r = $r . "</thead><tbody>";

                    //$consulta = $con->getCon()->query('select * from producto');
                    $consulta = $con->getCon()->prepare('CALL SP_BUS_CAT(:COD,:NOM)');
                    $consulta->bindParam(':COD', $cod);
                    $consulta->bindParam(':NOM', $nom);
                    $consulta->execute();

                    foreach ($consulta as $key => $row) {
                        $r = $r . "<tr>";
                        $r = $r . "<th scope='row' class='danger'>" . $row['COD_CAT'] . "</th>";
                        $r = $r . "<td class='danger'>" . $row['NOM_CAT'] . "</td>";
                        $r = $r . "<td class='danger'><input type='button' onclick=getEliminar('Vistas/VCategoria.php','" . $row['COD_CAT'] . "') name=btnEli value='Elim'></td>";
                        $r = $r . "<td class='danger'><input type='button' onclick=getEditar('Vistas/VCategoria.php','" . $row['COD_CAT'] . "') name=btnEdi value='Editar'></td>";
                        $r = $r . "</tr>";
                    }
                    $r = $r . "</tbody></table>";
                } catch (Exception $e) {
                    $MS = new MensException();
                    $r = $MS->getErrorMensaje("Error en Consulta:", $e->getMessage());
                }
                return $r;
            }

            public function getComboCat($cod) {
                $r = "";
                try {
                    $con = new Conexion();
                    $pre = $con->getCon()->prepare('CALL SP_BUS_CAT(?,?)');
                    $pre->bindValue(1, '');
                    $pre->bindValue(2, '');
                    $pre->execute();

                    $r = "<select name='cbocat' class='form-control'>";
                    foreach ($pre as $key => $row) {

                        $sele = ($cod == $row[0] ? "selected" : "");

                        $r .= "<option value='" . $row[0] . "'" . $sele . ">" . $row[1] . "</option>";
                    }
                    $r .= "</select>";
                } catch (Exception $e) {
                    $MS = new MensException();
                    $r = $MS->getErrorMensaje("Error en Consulta:", $e->getMessage());
                }
                return $r;
            }

        }
        ?>    






    </body>