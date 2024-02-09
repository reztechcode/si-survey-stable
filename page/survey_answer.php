<?php
$dbAuth = new Auth();
$nik = $dbAuth->isLoggedIn();
$dbSurvei = new Survei();
$data = $dbSurvei->getData("layanan_kesehatan AS lkes, layanan_pendidikan AS lpen, layanan_kebersihan AS lkeb, layanan_pangan AS lp, layanan_informasi AS li,saran_masukan", 'survey',"nik='$nik'");
// var_dump($data);

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 p-4">
            <h4 class="text-center">Hasil jawaban pengisian survey anda</h4>
        </div>
        <div class="col-md-8">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Layanan Kesehatan</th>
                            <th scope="col">Layanan Pendidikan</th>
                            <th scope="col">Layanan Kebersihan</th>
                            <th scope="col">Layanan Pangan</th>
                            <th scope="col">Layanan Informasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $d) : ?>
                            <tr>
                                <td>
                                    <?php
                                    if ($d['lkes'] == '1') {
                                        echo 'Baik Sekali';
                                    } elseif ($d['lkes'] == '2') {
                                        echo 'Baik';
                                    } elseif ($d['lkes'] == '3') {
                                        echo 'Cukup';
                                    } elseif ($d['lkes'] == '4') {
                                        echo 'Kurang';
                                    } else {
                                        echo 'Tidak mengisi data';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($d['lpen'] == '1') {
                                        echo 'Baik Sekali';
                                    } elseif ($d['lpen'] == '2') {
                                        echo 'Baik';
                                    } elseif ($d['lpen'] == '3') {
                                        echo 'Cukup';
                                    } elseif ($d['lpen'] == '4') {
                                        echo 'Kurang';
                                    } else {
                                        echo 'Tidak mengisi data';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($d['lkeb'] == '1') {
                                        echo 'Baik Sekali';
                                    } elseif ($d['lkeb'] == '2') {
                                        echo 'Baik';
                                    } elseif ($d['lkeb'] == '3') {
                                        echo 'Cukup';
                                    } elseif ($d['lkeb'] == '4') {
                                        echo 'Kurang';
                                    } else {
                                        echo 'Tidak mengisi data';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($d['lp'] == '1') {
                                        echo 'Baik Sekali';
                                    } elseif ($d['lp'] == '2') {
                                        echo 'Baik';
                                    } elseif ($d['lp'] == '3') {
                                        echo 'Cukup';
                                    } elseif ($d['lp'] == '4') {
                                        echo 'Kurang';
                                    } else {
                                        echo 'Tidak mengisi data';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if ($d['li'] == '1') {
                                        echo 'Baik Sekali';
                                    } elseif ($d['li'] == '2') {
                                        echo 'Baik';
                                    } elseif ($d['li'] == '3') {
                                        echo 'Cukup';
                                    } elseif ($d['li'] == '4') {
                                        echo 'Kurang';
                                    } else {
                                        echo 'Tidak mengisi data';
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
    <div class="col-md-8 pt-3">
      <div class="card">
        <div class="card-header bg-success">
          <h5 class="text-light">Saran Dan masukan dari anda</h5>
        </div>
        <div class="card-body">
          <p><?php 
          foreach ($data as $d) {
            echo $d['saran_masukan'];
          }
          ?></p>
        </div>
      </div>
    </div>
    </div>
</div>