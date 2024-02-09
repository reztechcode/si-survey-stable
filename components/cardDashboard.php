<?php 
$dbAuth = new Auth();
$nik =$dbAuth->isLoggedIn();
$config = new Survei();
$survey = $config->count("nik", "survey", "nik=$nik");
if ($survey > 0){
      echo '<div class="col-md-8 pt-3">
      <div class="card">
        <div class="card-header bg-success">
          <h5 class="text-light">Anda sudah mengisi form survei</h5>
        </div>
        <div class="card-body">
          <p>Anda Telah mengisi form survey, Form survey ini hanya bisa di isi 1 (satu) kali saja. Terima Kasih😀</p>
          <a href="./index.php?p=survey_answer" class="btn btn-success">Lihat jawaban survey</a>
        </div>
      </div>
    </div>';
    return true;
  }else{
      echo '<div class="col-md-8 pt-3 pb-3">
      <div class="card">
        <div class="card-header bg-primary">
          <h5 class="text-light">Isi Form Survey</h5>
        </div>
        <div class="card-body">
          <p>Anda belum mengisi survey. Silahkan, anda dapat mengisi survey dengan mengakses atau klik tombol di bawah. Terima Kasih😀</p>
          <a href="./index.php?p=survey" class="btn btn-primary">Isi Survey</a>
        </div>
      </div>
    </div>';
  }
?>