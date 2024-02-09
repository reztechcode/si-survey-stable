<?php 
    $flash = new Flasher();
if (isset($_POST['send'])) {
    $validasi = new Validate();
    $link = infologin;
    $username = htmlspecialchars($_POST['username']);
    if (empty($username)) {
        session_start();
        $flash->setFlash('Informasi', 'Username wajib di isi!', 'danger');
        header("location: $link");
        return false;
    }
    $password = htmlspecialchars($_POST['password']);
    if (empty($password)) {
        session_start();
        $flash->setFlash('Informasi', 'Username wajib di isi!', 'danger');
        header("location: $link");
        return false;
    }

    $db = new Auth;
    $login = $db->login($username, $password);
    session_start();
    if ($login == 200) {
        $flash->setFlash('Sukses', 'Anda berhasil login, Selamat datang👋', 'success');
        header("Location: ./index.php");
    }elseif ($login == 403){
        $flash->setFlash('Error', 'Username atau password salah', 'danger');
        header("location: $link");
            return false;
        
    }else{
        $flash->setFlash('Error', 'Username tidak di temukan', 'danger');
        header("location: $link");
            return false;
        
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
                        <?php 
                        session_start();
                        Flasher::flash(); 
                        ?>
                        <div class="card-title text-center">Masuk</div>
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username" name="username" class="form-control" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" name="password" required class="form-control" autocomplete="off">
                                </div>
                                <div class="mb-3">
                                    <p>belum punya akun? <a href="<?= BASE_URL ?>auth.php?p=register" class="link">Daftar disini</a></p>
                                </div>
                                <div class="mb-3 d-grid">
                                    <button name="send" type="submit" class="btn btn-primary" >Masuk..</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>