<?php
class Database
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=mysql;dbname=db_multas;charset=utf8', 'root', 'OpenShift.2596');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}
