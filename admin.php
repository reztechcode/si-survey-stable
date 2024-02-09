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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Aplikasi Pengisian Survey" name="description">
    <meta content="portal,web,app, survei" name="keywords">
    <meta property="og:image" content="<?= BASE_URL ?>assets/img/imgcontent.png" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_URL ?>assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL ?>assets/img/favicon-16x16.png">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/styles.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <title>Admin SI-Survey</title>
</head>

<body>
    <!-- Nav Section -->
    <?php include './partials/navbar.php' ?>
    <!-- Nav Section -->

    <!-- Content Section -->
    <div id="content-wrap">

        <?php
        if (isset($_GET['p']) > 0) {
            $page = $_GET['p'];
            if ($page == 'dashboard') {
                include './admin/dashboard.php';

            } elseif ($page == 'survey_result') {
                include './admin/survey_result.php';

            } elseif ($page == 'delete') {
                include './admin/delete.php';

            } elseif ($page == 'saran') {
                include './admin/saran.php';

            } elseif ($page == 'list_account') {
                include './admin/list_account.php';

            } elseif ($page == 'profile') {
                include './admin/profile.php';

            } elseif($page == 'info'){
                include './admin/info.php';
                
            }
            else {
                include './page/404.php';
            }
        } else {
            include './admin/dashboard.php';
        }
        ?>
    </div>
    <!-- Content Section -->

    <!-- footer Section -->
    <?php include './partials/footer.php' ?>
    <!-- footer Section -->
    
</body>

</html>