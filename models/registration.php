<?php

class Registration extends Model {

    public function save($data, $id = null) {

        $id = (int)$id;
        $lastname = $this->db->escape($data['lastname']);
        $name = $this->db->escape($data['name']);
        $fathername = $this->db->escape($data['fathername']);

        $birthday = $this->db->escape($data['birthday']);
        $email = $this->db->escape($data['email']);
        $password = $this->db->escape($data['password']);

        $e_password = ($data['e_password']);

        $phone = $this->db->escape($data['phone']);
        $address = $this->db->escape($data['address']);

            if (isset($data['sex'])){
                $sex = 'man';
            } else {
                $sex = 'woman';
            }

        $row = "SELECT id FROM  users_data  WHERE email = '{$email}'";

        $result = $this->db->query($row);
        if ($result > 0) {

            Session::setFlash('Such email exists');
        } else {

                Session::setFlash('Ok');
            }


        if ($password == $e_password){


            if (!$id){
                $sql = "insert into users_data set lastname = '{$lastname}', name = '{$name}', fathername = '{$fathername}',
                      birthday = '{$birthday}',  email = '{$email}', password = '{$password}', phone = '{$phone}',
                      address = '{$address}', sex ='{$sex}'";
            }
            else {
                $sql = "update into users_data set lastname = '{$lastname}', name = '{$name}', fathername = '{$fathername}',
                      birthday = '{$birthday}',  email = '{$email}', password = '{$password}', phone = '{$phone}',
                      address = '{$address}', sex ='{$sex}' where id = {$id}";
            }

            return $this->db->query($sql);

        } else {
            Session::setFlash('Passwords do not match!!');

        }




    }

    public function getList(){

        $sql =  "select * from users_data where 1";

        return $this->db->query($sql);
    }


}