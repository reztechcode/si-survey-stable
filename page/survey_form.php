<?php
$validasi = new Validate();
$survei = new survei();
$flash = new Flasher();
$dbAuth = new Auth();
$nik = $dbAuth->isLoggedIn();
$user = $dbAuth->profile("nama, nik, alamat", "users", "nik=$nik");

$survei_cek = $survei->count("nik", "survey", "nik=$nik");
if ($survei_cek > 0) {
    $flash->setFlash('Informasi', 'Maaf sepertinya anda sebelumnya telah melakukan pengisian survei, Terima Kasih', 'warning');
    echo '<script>
    window.location.href="./index.php?p=dashboard";
    </script>';
}
// Validasi data diri masih kosong
if (empty($user['nama'] && $user['alamat'])) {
    $flash->setFlash('Informasi', 'Silahkan lengkapi profil terlebih dahulu untuk melakukan pengisian survei ', 'warning');
    echo '<script>
    window.location.href="./index.php?p=profile";
    </script>';
}

if (isset($_POST['send'])) {
    
    $l_kesehatan = htmlspecialchars($_POST['kesehatan']);
    $l_pendidikan = htmlspecialchars($_POST['pendidikan']);
    $l_kebersihan = htmlspecialchars($_POST['kebersihan']);
    $l_pangan = htmlspecialchars($_POST['pangan']);
    $l_informasi = htmlspecialchars($_POST['informasi']);
    $saran_masukan = htmlspecialchars($_POST['masukan']);
    if (empty($saran_masukan)) {
        $flash->setFlash('Error', 'Terjadi Kesalahan', 'danger');
        echo '<script>
                window.location.href="./index.php?p=dashboard";
            </script>';
        return false;
    }
    
    
    // Data yang akan dimasukkan ke database
    $data = array(
        "nik" => $user['nik'],
        "layanan_kesehatan" => $l_kesehatan,
        "layanan_pendidikan" => $l_pendidikan,
        "layanan_kebersihan" => $l_kebersihan,
        "layanan_pangan" => $l_pangan,
        "layanan_informasi" => $l_informasi,
        "saran_masukan" => $saran_masukan
    );
    if (!$validasi->numericValidate($nik)) {
        $flash->setFlash('Error', 'Terjadi Kesalahan', 'danger');
        echo '<script>
                window.location.href="./index.php?p=dashboard";
                </script>';
        return false;
    }

    $id = $survei->insertSurvey("survey (nik, layanan_kesehatan, layanan_pendidikan, layanan_kebersihan, layanan_pangan, layanan_informasi, saran_masukan)", $data);
    if ($id > 0) {
        $flash->setFlash('Success', 'Survey Berhasil di kirim, terima kasih 😊', 'success');
        echo '<script>
                window.location.href="./index.php?p=dashboard";
                </script>';
        return false;
    } else {
        $flash->setFlash('Error', 'Terjadi Kesalahan2', 'danger');
        echo '<script>
                window.location.href="./index.php?p=dashboard";
                </script>';
        return false;
    }
}

?>
<div class="container">
    <div class="row pt-3 justify-content-center">
        <div class="col-md-10 pt-3">
            <div class="card">
                <div class="card-header bg-primary">
                    <h5 class="text-light">Form Survey Layanan</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $user['nama'] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nik" class="form-label">Nomor NIK</label>
                                <input type="number" class="form-control" name="nik" id="nik" value="<?= $user['nik'] ?>" readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-12">
                            <span>Keterangan pengisian:</span>
                            <ul class="list-custom">
                                <li>1.Baik Sekali, 2.Baik, 3.Cukup, 4.Kurang </li>
                                <li>Keterangan di atas berlaku untuk semua pertanyaan.</li>
                                <li>Selamat mengisi, terima kasih.</li>
                            </ul>
                        </div>
                        <hr>
                        <form action="" method="post">
                            <div class="col-md-12">
                                <div class="row justify-content-center">
                                    <?php require_once './components/formSurvey.php' ?>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row d-md-flex g-2">
                    <div class="col-md-auto">
                        <button type="submit" name="send" class="btn btn-primary">Kirim</button>
                    </div>
                    <div class="col-md-auto">
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                    <div class="col-md-auto">
                        <a href="<?= BASE_URL ?>index.php?p=dashboard" class="btn btn-warning">Kembali</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>