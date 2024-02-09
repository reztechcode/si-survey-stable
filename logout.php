<?php  
require_once'./init.php';

// Logout! hapus session user  
$auth = new Auth();
$auth->logout();  

if ($auth) {
    // Redirect ke login  
    header('location: ./auth.php');
}
