<?php
require_once './init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (isset($_GET['p'])) {
                echo 'Sign UP Si-Survey';
            } else {
                echo  'Login Si-Survey - Auth';
            }
            ?></title>

    <meta content="Aplikasi Pengisian Survey" name="description">
    <meta content="portal,web,app, survei" name="keywords">
    <meta property="og:image" content="<?= BASE_URL ?>assets/img/imgcontent.png" />
    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= BASE_URL ?>assets/img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= BASE_URL ?>assets/img/favicon-16x16.png">

    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/styles.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>

<body>

    <!-- Content Section -->
    <?php
    if (isset($_GET['p']) > 0) {
        $page = $_GET['p'];
        if ($page == 'login') {
            include './auth/login.php';
        } elseif ($page == 'register') {
            include './auth/register.php';
        } elseif ($page == 'info') {
            include './page/info.php';
        } else {
            include './auth/login.php';
        }
    } else {
        include './auth/login.php';
    }
    ?>
    <!-- Content Section -->

    <!-- footer Section -->
    <?php include './partials/footer.php' ?>
    <!-- footer Section -->
</body>

</html>