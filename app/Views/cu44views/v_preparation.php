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
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('cu44') ?>">CU 44</a></li>
                            <li class="breadcrumb-item active"><?= $breadcumb ?></li>
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
                                <h3 class="card-title text-bold  text-white">Form <?= $breadcumb ?></h3>

                            </div>
                            <div class="card-body p-0">
                                <form action="/cu44/prepare" method="POST" class="mx-3 py-2">
                                    <?= csrf_field() ?>
                                    <div class="form-group col-lg-12">
                                        <label for="date_transaction">Tanggal</label>
                                        <input type="date" name="date_transaction" id="date_transaction" class="form-control <?= ($validation->hasError('date_transaction')) ? 'is-invalid' : ''; ?>" value="<?= old('date_transaction') ?>" placeholder="Masukan Product Name">
                                        <div class="invalid-feedback mb-1">
                                            <?= $validation->getError('date_transaction')  ?>
                                        </div>
                                        <label for="quantity">Quantity</label>
                                        <input type="number" name="quantity" id="quantity" class="form-control <?= ($validation->hasError('quantity')) ? 'is-invalid' : ''; ?>" value="<?= old('quantity') ?>" placeholder="Masukan Quantity">
                                        <div class="invalid-feedback mb-1">
                                            <?= $validation->getError('quantity')  ?>
                                        </div>
                                        <label>Jenis Input Stock</label>
                                        <select class="form-control <?= ($validation->hasError('input')) ? 'is-invalid' : ''; ?>" name="input">
                                            <option value="">-Silahkan Pilih-</option>
                                            <option value="IN">IN</option>
                                            <option value="OUT">OUT</option>
                                        </select>
                                        <label for="remark">Keterangan</label>
                                        <input type="text" name="remark" id="remark" class="form-control  <?= ($validation->hasError('remark')) ? 'is-invalid' : ''; ?>" value="<?= old('remark') ?>" placeholder="Masukan Keterangan">
                                        <div class="invalid-feedback mb-1">
                                            <?= $validation->getError('remark')  ?>
                                        </div>
                                        <label for="fill_by">Di isi oleh</label>
                                        <input type="text" name="fill_by" id="fill_by" class="form-control  <?= ($validation->hasError('fill_by')) ? 'is-invalid' : ''; ?>" value="<?= old('fill_by') ?: session()->nama  ?>" placeholder="Di isi oleh">
                                        <div class="invalid-feedback mb-1">
                                            <?= $validation->getError('fill_by')  ?>
                                        </div>
                                        <label for="checked_by">Di cek oleh</label>
                                        <input type="text" name="checked_by" id="checked_by" class="form-control  <?= ($validation->hasError('checked_by')) ? 'is-invalid' : ''; ?>" value="<?= old('checked_by') ?>" placeholder="Di cek oleh">
                                        <div class="invalid-feedback mb-1">
                                            <?= $validation->getError('checked_by')  ?>
                                        </div>



                                    </div>
                                    <div class="mb-2 py-2 mx-2">

                                        <button type="submit" class="btn btn-primary text-center">Simpan</button>
                                        <button type="reset" class="btn btn-danger text-center ml-1">Reset</button>
                                        <a href="<?= route_to('cu44') ?>" class="btn btn-ligth text-warning ml-1">&laquo; Back</a>
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