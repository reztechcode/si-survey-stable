<?php 
$dbSurvei = new Survei();
$id=$_POST['id'];
$data = $dbSurvei->getData("saran_masukan", 'survey', "id_survey= $id");
$json = json_encode($data);
echo $json;
?>