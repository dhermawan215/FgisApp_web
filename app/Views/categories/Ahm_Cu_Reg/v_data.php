<?= $this->extend('layouts/template_layouts') ?>

<?= $this->section('content') ?>

<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <?= $this->include('layouts/v_navbar'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <?= $this->include('layouts/v_sidebar'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4>AHM CU</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                            <li class="breadcrumb-item active">AHM CU</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mx-1 py-1">
                            <?= $subtitle ?>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-tag text-white"></i></span>
                                    <div class="info-box-content">
                                        <a href="/cu44" class="info-box-text text-bold text-decoration-none text-secondary">CU-44</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-tag text-white"></i></span>
                                    <div class="info-box-content">
                                        <a href="" class="info-box-text text-bold text-decoration-none text-secondary ">CU-37S</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-tag text-white"></i></span>
                                    <div class="info-box-content">
                                        <a href="" class="info-box-text text-bold text-decoration-none text-secondary ">CU-37R</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-tag text-white"></i></span>
                                    <div class="info-box-content">
                                        <a href="" class="info-box-text text-bold text-decoration-none text-secondary ">CU-33</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-tag text-white"></i></span>
                                    <div class="info-box-content">
                                        <a href="" class="info-box-text text-bold text-decoration-none text-secondary ">CU-33C</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-tag text-white"></i></span>
                                    <div class="info-box-content">
                                        <a href="" class="info-box-text text-bold text-decoration-none text-secondary ">CU-33D</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-md-2">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-tag text-white"></i></span>
                                    <div class="info-box-content">
                                        <a href="<?= route_to('cu44A') ?>" class="info-box-text text-bold text-decoration-none text-secondary ">CU-44A</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-tag text-white"></i></span>
                                    <div class="info-box-content">
                                        <a href="" class="info-box-text text-bold text-decoration-none text-secondary ">CU-26P1</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-tag text-white"></i></span>
                                    <div class="info-box-content">
                                        <a href="" class="info-box-text text-bold text-decoration-none text-secondary ">CU-39C</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-tag text-white"></i></span>
                                    <div class="info-box-content">
                                        <a href="" class="info-box-text text-bold text-decoration-none text-secondary ">CU-21R</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-tag text-white"></i></span>
                                    <div class="info-box-content">
                                        <a href="" class="info-box-text text-bold text-decoration-none text-secondary ">CU-21Q</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-tag text-white"></i></span>
                                    <div class="info-box-content">
                                        <a href="" class="info-box-text text-bold text-decoration-none text-secondary ">CU-33D</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <?= $this->endSection() ?>