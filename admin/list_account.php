<?php 
$dbAuth = new Auth();
$data = $dbAuth->getData("nik,nama,username,alamat,role", 'users');
 ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8 p-4">
      <h3 class="text-center">List Akun Terdaftar</h3>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nik</th>
            <th scope="col">Username</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Role</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $i=1;
          foreach ($data as $d) : ?>
          <tr>
            <th scope="row"><?= $i++ ?></th>
            <td><?= $d['nik'] ?></td>
            <td><?= $d['username'] ?></td>
            <td><?= $d['nama'] ?></td>
            <td><?= $d['alamat'] ?></td>
            <td><?php if ($d['role'] == 'admin' ) {
              echo '<span
              class="badge bg-primary"
              >Admin</span
            >';
            }else{
              echo '<span
              class="badge bg-secondary"
              >User</span
            >';
            } ?></td>
            
            
          </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

