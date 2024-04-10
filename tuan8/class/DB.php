<?php 
class DB{
    private $conn = null;
    function __construct()
    {
        $this->conn= new PDO('mysql:host=localhost;dbname=bansach', 'root', '');
        $this->conn->query('set names utf8');
    }
    function selectQuery($sql)//thu thi cac sql select
    {
        $stm = $this->conn->query($sql);
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
    function updateQuery($sql)//thu thi cac sql delete
    {
        $stm = $this->conn->query($sql);
        return $stm->rowCount();
    }
}