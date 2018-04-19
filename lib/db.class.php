<?php
class DB {

    protected $connection;

    public function __construct($host,$user,$password,$db_name){

       $dsn = "mysql:host=$host;dbname=$db_name";
       $opt = [
           PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
           PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
           PDO::ATTR_EMULATE_PREPARES   => false,
       ];

        try {
            $this->connection = new PDO($dsn,$user,$password,$opt);
        } catch (PDOException $e) {
            die('Подключение не удалось: ' . $e->getMessage());
        }

    }


    public function query($sql){
        if (!$this->connection){
            return false;
        }
        $result = $this->connection->query($sql);


        if (is_bool($result)){
            return $result;
        }

        $data = array();
        while ($row = PDO::FETCH_ASSOC){
            $data[] = $row;
        }
        return $data;
    }
    public function escape($str){
        return $this->connection->quote($str);
    }
}