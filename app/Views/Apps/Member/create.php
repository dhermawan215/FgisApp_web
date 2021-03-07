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
                            <li class="breadcrumb-item"><a href="<?= base_url('product') ?>">Member</a></li>
                            <li class="breadcrumb-item active">Tambah Member</li>
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
                                <h3 class="card-title text-bold  text-white">Form Tambah Member</h3>

                            </div>
                            <div class="card-body p-0">
                                <form action="" method="post" class="mx-3 py-2">
                                    <div class="form-group col-lg-12">
                                        <label for="nik">NIK</label>
                                        <input type="text" name="" id="nik" class="form-control" placeholder="Masukan Nik" aria-describedby="nik">
                                        <label for="nama">Nama Karyawan</label>
                                        <input type="text" name="" id="nama" class="form-control" placeholder="Masukan Nama Karyawan" aria-describedby="nama">
                                        <div class="form-group">
                                            <label for="uploadFoto">Upload Foto</label>
                                            <input type="file" class="form-control-file" id="uploadFoto">
                                        </div>

                                    </div>
                                    <div class="mb-2 py-2 mx-2">

                                        <button type="submit" class="btn btn-primary text-center">Simpan</button>
                                        <button type="reset" class="btn btn-danger text-center ml-1">Reset</button>
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