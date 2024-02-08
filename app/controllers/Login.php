<?php
error_reporting(0);
class Login extends Controller{


    public function __construct(){
        //check ketika user sudah login , maka jangan diarahkan ke halaman login
        {	
            if($_SESSION['session_login'] === 'login') {
                echo "<script>alert('Anda telah login, Redirect ke halaman home!')</script>";
                echo "<script>window.location='".BASE_URL."/home'</script>";
                exit;
            }
        } 
    }

    public function index(){

        $data['title'] = 'Login';
        $this->view('auth/login',$data);
    }
    public function prosesLogin(){

        //check data to database
        $loginModel = $this->model('Login_Model');
        
        if(isset($_POST['email']) && isset($_POST['password'])){
            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                
            ];

            //check session if exists
            $row = $loginModel->checkLogin($data);

            if($row){
                $_SESSION['email'] = $row['email'];   
                $_SESSION['role'] = $row['role'];
                $_SESSION['session_login'] = 'login'; 
                $_SESSION['logged_in'] = true;
                header('location: '.BASE_URL . '/home');
                
            } else{
            Flasher::setFlash('email/password','incorrect.','danger');
			header('location: '. BASE_URL . '/login');
			exit;
            }
        }
    }
}