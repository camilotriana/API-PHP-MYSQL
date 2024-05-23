<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/ControllerPrinter.php';

//CREAR REGISTRO NUEVO
if (isset($_POST['newPrint'])) {
    $response = ControllerPrinter::createPrinter($_POST['serial'], $_POST['marca']);
    echo json_encode($response);
}

//ACTUALIZAR REGISTRO COMPLETO
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $datos = json_decode(file_get_contents('php://input'));

    if ($datos != NULL) {
        $response = ControllerPrinter::updatePrinter($datos->id_inventario, $datos->serial, $datos->marca);
        echo json_encode($response);
    }
}

//ACTUALIZAR SERIAL
if ($_SERVER['REQUEST_METHOD'] == 'PATCH') {
    $datos = json_decode(file_get_contents('php://input'));

    if ($datos != NULL) {
        $response = ControllerPrinter::updateSerialPrinter($datos->id_inventario, $datos->serial);
        echo json_encode($response);
    }
}

//LISTA DE REGISTROS POR MARCA
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search_marca'])) {
    $response = ControllerPrinter::listPrinterByMarca($_POST['search_marca']);
    echo json_encode($response);
}

//OBTENER REGISTRO POR ID
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id_inventario'])) {
    $response = ControllerPrinter::getPrinter($_GET['id_inventario']);
    echo json_encode($response);
}

//LISTA DE REGISTROS
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['allPrint'])) {
    $response = ControllerPrinter::listPrinter();
    echo json_encode($response);
}


//ELIMINAR REGISTRO POR ID
if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['id_inventario'])) {
    $response = ControllerPrinter::deletePrinter($_GET['id_inventario']);
    echo json_encode($response);
}
