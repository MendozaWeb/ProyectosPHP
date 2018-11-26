<?php
include('../Controlador/DProducto.php');
include ('../Controlador/DCategoria.php');
include ('../Controlador/DMarca.php');
$DP = new DProducto();
$DC = new DCategoria();
$DM = new DMarca();
?>

<?php
if (isset($_GET["btnenv"])) {
    $cod = $_GET["txtcod"];
    $nom = $_GET["txtnom"];
    $pre = $_GET["txtpre"];
    $stock = $_GET["txtstock"];
    $cat = $_GET["cbocat"];
    $mar = $_GET["cbomar"];
    
    if ($_GET["btnenv"] == 'Guardar') {
        print $DP->getRegistrar(new Producto($cod, $nom, $pre, $stock, $cat, $mar));
        print "<br><input type='button' onclick=location.href='VProducto.php?bus=Mostrar' value='Continuar'>";
    } else {
        print $DP->getActualizar(new Producto($cod, $nom, $pre, $stock, $cat,$mar));
        print "<br><input type='button' onclick=location.href='VProducto.php?bus=Mostrar' value='Continuar'>";
    }
}


if (isset($_GET["btnEli"])) {
    $cod = $_GET["btnEli"];
    print $DP->getEliminar($cod) . "<p>";
}

if (isset($_GET['bus'])) {
    print "<input type='button' onclick=getcargarURL('Vistas/VProducto.php?nue=Nuevo&boton=Guardar') name='tipo' value='Nuevo'><p>";
    print $DP->getConsulta('NULL','');
}

if (isset($_GET['nue']) || isset($_GET['edi'])) {
    $cod = "";
    $nom = "";
    $pre = "";
    $stock = "";
    $cat = "";
    $mar = "";
    $boton = $_GET['boton'];

    if (isset($_GET['edi'])) {
        $cod = $_GET['edi'];
        $boton = $_GET['boton'];
        $nom = $DP->getBus($cod)->getNom();
        $pre = $DP->getBus($cod)->getPre();
        $stock = $DP->getBus($cod)->getStock();
        $cat = $DP->getBus($cod)->getCat();
        $mar = $DP->getBus($cod)->getMar();
    }

    echo "
            <form method='get' id='formulario'>
            <div class='panel panel-primary' style='align;' center;font-size:20px;>
            <div class='panel-heading'>".$boton."Producto</div>
            <div class='panel-body'stylo-'font-size; 13px:'>
            
            <table class='table' width='350' align='center'>
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
                    <td>Precio</td>
                    <td></td>
                    <td><input type='text' class='form-control' name='txtpre' id='txtpre' value='" . $pre . "'></td>
                </tr>
                <tr>
                    <td>Stock</td>
                    <td></td>
                    <td><input type='range' onmousemove= getIncr('txtstock','Lblrange') step='1' max='100' min='5' name='txtstock' id='txtstock' value='" . $stock . "'><div id='Lblrange'>" . $stock . "</div></td>
                </tr>
                <tr>
                    <td>Categoria</td>
                    <td></td>
                    <td> ".$DC->getComboCat($cat)." </td>
                    
                </tr>
                <tr>
                    <td>Marca</td>
                    <td></td>
                     <td> ".$DM->getComboMar($mar)." </td>
                </tr>
                <tr>
                    <td><input type='button' onclick=getOnclickForm('Vistas/VProducto.php') name='btnenv' id='btnenv' value='" . $boton . "'></td>
                    <td></td>
                    <td><input type='reset' name='btnreset' value='Limpiar'></td>
                </tr>
            </table>
            </form>";
}
?>
