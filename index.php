<?php
require_once './init.php';
// session_start();
$auth = new Auth();
if (!$auth->isLoggedIn()) {  
    echo '<script>
            window.location.href="./auth.php";
    </script>';
    // header("location: ./auth.php");
}
if ($auth->isAdmin()){
    echo '<script>
            window.location.href="./admin.php";
    </script>';
    // header("location: ./admin.php");
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
    
    <link rel="stylesheet" href="./assets/css/styles.min.css">
    <link rel="stylesheet" href="./assets/css/app.css">
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <title>SI-Survey</title>
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
                include './page/dashboard.php';

            } elseif ($page == 'survey') {
                include './page/survey_form.php';

            } elseif ($page == 'survey_answer') {
                include './page/survey_answer.php';

            } elseif ($page == 'profile') {
                include './page/profile.php';

            } elseif($page == 'info'){
                include './page/info.php';
                
            }
            else {
                include './page/404.php';
            }
        } else {
            include './page/dashboard.php';
        }
        ?>
    </div>
    <!-- Content Section -->

    <!-- footer Section -->
    <?php include './partials/footer.php' ?>
    <!-- footer Section -->
</body>

</html>