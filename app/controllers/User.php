<?php
Class User extends Controller{
    public function __construct()
    {
        if($_SESSION['session_login'] != 'login') {
            Flasher::setFlash('Login','Tidak ditemukan.','danger');
            header('location: '. BASE_URL . '/login');
            exit;
        }
    }
    public function index(){
       
            $data['judul'] = 'aaa';
            $data['nama']= $this->model('User_Model')->getUser();
            $this->view('templates/navbar');
            $this->view('templates/header',$data);
            $this->view('home/user',$data);
            $this->view('templates/footer');
        
    }
}