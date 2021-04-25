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
                            <li class="breadcrumb-item"><a href="<?= route_to('home') ?>">Home</a></li>
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
                    <?= $this->include('layouts/v_alerts'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-gradient-success">
                            <h3 class="card-title text-bold">Tabel Produk</h3>

                            <div class="card-tools">
                                <a href="<?= route_to('productInsert') ?>" class="btn btn-sm btn-primary float-right text-white"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
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
                                        <th>Kategori</th>
                                        <th>Customer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php $i = 1 + (($page - 1) * 20); ?>
                                    <?php foreach ($getData as $key => $value) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $value['product_name'] ?></td>
                                            <td>
                                                <?= $value['part_number'] ?>
                                            </td>
                                            <td><?= $value['part_name'] ?></td>
                                            <td><?= $value['jenis'] ?></td>
                                            <td><?= $value['category_name'] ?></td>
                                            <td><?= $value['customers_name'] ?></td>

                                            <td>
                                                <?php $id = bin2hex($encrypter->encrypt($value['product_id'])); ?>
                                                <a href="/admin/product/edit/<?= $id ?>"><i class="fa fa-edit"></i></a>
                                                <form action="/admin/product/<?= $value['product_id'] ?>" method="POST" class="d-inline">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn" onclick="return confirm('Apakah anda yakin ingin menghapus?')">
                                                        <i class="fas fa-ban text-danger"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <hr>
                            <div class="card-tools">
                                <?= $pager->links('product', 'product_paginate'); ?>

                            </div>

                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <?= $this->endSection() ?>