<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/models/PrinterDTO.php';

class Printer extends System
{
    public static function createPrinter($serial, $marca, $fecha_ingreso)
    {
        $connect = parent::conexion();
        $stmt = $connect->prepare("INSERT INTO inventario (serial, marca, fecha_ingreso) VALUES (:serial, :marca, :fecha_ingreso)");
        $stmt->bindParam(':serial', $serial);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':fecha_ingreso', $fecha_ingreso);

        return ($stmt->execute()) ? true : false;
    }

    public static function updatePrinter($id_inventario, $serial, $marca){
        $connect = parent::conexion();
        $stmt = $connect->prepare("UPDATE inventario SET serial = :serial, marca = :marca WHERE id_inventario = :id_inventario");
        $stmt->bindParam(':id_inventario', $id_inventario);
        $stmt->bindParam(':serial', $serial);
        $stmt->bindParam(':marca', $marca);

        return $stmt->execute();
    }

    public static function updateSerialPrinter($id_inventario, $serial){
        $connect = parent::conexion();
        $stmt = $connect->prepare("UPDATE inventario SET serial = :serial WHERE id_inventario = :id_inventario");
        $stmt->bindParam(':id_inventario', $id_inventario);
        $stmt->bindParam(':serial', $serial);

        return $stmt->execute();
    }

    public static function getPrinter($id_inventario){
        $connect = parent::conexion();
        $stmt = $connect->prepare("SELECT * FROM inventario WHERE id_inventario = :id_inventario");
        $stmt->bindParam(':id_inventario', $id_inventario);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'PrinterDTO');
        $stmt->execute();

        return $stmt->fetch();
    }

    public static function listPrinter()
    {
        $connect = parent::conexion();
        $stmt = $connect->prepare("SELECT * FROM inventario");
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'PrinterDTO');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function listPrinterByMarca($marca)
    {
        $connect = parent::conexion();
        $stmt = $connect->prepare("SELECT * FROM inventario WHERE marca = :marca");
        $stmt->bindParam(':marca', $marca);
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'PrinterDTO');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function deletePrinter($id_inventario){
        $connect = parent::conexion();
        $stmt = $connect->prepare("DELETE FROM inventario WHERE id_inventario = :id_inventario");
        $stmt->bindParam(':id_inventario', $id_inventario);

        return ($stmt->execute()) ? true : false;
    }

    public static function getIdLastPrinter(){
        $connect = parent::conexion();
        $stmt = $connect->prepare("SELECT id_inventario FROM inventario ORDER BY id_inventario DESC LIMIT 1");
        $stmt->execute();
        $response = $stmt->fetch();

        return $response['id_inventario'];
    }
}
