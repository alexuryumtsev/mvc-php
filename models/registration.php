<?php

class Registration extends Model {

    public function save($data, $id = null)
    {

        $id = (int)$id;

        $login = $data['login'];

        $lastname = $data['lastname'];
        $name = $data['name'];
        $fathername = $data['fathername'];

        $birthday = $data['birthday'];
        $email = $data['email'];

        $password = $data['password'];
        $e_password =$data['e_password'];

        $phone = $data['phone'];
        $address = $data['address'];

        if (isset($data['sex'])) {
            $sex = $data['sex'];
        }

        if(strlen($login) < 4) {
            Session::setFlash('Login < 4!');
        }
        elseif (preg_match('/^[a-zA-Z]{4,20}$/', $login)) {
        Session::setFlash('Not correctly login!');
        }


       else {


        $sql = "SELECT id FROM users_data WHERE login = :login";
            $sth = $this->db->prepare($sql);
            $sth->execute(array(':login' => $login));
            $row_l = $sth->fetchAll(PDO::FETCH_ASSOC);

        $sql = "SELECT id FROM users_data WHERE email = :email";
            $sth = $this->db->prepare($sql);
            $sth->execute(array(':email' => $email));
            $row = $sth->fetchAll(PDO::FETCH_ASSOC);


        if (isset($row_l[0]) ? $row_l[0] : null ){
                Session::setFlash('Such logins exist!');
        }

        elseif (isset($row[0]) ? $row[0] : null ){
            Session::setFlash('Such email exist!');
        }

        else {

        if ($password == $e_password){

            $password = md5($password);

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

        } else {
            Session::setFlash('Passwords do not match!!');

        }

        }
       }
    }

    public function getList(){

        $sql =  "select * from users_data where 1";

        $sth =  $this->db->query($sql);
        $row = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }


}