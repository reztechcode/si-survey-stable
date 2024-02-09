<nav class="navbar navbar-expand-lg text-light navbar-dark">
  <div class="container-sm">
    <a class="navbar-brand" href="#"><?php if (!$auth->isAdmin()) {
                                        echo 'Survey Layanan';
                                      } else {
                                        echo 'Halaman Admin';
                                      } ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php if (!$auth->isAdmin()) : ?>
        <ul class="navbar-nav ms-auto ps-2 mb-2 mb-lg-0 d-flex align-items-center">
          <li class="nav-item">
            <a class="nav-link link-nav" aria-current="page" href="<?= BASE_URL ?>index.php?p=dashboard">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-nav" aria-current="page" href="<?= BASE_URL ?>index.php?p=profile">User</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-nav" aria-current="page" href="<?= BASE_URL ?>logout.php">Logout</a>
          </li>
        <?php endif; ?>
        <?php if ($auth->isAdmin()) : ?>
          <ul class="navbar-nav ms-auto ps-2 mb-2 mb-lg-0 d-flex align-items-center">
            <li class="nav-item">
              <a class="nav-link link-nav" aria-current="page" href="<?= BASE_URL ?>admin.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-nav" aria-current="page" href="<?= BASE_URL ?>admin.php?p=survey_result">Survey</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-nav" aria-current="page" href="<?= BASE_URL ?>admin.php?p=list_account">Pengguna</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-nav" aria-current="page" href="<?= BASE_URL ?>admin.php?p=profile">My Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-nav" aria-current="page" href="<?= BASE_URL ?>logout.php">Logout</a>
            </li>
          </ul>
        <?php endif; ?>
        </ul>
    </div>
  </div>
</nav>