<?php

class User extends Model{

    public function getByLogin($login){
        $login = $this->db->escape($login);
        $sql = "select * from users where login = '{$login}' limit 1";
        $result = $this->db->query($sql);

        if(isset($result[0])){
            return $result[0];
        }
        return false;
    }


    public function getList(){

        if (isset($_GET[page])){
            $page = $_GET['page'];
        } else $page = 1;

        $kol = 3;
        $art = ($page * $kol)-$kol;

        $result = "SELECT * FROM users_data LIMIT $art,$kol";
        return $this->db->query($result);

    }


    public function getById($id){

        $id = (int)$id;
        $sql="select * from users_data where id = '{$id}' limit 1";
        $result = $this->db->query($sql);
        return isset($result[0]) ? $result[0] : null;
    }

    public function save($data, $id = null){

        if (!isset($data['lastname']) || !isset($data['name']) || !isset($data['fathername']) || !isset($data['birthday']) || !isset($data['email'])

            || !isset($data['password']) || !isset($data['phone']) || !isset($data['address']) || !isset($data['sex'])){
            return false;
        }

        $id = (int)$id;
        $lastname = $this->db->escape($data['lastname']);
        $name = $this->db->escape($data['name']);
        $fathername = $this->db->escape($data['fathername']);
        $birthday = $this->db->escape($data['birthday']);
        $email = $this->db->escape($data['email']);
        $password = $this->db->escape($data['password']);
        $phone = $this->db->escape($data['phone']);
        $address = $this->db->escape($data['address']);
        $sex = $this->db->escape($data['sex']);


        if (!$id){
            $sql = "insert into users_data set lastname = '{$lastname}', name = '{$name}', 
                    fathername = '{$fathername}', birthday = '{$birthday}', email = '{$email}', 
                    password = '{$password}', phone = '{$phone}', address = '{$address}', sex = '{$sex}'";
        }
        else {
            $sql = "update into users_data set lastname = '{$lastname}', name = '{$name}', 
                    fathername = '{$fathername}', email= '{$email}', password = '{$password}', 
                    phone = '{$phone}', address = '{$address}', sex = '{$sex}' where id = '{$id}'";
        }

        return $this->db->query($sql);
    }


    public function delete($id){
        $id = (int)$id;
        $sql = "delete from users_data where id = {$id}";
        return $this->db->query($sql);
    }

}