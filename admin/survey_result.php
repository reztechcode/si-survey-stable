
<?php
$dbSurvei = new Survei();
$data = $dbSurvei->getAllData("id_survey ,username,nama, layanan_kesehatan AS lkes, layanan_pendidikan AS lpen, layanan_kebersihan AS lkeb, layanan_pangan AS lp, layanan_informasi AS li,saran_masukan", 'users', 'survey');


?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 p-4">
            <h3 class="text-center">List Data dari form survey</h3>
        </div>
        <div class="col-md-8">
      <?php Flasher::flash(); ?>
    </div>
    </div>
    <div class="row justify-content-center">
        <div class="table-responsive">
            <?php include './components/tabelSurvey.php' ?>
        </div>
    </div>
</div>

<?php include './components/modalSurvey.php' ?>



