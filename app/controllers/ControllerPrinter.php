<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/class/System.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/class/Printer.php';

class ControllerPrinter
{

    public static function createPrinter($serial, $marca)
    {
        try {
            $fecha_ingreso = date('Y-m-d');
            $response = Printer::createPrinter($serial, $marca, $fecha_ingreso);

            if ($response) {
                $id_inventario = Printer::getIdLastPrinter();
                $response = self::getPrinter($id_inventario);
            }

            return $response;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public static function updatePrinter($id_inventario, $serial, $marca)
    {
        try {
            $response = Printer::updatePrinter($id_inventario, $serial, $marca);
            
            if($response){
                return self::getPrinter($id_inventario);
            }else{
                return false;
            }

        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public static function updateSerialPrinter($id_inventario, $serial)
    {
        try {
            $response = Printer::updateSerialPrinter($id_inventario, $serial);
            
            if($response){
                return self::getPrinter($id_inventario);
            }else{
                return false;
            }
            
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public static function getPrinter($id_inventario)
    {
        try {
            $inventario = Printer::getPrinter($id_inventario);

            if (!empty($inventario)) {
                $arrayResponse = array(
                    'id' => $inventario->getId_inventario(),
                    'serial' => $inventario->getSerial(),
                    'marca' => $inventario->getMarca()
                );
            } else {
                $arrayResponse = array(
                    'Mensaje' => 'El id ingresado no existe'
                );
            }


            return $arrayResponse;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public static function listPrinter()
    {
        try {

            $listInventario = Printer::listPrinter();
            $arrayResponse = array();
            $cont = 0;

            foreach ($listInventario as $value) {
                $arrayResponse[$cont] = array(
                    'id' => $value->getId_inventario(),
                    'serial' => $value->getSerial(),
                    'marca' => $value->getMarca()
                );

                $cont++;
            }

            return $arrayResponse;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public static function listPrinterByMarca($marca)
    {
        try {
            $listInventario = Printer::listPrinterByMarca($marca);
            $arrayResponse = array();
            $cont = 0;

            foreach ($listInventario as $value) {
                $arrayResponse[$cont] = array(
                    'id' => $value->getId_inventario(),
                    'serial' => $value->getSerial(),
                    'marca' => $value->getMarca()
                );

                $cont++;
            }

            return $arrayResponse;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public static function deletePrinter($id_inventario)
    {
        try {
            $response = Printer::deletePrinter($id_inventario);
            return $response;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }
}
