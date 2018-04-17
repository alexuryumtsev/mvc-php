<?php

class Registration extends Model {

    public function save($data, $id = null)
    {

        $id = (int)$id;

        $login = $this->db->escape($data['login']);

        $lastname = $this->db->escape($data['lastname']);
        $name = $this->db->escape($data['name']);
        $fathername = $this->db->escape($data['fathername']);

        $birthday = $this->db->escape($data['birthday']);
        $email = $this->db->escape($data['email']);

        $password = $this->db->escape($data['password']);
        $e_password = ($data['e_password']);

        $phone = $this->db->escape($data['phone']);
        $address = $this->db->escape($data['address']);

        if (isset($data['sex'])) {
            $sex = 'man';
        } else {
            $sex = 'woman';
        }


        if(strlen($login) < 4) {
            Session::setFlash('Login < 4!');
        }
        elseif (preg_match('/^[a-zA-Z]{4,20}$/', $login)) {
        Session::setFlash('Not correctly login!');
        }


        else {


        $sql = "SELECT id FROM users_data WHERE login = '{$login}'";
        $res_l = $this->db->query($sql);
        $sql = "SELECT id FROM users_data WHERE email = '{$email}'";
        $result = $this->db->query($sql);

        if (isset($res_l[0]) ? $res_l[0] : null ){
                Session::setFlash('Such login exist!');
        }

        elseif (isset($result[0]) ? $result[0] : null ){
            Session::setFlash('Such email exist!');
        }

        else {

        if ($password == $e_password){

            $password = md5($password);

            if (!$id){
                $sql = "insert into users_data set login = '{$login}', lastname = '{$lastname}', name = '{$name}', fathername = '{$fathername}',
                      birthday = '{$birthday}',  email = '{$email}', password = '{$password}', phone = '{$phone}',
                      address = '{$address}', sex ='{$sex}'";
            }
            else {
                $sql = "update into users_data set login = '{$login}', lastname = '{$lastname}', name = '{$name}', fathername = '{$fathername}',
                      birthday = '{$birthday}',  email = '{$email}', password = '{$password}', phone = '{$phone}',
                      address = '{$address}', sex ='{$sex}' where id = {$id}";
            }

            return $this->db->query($sql);

        } else {
            Session::setFlash('Passwords do not match!!');

        }

        }
        }
    }

    public function getList(){

        $sql =  "select * from users_data where 1";

        return $this->db->query($sql);
    }


}