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
        require_once '../Modelo/Marca.php';

        Class DMarca {

            private $vector;

            function __construct() {
                
            }

            public function getArrayList(Marca $mr) {
                $this->vector = array('cod_mar' => $mr->getCod(),
                    'nom_mar' => $mr->getNom());
            }

            public function getItemArray() {
                return $this->vector;
            }

            public function getEliminar($bus) {
                $r = "";
                try {
                    $con = new Conexion();
                    $mar = $con->getCon()->prepare("CALL SP_ELI_MAR(?)");
                    $mar->bindValue(1, $bus);
                    $mar->execute();
                } catch (Exception $e) {
                    $MS = new MensException();
                    $r = $MS->getErrorMensaje("Error en Consulta:", $e->getMessage());
                }

                return $r;
            }

            public function getRegistrar(Marca $mr) {
                $con = new Conexion();

                $mar = $con->getCon()->prepare(" CALL SP_INS_MAR(?)");
                $mar->bindValue(1, $mr->getNom());
                $mar->execute();
                $mar->fetch();

                return "Datos registrados";
            }

            public function getActualizar(Marca $mr) {
                $con = new Conexion();
                $mar = $con->getCon()->prepare("CALL SP_ACTU_MAR(?,?)");
                $mar->bindValue(1, $mr->getCod());
                $mar->bindValue(2, $mr->getNom());
                $mar->execute();
                return "Registro Actualizado";
            }

            public function getBus($cod) {
                $con = new Conexion();
                $mar = $con->getCon()->prepare("CALL SP_BUS_MAR(?,?)");
                $mar->bindValue(1, $cod);
                $mar->bindValue(2, 'NULL');
                $mar->execute();

                foreach ($mar as $key => $row) {
                    return new Marca($row[0], $row[1]);
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
                    $consulta = $con->getCon()->prepare('CALL SP_BUS_MAR(:COD,:NOM)');
                    $consulta->bindParam(':COD', $cod);
                    $consulta->bindParam(':NOM', $nom);
                    $consulta->execute();

                    foreach ($consulta as $key => $row) {
                        $r = $r . "<tr>";
                        $r = $r . "<th scope='row' class='success'>" . $row['COD_MAR'] . "</th>";
                        $r = $r . "<td class='success'>" . $row['NOM_MAR'] . "</td>";
                        $r = $r . "<td class='success'><input type='button' onclick=getEliminar('Vistas/VMarca.php','" . $row['COD_MAR'] . "') name=btnEli value='Elim'></td>";
                        $r = $r . "<td class='success'><input type='button' onclick=getEditar('Vistas/VMarca.php','" . $row['COD_MAR'] . "') name=btnEdi value='Editar'></td>";
                        $r = $r . "</tr>";
                    }
                    $r = $r . "</tbody></table>";
                } catch (Exception $e) {
                    $MS = new MensException();
                    $r = $MS->getErrorMensaje("Error en Consulta:", $e->getMessage());
                }
                return $r;
            }

            public function getComboMar($cod) {
                $r = "";
                try {
                    $con = new Conexion();
                    $mar = $con->getCon()->prepare('CALL SP_BUS_MAR(?,?)');
                    $mar->bindValue(1, '');
                    $mar->bindValue(2, '');
                    $mar->execute();

                    $r = "<select name='cbomar' class='form-control'>";
                    foreach ($mar as $key => $row) {

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