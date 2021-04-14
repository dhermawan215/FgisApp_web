<?php

use Config\Validation;
?>
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
                            <li class="breadcrumb-item"><a href="<?= route_to('product') ?>">Produk</a></li>
                            <li class="breadcrumb-item active">Tambah Produk</li>
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
                                <h3 class="card-title text-bold  text-white">Form Tambah Produk</h3>

                            </div>
                            <div class="card-body p-0">
                                <form action="/product/save" method="POST" class="mx-3 py-2">
                                    <?= csrf_field() ?>
                                    <div class="form-group col-lg-12">

                                        <label for="product_name">Product Name</label>
                                        <input type="text" name="product_name" id="product_name" class="form-control <?= ($validation->hasError('product_name')) ? 'is-invalid' : ''; ?>" value="<?= old('product_name') ?>" placeholder="Masukan Product Name">
                                        <div class="invalid-feedback mb-1">
                                            <?= $validation->getError('product_name')  ?>
                                        </div>

                                        <label for="part_number">Part Number</label>
                                        <input type="text" name="part_number" id="part_number" class="form-control <?= ($validation->hasError('part_number')) ? 'is-invalid' : ''; ?>" value="<?= old('part_number') ?>" placeholder="Masukan Part Number">
                                        <div class="invalid-feedback mb-1">
                                            <?= $validation->getError('part_number')  ?>
                                        </div>

                                        <label for="part_name">Part Name</label>
                                        <input type="text" name="part_name" id="part_name" class="form-control  <?= ($validation->hasError('part_name')) ? 'is-invalid' : ''; ?>" value="<?= old('part_name') ?>" placeholder="Masukan Part Name">
                                        <div class="invalid-feedback mb-1">
                                            <?= $validation->getError('part_name')  ?>
                                        </div>

                                        <label for="PartName">Jenis</label>
                                        <select class="custom-select <?= ($validation->hasError('jenis')) ? 'is-invalid' : ''; ?>" name="jenis">
                                            <option selected value="">-Silahkan Pilih-</option>
                                            <option value="IDF">IDF/ID</option>
                                            <option value="export">export</option>
                                            <option value="spo">SPO</option>
                                        </select>

                                        <label for="Category">Kategori Barang</label>
                                        <select class="custom-select <?= ($validation->hasError('category')) ? 'is-invalid' : ''; ?>" name="category">
                                            <option selected value="">-Silahkan Pilih-</option>
                                            <?php foreach ($Kategori as $key => $category) : ?>
                                                <option value="<?= $category['id_category'] ?>"><?= $category['category_name'] ?></option>
                                            <?php endforeach ?>
                                        </select>

                                        <label for="customers">Customers</label>
                                        <select class="custom-select <?= ($validation->hasError('customers')) ? 'is-invalid' : ''; ?>" name="customers">
                                            <option selected value="">-Silahkan Pilih-</option>
                                            <?php foreach ($Customers as $key => $customer) : ?>
                                                <option value="<?= $customer['id_customers'] ?>"><?= $customer['customers_name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="mb-2 py-2 mx-2">

                                        <button type="submit" class="btn btn-primary text-center">Simpan</button>
                                        <button type="reset" class="btn btn-danger text-center ml-1">Reset</button>
                                        <a href="<?= route_to('product') ?>" class="btn btn-outline-info text-dark ml-1">&laquo; Back</a>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <?= $this->endSection() ?>