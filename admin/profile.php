<?php 
$flash = new Flasher();
$dbAuth = new Auth();
$nik =$dbAuth->isLoggedIn();
$user = $dbAuth->profile("nama, nik, alamat", "users" , "nik=$nik");

if (isset($_POST['send'])) {
    $nama = htmlspecialchars($_POST['nama']);
        if (empty($nama)) {
            $flash->setFlash('Informasi', 'Username wajib di isi!', 'danger');
            echo '<script>
                window.location.href="./index.php?p=profile";
                </script>';
            return false;
        }

    $alamat = htmlspecialchars($_POST['alamat']);
        if (empty($alamat)) {
            $flash->setFlash('Informasi', 'Username wajib di isi!', 'danger');
            echo '<script>
                window.location.href="./index.php?p=profile";
                </script>';
            return false;
        }

    $data = [
        "nama" => $nama,
        "alamat" => $alamat
    ];
    $update = $dbAuth->updateProfile("users", $data, "nik =$nik");
    // var_dump($update);
    if ($update >0) {
            $flash->setFlash('Sukses', 'Profile berhasil di perbarui!', 'success');
            echo '<script>
                window.location.href="./index.php?p=profile";
                </script>';
            return false;
        
    }else{
            $flash->setFlash('Error', 'Silahkan coba lagi 🙏', 'danger');
            echo '<script>
                window.location.href="./index.php?p=profile";
                </script>';
            return false;

    }
}

?>
<div class="container">
        <div class="row justify-content-center pt-3">
            <div class="col-md-8">
            <?php Flasher::flash(); ?>
            </div>
            <div class="col-md-8">
                <div class="card bg-outline-info">
                    <div class="card-header bg-primary">
                        <h5 class="text-light">Haii - user, Username : usr1</h5>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="row p-2">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="nama" id="name"
                                            value="<?= $user['nama'] ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nik" class="form-label">Nomor NIK</label>
                                        <input type="number" class="form-control read" name="nik" id="nik"
                                            value="<?= $user['nik'] ?>" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control" name="alamat" id="alamat"
                                            rows="3"><?= $user['alamat'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-md-flex g-2">
                                <div class="col-auto">
                                    <button type="submit" name="send" class="btn btn-sm btn-primary">Update Profile</button>
                                </div>
                                <div class="col-auto">
                                    <a href="<?= BASE_URL ?>/index.php?p=dashboard" class="btn btn-sm btn-warning">Kembali ke
                                        dashboard</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>