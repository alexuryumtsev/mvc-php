<?php
class Login{

    protected $db;

    public function  __construct()
    {
        $this->db = App::$db;
    }


    public function getByLogin($login){

        $sql = "SELECT * FROM users WHERE login = :login";
        $sth = $this->db->prepare($sql);

        $sth->execute(array(':login' => $login));
        $row = $sth->fetch(PDO::FETCH_ASSOC);

        if($row === false){
            return false;
        }
        return $row;
    }
}