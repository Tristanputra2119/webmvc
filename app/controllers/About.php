<?php

class About extends Controller{
    public function __construct(){
        {	
            if($_SESSION['session_login'] != 'login') {
                Flasher::setFlash('Login','Tidak ditemukan.','danger');
                header('location: '. BASE_URL . '/login');
                exit;
            }
        } 
    }
    public function index($nama ='Tristan',$pekerjaan ='Web', $umur=17){
        $data['judul'] = 'about me';
        $data['nama'] = $nama; 
        $data ['pekerjaan'] = $pekerjaan;
        $data ['umur'] = $umur;
        $this->view('templates/navbar');
        $this->view('templates/header' , $data);
        $this->view('about/index' ,$data);
        $this->view('templates/footer');
    }
    
    public function page(){
        $data['judul'] = 'about me';
        $this->view('templates/header' , $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}
?>