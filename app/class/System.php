<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/app/app.php';

abstract class System
{
    public static function conexion(){
        try {
            $dsn = "mysql:host=" . Constants::$IP_BD . ";dbname=" . Constants::$NAME_BD;
            $connect = new PDO($dsn, Constants::$USER_BD, Constants::$PASS_BD, array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
            return $connect;
        } catch (\Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }
}
?>