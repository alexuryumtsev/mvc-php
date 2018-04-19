<?php
class Login extends Model{

    public function getByLogin($login){

        $sql = $this->connecton->prepare("SELECT * FROM users WHERE login = :login");
        $sql->execute(array('login' => $login));

        $result = $this->connection->query($sql);
        
        if(isset($result[0])){
            return $result[0];
        }
        return false;
    }
}