<?php 
$dbSurvei = new Survei();
$dbAuth = new Auth();
$c_survey = $dbSurvei->count("nik", "survey");
$c_user = $dbAuth->count("nik", "users");
$nik = $dbAuth->isLoggedIn();
$profile = $dbAuth->profile("nama", "users", "nik=$nik");
?>
<div class="container">
        <div class="row justify-content-center pt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5>Selamat datang <?= $profile['nama'] ?>, anda berada di halaman admin</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h5 class="text-light">Form Survey</h5>
                    </div>
                    <div class="card-body">
                        <p>Jumlah pengisi form survey saat ini berjumlah sebanyak: <?=$c_survey ?></p>
                        <a href="<?= BASE_URL ?>admin.php?p=survey_result" class="btn btn-primary">Lihat jawban survey</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="text-light">List Akun</h5>
                    </div>
                    <div class="card-body">
                        <p>Jumlah akun yang telah terdaftar saat ini berjumlah sebanyak: <?= $c_user ?></p>
                        <a href="<?= BASE_URL ?>admin.php?p=list_account" class="btn btn-success">Lihat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>