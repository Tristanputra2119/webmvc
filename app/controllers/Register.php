<?php
error_reporting(0);
Class Register extends Controller{
    public function __construct(){
        {	
            if($_SESSION['session_login'] === 'login') {
                echo "<script>alert('maaf, anda sudah masuk, redirect ke home')</script>";
                echo "<script>window.location='".BASE_URL."/home'</script>";
                exit;
            }
        } 
    }
    public function index(){
        $data['title']='Register';
        $this->view('auth/register',$data);
    }
    

    public function process()
        {
        if ($this->model('Login_Model')->register($_POST) > 0) {
            header('Location:' . BASE_URL . '/Login');
            exit;
            }
        else {
            header('Location:' . BASE_URL . '/Register');
            Flasher::setFlash('Register','Gagal','Danger');
            exit;
            }
    }
}   
