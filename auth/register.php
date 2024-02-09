

<?php 
$Auth = new Auth();
$validasi = new Validate();
$flash = new Flasher();
if (isset($_POST['send'])) {
    
    $nik = htmlspecialchars($_POST['nik']);
    if (!$validasi->numericValidate($nik) || strlen($nik) > 16 ) {
        session_start();
        $flash->setFlash('Error', 'Terjadi Kesalahan', 'danger');
        header("location: auth.php?p=info");
        return false;
    }

    $cek = $Auth->RegisterValidate("nik", "users", "nik=$nik");
    if ($cek > 0) {
        session_start();
        $flash->setFlash('Informasi', 'Maaf nomor NIK sudah terdaftar', 'danger');
        header("location: auth.php?p=info");
        return false;
    }
        $username = htmlspecialchars($_POST['username']);
        if (empty($username)) {
            session_start();
            $flash->setFlash('Informasi', 'Username wajib di isi!', 'danger');
            header("location: auth.php?p=info");
            return false;
        }
        $cek2 = $Auth->RegisterValidate("username", "users", "username='$username'");
        if ($cek2 > 0) { //validasi username check
            session_start();
            $flash->setFlash('Informasi', 'Maaf Username sudah terdaftar', 'danger');
            header("location: auth.php?p=info");
            return false;
        }

       
    
    $passwd = $_POST['password'];
    if (empty($passwd)) {
        session_start();
        $flash->setFlash('Informasi', 'Password wajib di isi!', 'danger');
        header("location: auth.php?p=info");
        return false;
    }
    $hashPasswd = password_hash($passwd, PASSWORD_DEFAULT);

    $data = [
        "username" => $username,
        "nik" => $nik,
        "password" => $hashPasswd,
        "role" => 'user'
    ];
    $id = $Auth->register("users(nik, username, password, role )", $data);

    if ($id > 0) {
        session_start();
        $flash->setFlash('Informasi', 'Pendaftaran akun berhasil di lakukan, Silahkan Login 🤗', 'success');
        header("location: auth.php");
    } else {
        session_start();
        $flash->setFlash('Informasi', 'Terjadi kesalahan, Silahkan Coba lagi', 'danger');
        header("location: auth.php?p=info");
    }
}
?>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-sm-12 col-lg-4 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="card-title text-center">Daftar akun</div>
                            <form action="<?= BASE_URL ?>auth.php?p=register" method="POST">
                            <div class="mb-3">
                                        <label for="nik" class="form-label">Nomor NIK <small class="text-danger">*Maksimal angka nik 16 digit</small></label>
                                        <input type="number" required class="form-control read" name="nik" id="nik"> 
                                    </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username" required  name="username" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" required name="password" autocomplete="off" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <p>sudah punya akun? <a href="<?= BASE_URL ?>auth.php" class="link">Login</a></p>
                                </div>
                                <div class="mb-3 d-grid">
                                    <button name="send" type="submit" class="btn btn-primary">Daftar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>