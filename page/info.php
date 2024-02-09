<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-sm-12 col-lg-4 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="card-title">Informasi</div>
                            <?php 
                            session_start();
                            Flasher::flash(); 
                            ?>
                            <div class="mb-3">
                                <?php 
                                include './components/buttonInfo.php';
                                 ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>