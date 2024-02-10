<?php
require_once './init.php';
$auth = new Auth();
if (!$auth->isLoggedIn()) {  
    echo '<script>
            window.location.href="./auth.php";
    </script>';
    // header("location: ./auth.php");
}
if (!$auth->isAdmin()){
    echo '<script>
            window.location.href="./index.php";
    </script>';
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