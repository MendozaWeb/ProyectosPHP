<?php

require_once '../Controlador/DCliente.php';
require_once '../Modelo/Cliente.php';

$DP = new DCliente();
?>

<?php

if (isset($_GET['btnEli'])) {
    $cod = $_GET['btnEli'];
    PRINT $DP->getEliminar($cod);
}

if (isset($_GET['bus'])) {

    PRINT $DP->getConsulta();
}
