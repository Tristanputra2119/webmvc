<?php
class Login_Model
{
    private $table = 'login';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    //check login from frontend
    public function checkLogin($data)
    {
        $query = "SELECT * FROM  $this->table WHERE email = :email";
        $this->db->query($query);
        $this->db->bind('email', $data['email']);
        $user = $this->db->single();
        $passUserDb = $user['password'];
        $passUserForm = $data['password'];
        if (password_verify($passUserForm, $passUserDb)) {
            return $user;
        } else {
            return null;
        }
    }
    public function register($data){
        //register process
        $password = password_hash($data['password'],PASSWORD_DEFAULT);
        $query = "INSERT INTO login (nama,email,password) VALUES(:nama, :email , :password) ";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $password);
        $this->db->execute();
        return $this->db->rowCount();
    }
}