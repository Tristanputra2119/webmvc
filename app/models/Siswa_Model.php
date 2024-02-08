<?php
class Siswa_Model
{
    private $table = 'siswa';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllsiswa()
    {   //get all data siswa
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getsiswaById($id)
    {
        //get siswa by id
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=' . $id);
        return $this->db->single();
    }

    public function tambahDataSiswa($data)
    {
        //get image value
        $imgName = $_FILES['image']['name'];
        $imgTmpname = $_FILES['image']['tmp_name'];
        $allowedExtensions = ['jpg', 'jpeg', 'png'];
        $imgExtension = pathinfo($imgName, PATHINFO_EXTENSION);

        if (in_array($imgExtension, $allowedExtensions)) {
            $uniqueImage = time() . '-' . $imgName;

            $uploadDirectory = "../public/img/upload/";

            $targetPath = $uploadDirectory . $uniqueImage;
            if (move_uploaded_file($imgTmpname, $targetPath)) {
                //insert data
                $query = "INSERT INTO siswa (nama, jurusan, kelas, image) VALUES (:nama, :jurusan, :kelas, :image)";
                $this->db->query($query);
                $this->db->bind('nama', $data['nama']);
                $this->db->bind('jurusan', $data['jurusan']);
                $this->db->bind('kelas', $data['kelas']);
                $this->db->bind('image', $uniqueImage);
                $this->db->execute();
                return $this->db->rowCount();
            }
        }
    }
    public function updateDataSiswa($data)
    { {
            $imgName = $_FILES['image']['name'];
            $imgTmpname = $_FILES['image']['tmp_name'];
            $allowedExtensions = ['jpeg', 'png', 'jpg'];
            $imgExtension = pathinfo($imgName, PATHINFO_EXTENSION);

            if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                $oldImage = $imgName;

                if (in_array($imgExtension, $allowedExtensions)) {
                    $uniqueImage = time() . '-' . $imgName;
                    $uploadDirectory = "../public/img/upload/";
                    $targetPath = $uploadDirectory . $uniqueImage;

                    if (move_uploaded_file($imgTmpname, $targetPath)) {
                        $oldImagePath = $uploadDirectory . $oldImage;
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                        $query = "UPDATE siswa SET nama = :nama, jurusan = :jurusan, kelas = :kelas, image = :image WHERE id = :id";
                        $this->db->query($query);
                        $this->db->bind('id', $data['id']);
                        $this->db->bind('nama', $data['nama']);
                        $this->db->bind('jurusan', $data['jurusan']);
                        $this->db->bind('kelas', $data['kelas']);
                        $this->db->bind('image', $uniqueImage);
                        $this->db->execute();
                        return $this->db->rowCount();
                    }
                }
            } else {
                //if user does not upload a new image
                $query = "UPDATE siswa SET nama = :nama, jurusan = :jurusan, kelas = :kelas WHERE id = :id";
                $this->db->query($query);
                $this->db->bind('id', $data['id']);
                $this->db->bind('nama', $data['nama']);
                $this->db->bind('jurusan', $data['jurusan']);
                $this->db->bind('kelas', $data['kelas']);
                $this->db->execute();
                return $this->db->rowCount();
            }
        }
    }

    public function hapusDataSiswa($id)
    {
        //delete data siswa and unlink the image
        $query = "SELECT image FROM siswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $result = $this->db->single();
        $imageName = $result['image'];

        $imagePath = "../public/img/upload/" . $imageName;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $query = "DELETE FROM siswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }
    public function cariDataSiswa()
    {
        //search data siswa
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM siswa WHERE nama LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultSet();
    }
}
