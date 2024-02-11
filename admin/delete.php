<?php 
$dbSurvey= new Survei();
$flash= new Flasher();
$id = $_GET['id'];
if (empty($id)) {
    echo '<script>
    window.location.href="./admin.php?p=survey_result";
    </script>';
            return false;
}
$data = [
    "id" => $id
];
$query = $dbSurvey->delete("survey", $data);
if ($query) {
    $flash->setFlash('Informasi', 'Data berhasil di hapus', 'success');
    echo '<script>
    window.location.href="./admin.php?p=survey_result";
    </script>';
            return false;
        }else{
            $flash->setFlash('Error', 'Terjadi kesalahan!', 'danger');
            echo '<script>
            window.location.href="./admin.php?p=survey_result";
            </script>';
                    return false;
}


?>