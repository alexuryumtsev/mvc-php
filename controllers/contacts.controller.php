<?php
class ContactsController extends Controller{

    public function __construct(array $data = array())
    {
        parent::__construct($data);
        $this->model = new Registration();
    }

    public function index(){

        if($_POST){

            if ($this->model->save($_POST)){
                Session::setFlash('Thank you! Your message was sand successfully!');
            }
            else Session::setFlash('Error');
        }
    }

    public function admin_index(){
        $this->data=$this->model->getList();
    }

}