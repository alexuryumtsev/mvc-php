<?php
class LoginsController extends Controller{

   public function __construct(array $data = array())
   {
       parent::__construct($data);
       $this->model = new Login();
   }

    public function index(){
        if($_POST && isset($_POST['login']) && isset($_POST['password'])){

            $user = $this->model->getByLogin($_POST['login']);
            $hash = md5(Config::get('salt').$_POST['password']);

            if ($user && $user['is_active'] && $hash != $user['password']){

            } else{
                Session::set('login',$user['login']);
                Session::set('role',$user['role']);
            }

            Router::redirect('/admin/users');
        }

    }


}