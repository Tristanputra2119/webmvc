<?php
class Flasher
{
    public static function setFlash($pesan, $aksi, $tipe)
    {

        $_SESSION['flash'][] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe,
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            foreach ($_SESSION['flash'] as $message) {
                echo '<div class="alert alert-' . $message['tipe'] . ' alert-dismissible fade show" role="alert">
                Data <strong>' . $message['pesan'] . '</strong> ' . $message['aksi'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
            unset($_SESSION['flash']);
        }
    }
}
