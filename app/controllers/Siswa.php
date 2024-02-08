<?php


class Siswa extends Controller
{

    public function __construct()
    { {

            if ($_SESSION['session_login'] != 'login') {
                Flasher::setFlash('Login', 'Tidak ditemukan.', 'danger');
                header('location: ' . BASE_URL . '/login');
                exit;
            }
        }
    }
    public function index()
    {
        $data['judul'] = 'Siswa';
        $data['mhs'] = $this->model('Siswa_Model')->getAllsiswa();
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('siswa/siswa', $data);
        $this->view('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'detail_siswa';
        $data['mhs'] = $this->model('Siswa_Model')->getsiswaById($id);
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('siswa/detail', $data);
        $this->view('templates/footer');
    }
    public function tambah()
    {
        //add data
        if ($this->model('Siswa_Model')->tambahDataSiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location:' . BASE_URL . '/siswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location:' . BASE_URL . '/siswa');
            exit;
        }
    }
    public function ubah()
    {
        if ($this->model('Siswa_Model')->updateDataSiswa($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location:' . BASE_URL . '/siswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location:' . BASE_URL . '/siswa');
            exit;
        }
    }
    public function hapus($id)
    {
        if ($this->model('Siswa_Model')->hapusDataSiswa($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location:' . BASE_URL . '/siswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location:' . BASE_URL . '/siswa');
            exit;
        }
    }
    public function getubah()
    {
        echo json_encode($this->model('Siswa_Model')->getsiswaById($_POST['id']));
    }

    public function cari()
    {
        $data['judul'] = 'detail_siswa';
        $data['mhs'] = $this->model('Siswa_Model')->cariDataSiswa();
        $this->view('templates/header', $data);
        $this->view('templates/navbar');
        $this->view('siswa/siswa', $data);
        $this->view('templates/footer');
    }
}
