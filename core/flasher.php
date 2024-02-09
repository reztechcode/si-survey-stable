<?php 

class Flasher {
    public static function setFlash( $aksi, $pesan, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi'  => $aksi,
            'tipe'  => $tipe
        ];
    }

    public static function flash()
    {
        if(isset($_SESSION['flash']) ) {
            echo '<div class="fsc-1 alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert"><strong>' . $_SESSION['flash']['aksi'] . ', </strong> ' . $_SESSION['flash']['pesan'] . '
                </div>';
            unset($_SESSION['flash']);
        }
    }
}