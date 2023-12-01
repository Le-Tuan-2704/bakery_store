<?php
class database
{

    public function pdo_get_connection()
    {
        $servername = 'localhost';
        $dbname = 'bakery_store';
        $username = 'root';
        $pass = '';

        try {
            $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pass);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $con;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            echo $ex->getLine();
            echo $ex->getFile();
        }
    }
    //insert into loai(ten_loai) values(?), update,delete
    public function pdo_execute($sql, $sql_args = [])
    {
        try {
            $con = $this->pdo_get_connection();
            if ($con) {
                $stmt = $con->prepare($sql);
                $stmt->execute($sql_args);
            }
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
    
    // truy vấn nhiều dữ liệu 
    public function pdo_query($sql, $sql_args = [])
    {
        try {
            $con = $this->pdo_get_connection();
            $stmt = $con->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $rows;
        } catch (PDOException $ex) {
            throw $ex;
        }
    }


    // truy vấn một dữ liệu
    public function pdo_query_one($sql, $sql_args = [])
    {
        try {
            $con = $this->pdo_get_connection();
            $stmt = $con->prepare($sql);
            $stmt->execute($sql_args);
            $rows = $stmt->fetch(PDO::FETCH_OBJ);
            return $rows;
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
}