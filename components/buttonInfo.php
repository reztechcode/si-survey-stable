<?php 

if (@$_GET['ref'] == 'login') {
    echo '<a href="'.BASE_URL.'auth.php" class="btn btn-primary">Kembali Login</a>';
}else{
    echo '<a href="'.BASE_URL.'auth.php?p=register" class="btn btn-primary">Kembali daftar akun</a>';
}

?>