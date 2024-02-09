
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Layanan Kesehatan</th>
            <th scope="col">Layanan Pendidikan</th>
            <th scope="col">Layanan Kebersihan</th>
            <th scope="col">Layanan Pangan</th>
            <th scope="col">Layanan Informasi</th>
            <th scope="col">Saran dan Masukan</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($data as $d) : ?>
            <tr>
                <th scope="row"><?= $i++ ?></th>
                <td><a href="#<?= $d['username'] ?>" target="_blank"><?= $d['nama'] ?></a></td>
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
                <td><button type="button" class="btn btn-sm btn-primary tampilModal" data-bs-toggle="modal" data-id="<?= $d['id_survey'] ?>" data-bs-target="#modalDetailSaran">
                        Lihat Saran
                    </button></td>
                            
                <td><a href="<?= BASE_URL ?>admin.php?p=delete&id=<?= $d["id_survey"] ?>" onclick="return confirm('Apakah yakin data akan di hapus??');" class="btn btn-danger btn-sm">delete</a></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
