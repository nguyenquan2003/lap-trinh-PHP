<?php
class Db{
    public static $conn = null;
    function __construct()
    {
        Db::$conn = new PDO('mysql:host='.HOST.'; dbname='. DB, U, P);
        Db::$conn->query('set names utf8');
    }
    function sqlSelect($sql, $arrParams=[])
    {
        $stm = Db::$conn->prepare($sql);
        $stm->execute($arrParams);
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    function sqlUpdate($sql, $arrParams=[])
    {
        $stm = Db::$conn->prepare($sql);
        $stm->execute($arrParams);
        return $stm->rowCount();
    }
}