<?php 
$dbSurvey= new Survei();
$flash= new Flasher();
$id = $_GET['id'];
if (empty($id)) {
            header("location: ./admin.php?p=survey_result");
            return false;
}
$data = [
    "id" => $id
];
$query = $dbSurvey->delete("survey", $data);
if ($query) {
    $flash->setFlash('Informasi', 'Data berhasil di hapus', 'success');
            header("location: ./admin.php?p=survey_result");
            return false;
        }else{
            $flash->setFlash('Error', 'Terjadi kesalahan!', 'danger');
                    header("location: ./admin.php?p=survey_result");
                    return false;
}


?>