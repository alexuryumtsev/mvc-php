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

        $phone = $this->db->escape($data['phone']);
        $address = $this->db->escape($data['address']);
      //  $sex = isset($data['sex']) ? 1:0;

            if (isset($data['men'])){
                $sex = 'man';
            } else {
                $sex = 'woman';
            }

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

    }


}