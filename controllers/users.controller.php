<?php
class UsersController extends Controller {

    public function __construct($data = array())
    {
        parent::__construct($data);
        $this->model = new User();
    }

    public function admin_login(){
        if($_POST && isset($_POST['login']) && isset($_POST['password'])){

            $user = $this->model->getByLogin($_POST['login']);
            $hash = md5(Config::get('salt').$_POST['password']);

            if ($user && $user['is_active'] && $hash != $user['password']){

                Session::setFlash('You are logged in as');

            } else{
                Session::set('login',$user['login']);
                Session::set('role',$user['role']);
            }

            Router::redirect('/admin/users');
        }

    }

    public function admin_logout(){
        Session::destroy();
        Router::redirect('/admin/');
    }

    public function admin_index(){
        $this->data['user'] = $this->model->getList();
    }


    public function admin_edit(){

        if($_POST){

            $id = isset($_POST['$id']) ? $_POST['$id'] : null;
            $result = $this->model->save($_POST, $id);

            if($result){
                Session::setFlash('Page was saved.');
            }
            else {
                Session::setFlash('Error');
            }
            Router::redirect('/admin/users');
        }

        if (isset($this->params[0])){
            $this->data['user'] = $this->model->getById($this->params[0]);
        }
        else{
            Session::setFlash('Wrong page id');
            Router::redirect('/admin/users');
        }
    }

    public function admin_delete(){

        if (isset($this->params[0])){
            $result = $this->model->delete($this->params[0]);


            if($result){
                Session::setFlash('Page was delete.');
            }
            else {
                Session::setFlash('Error');
            }
        }
        Router::redirect('/admin/users');
    }

    public function admin_view(){

        if($_POST){

            $id = isset($_POST['$id']) ? $_POST['$id'] : null;
            $result = $this->model->save($_POST, $id);

            if($result){
                Session::setFlash('Page was saved.');
            }
            else {
                Session::setFlash('Error');
            }
            Router::redirect('/admin/pages');
        }

        if (isset($this->params[0])){
            $this->data['user'] = $this->model->getById($this->params[0]);
        }
        else{
            Session::setFlash('Wrong page id');
            Router::redirect('/admin/pages');
        }
    }

}