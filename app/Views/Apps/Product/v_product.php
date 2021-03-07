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
                        <h1 class="text-weight-300"><?= $subtitle ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                            <li class="breadcrumb-item active">Produk</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-success">
                                <h3 class="card-title text-bold">Tabel Produk</h3>

                                <div class="card-tools">
                                    <a href="<?= base_url('/admin/product/create') ?>" class="btn btn-sm btn-secondary float-right text-white"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                                </div>

                            </div>
                            <div class="card-body p-0">
                                <table class="table table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th style="width: 2px">#</th>
                                            <th>Produk Name</th>
                                            <th>Part Number</th>
                                            <th>Part Name</th>
                                            <th>Jenis</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>CU-33</td>
                                            <td>
                                                30400-K60-B11-M1
                                            </td>
                                            <td>Engine Control Unit</td>
                                            <td>IDF</td>
                                            <td>
                                                <a href="#"><i class="fa fa-edit"></i></a>
                                                <a href="#"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                <hr>
                                <div class="card-tools">
                                    <ul class="pagination pagination-sm float-right mr-3">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <?= $this->endSection() ?>