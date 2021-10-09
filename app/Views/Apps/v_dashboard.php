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
                        <h1>Selamat Datang </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item active">Dashboard Fgis Apps</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <?= $this->include('layouts/v_alerts'); ?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <!-- Info boxes -->
                        <div class="row">
                            <?php foreach ($customer as $key => $row) : ?>
                                <div class="col-12 col-sm-3 col-md-2">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info elevation-1"><i class="far fa-building"></i></span>

                                        <div class="info-box-content">
                                            <span class="info-box-text"></span>
                                            <span class="info-box-number">
                                                <?= $row['customers_name'] ?>

                                            </span>
                                        </div>
                                        <!-- /.info-box-content -->
                                    </div>
                                    <!-- /.info-box -->
                                </div>
                                <!-- /.col -->
                            <?php endforeach; ?>
                            <!-- /.col -->


                            <!-- /.col -->
                        </div>
                        <!-- /.row -->



                        <!-- Main row -->
                        <div class="row">
                            <!-- Left col -->
                            <div class="col-md-8">
                                <!-- MAP & BOX PANE -->

                                <!-- /.card -->
                                <div class="row">

                                    <!-- /.col -->

                                    <div class="col-md-12">
                                        <!-- USERS LIST -->
                                        <div class="card card-info">
                                            <div class="card-header">
                                                <h3 class="card-title">Members <span class="badge badge-success"><i class="fas fa-user"></i></span></h3>
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                        <i class="fas fa-minus"></i>
                                                    </button>

                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body p-0">
                                                <ul class="users-list clearfix">
                                                    <?php foreach ($users as $key => $row) : ?>
                                                        <li>
                                                            <i class="far fa-user-circle text-info"></i>
                                                            <a class="users-list-name"><?= $row['name'] ?></a>

                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                                <!-- /.users-list -->
                                            </div>
                                            <!-- /.card-body -->

                                            <!-- /.card-footer -->
                                        </div>
                                        <!--/.card -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->

                                <!-- TABLE: LATEST ORDERS -->
                                <div class="card card-info">
                                    <div class="card-header border-transparent">
                                        <h3 class="card-title">Top <span class="badge badge-success">6 </span> Product</h3>

                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Nomer Part</th>
                                                        <th>Nama Produk</th>
                                                        <th>Nama Part</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($produkDashboard as $key => $d) : ?>
                                                        <tr>
                                                            <td><?= $d['part_number'] ?></td>
                                                            <td><?= $d['product_name'] ?></td>
                                                            <td><?= $d['part_name'] ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                    </div>
                                    <!-- /.card-body -->
                                    <?php if (session()->level == "admin") : ?>
                                        <div class="card-footer clearfix">
                                            <a href="<?= route_to('product') ?>" class="btn btn-sm btn-info float-right">View All Product</a>
                                        </div>
                                    <?php endif; ?>
                                    <!-- /.card-footer -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->

                            <div class="col-md-4">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box mb-3 bg-warning">
                                    <span class="info-box-icon"><i class="bi bi-file-person text-white"></i></span>

                                    <div class="info-box-content text-white">
                                        <span class="info-box-text">Members</span>
                                        <span class="info-box-number"><?= $user ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                                <div class="info-box mb-3 bg-success">
                                    <span class="info-box-icon"><i class="fas fa-box"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Produk</span>
                                        <span class="info-box-number"><?= $produkTotal ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->


                                <!-- /.card -->

                                <!-- PRODUCT LIST -->

                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>

                        <!-- /.row -->
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->

        <!-- section chart -->


        <!-- end section chart -->
    </div>
    <!-- /.content-wrapper -->


    <?= $this->endSection() ?>