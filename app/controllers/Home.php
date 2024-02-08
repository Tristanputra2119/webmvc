<?php

class Home extends Controller{
    
    public function Index(){
        $data['judul'] = 'home';
        $data['nama']= $this->model('User_Model')->getUser();
        $this->view('templates/navbar');
        $this->view('templates/header',$data);
        $this->view('home/admin',$data);
        $this->view('home/user',$data);
        $this->view('templates/footer');
    }
}
?> 