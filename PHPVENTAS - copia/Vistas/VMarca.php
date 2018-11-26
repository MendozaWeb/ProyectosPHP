<?php
include('../Controlador/DMarca.php');
$DP = new DMarca();
?>

<?php
if (isset($_GET["btnenv"])) {
    $cod = $_GET["txtcod"];
    $nom = $_GET["txtnom"];
    
    if ($_GET["btnenv"] == 'Guardar') {
        print $DP->getRegistrar(new Marca($cod, $nom));
        print "<br><input type='button' onclick=location.href='VMarca.php?bus=Mostrar' value='Continuar'>";
    } else {
        print $DP->getActualizar(new Marca($cod, $nom));
        print "<br><input type='button' onclick=location.href='VMarca.php?bus=Mostrar' value='Continuar'>";
    }
}


if (isset($_GET["btnEli"])) {
    $cod = $_GET["btnEli"];
    print $DP->getEliminar($cod) . "<p>";
}

if (isset($_GET['bus'])) {
    print "<input type='button' onclick=getcargarURL('Vistas/VMarca.php?nue=Nuevo&boton=Guardar') name='tipo' value='Nuevo'><p>";
    print $DP->getConsulta('NULL','');
}

if (isset($_GET['nue']) || isset($_GET['edi'])) {
    $cod = "";
    $nom = "";
    $boton = $_GET['boton'];

    if (isset($_GET['edi'])) {
        $cod = $_GET['edi'];
        $boton = $_GET['boton'];
        $nom = $DP->getBus($cod)->getNomcat();
    }

    echo "
            <form method='get' id='formulario'>
            <div class='panel panel-primary' style='text-aling:center;font-size: 20px;'>
            <div class='panel-heading'>".$boton."Marca</div>
            <div class='panel-body' style='font-size: 13px;'>   
            <table width='350' align='center'  class='table'>
                <tr>
                    <td>Codigo</td>
                    <td></td>
                    <td><input type='text' class='form-control' name='txtcod' id='txtcod' value='" . $cod . "'></td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td></td>
                    <td><input type='text' class='form-control' name='txtnom' id='txtnom' value='" . $nom . "'></td>
                </tr>
                <tr>
                    <td><input type='button' onclick=getOnclickForm('Vistas/VMarca.php') name='btnenv' id='btnenv' value='" . $boton . "'></td>
                    <td></td>
                    <td><input type='reset' name='btnreset' value='Limpiar'></td>
                </tr>
            </table>
            </div>
            </div>
            </form>";
}
?>
