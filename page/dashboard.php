<?php 
$nik =$auth->isLoggedIn();
$user = $auth->profile("nama", "users" , "nik=$nik");
?>
<div class="container">
  <div class="row pt-3 justify-content-center">
    <div class="col-md-12">
      <h3>Selamat Datang, <?= $user['nama'] ?></h3>
    </div>
    <div class="col-md-8">
      <?php Flasher::flash(); ?>
    </div>
  </div>
  <div class="row justify-content-center">
    <?php
    include "./components/cardDashboard.php"
    ?>
  </div>
</div>