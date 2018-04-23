<?php

class User extends Model{

    public function getList(){

        if (isset($_GET['page'])){
            $page = $_GET['page'];
        } else $page = 1;

        $kol = 3;
        $art = ($page * $kol)-$kol;

        $sql = "SELECT * FROM users_data LIMIT $art,$kol";
        $sth =  $this->db->query($sql);
        $row = $sth->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($row); die;
        return $row;


    }


    public function getById($id){

        $id = (int)$id;
        $sql="select * from users_data where id = :id";
        $sth =  $this->db->prepare($sql);
        $sth->execute(array(':id' => $id));
        $row = $sth->fetchAll(PDO::FETCH_ASSOC);
        return isset($row[0]) ? $row[0] : null;
    }

    public function save($data, $id = null){

        $id = (int)$id;
        $login = $data['login'];
        $lastname = $data['lastname'];
        $name = $data['name'];
        $fathername =$data['fathername'];
        $birthday = $data['birthday'];
        $email = $data['email'];
        $password = $data['password'];
        $phone = $data['phone'];
        $address =$data['address'];
        $sex = $data['sex'];


        if (!$id){
            $sql = "insert into users_data set login = :login, lastname = :lastname, name = :name, 
                    fathername = :fathername, birthday = :birthday, email = :email, password = :password,
                    phone = :phone, address = :address, sex = :sex";
        }
        else {
            $sql = "update into users_data set login = :login, lastname = :lastname, name = :name, 
                    fathername = :fathername, birthday = :birthday, email = :email, password = :password,
                    phone = :phone, address = :address, sex = :sex";
        }

        $sth = $this->db->prepare($sql);
        $sth->execute(array(':login' => $login,':lastname' => $lastname,':name' => $name,':fathername' => $fathername,':birthday' => $birthday,
        ':email' => $email,':password' => $password,':phone' => $phone, ':address' => $address,':sex' => $sex));
        $row = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }


    public function delete($id){
        $id = (int)$id;
        $sql = "delete from users_data where id = :id";

        $sth = $this->db->prepare($sql);
        $sth->execute(array(':id' => $id));
        $row = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

}