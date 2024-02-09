<?php
require_once './init.php';
session_start();
$auth = new Auth();
if (!$auth->isLoggedIn()) {  
    header("location: ./auth.php");
}
if (!$auth->isAdmin()){
    header("location: ./index.php");
}
?>
 <?php
        if (isset($_GET['p']) > 0) {
            $page = $_GET['p'];
            if ($page == 'saran') {
                include './api/saran.php';

            }
            else {
                echo  http_response_code(404);
            }
        } else {
            echo http_response_code();
        }
        ?>