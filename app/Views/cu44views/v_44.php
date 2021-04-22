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
                        <h1 class="text-weight-200">
                            <?= $getProductNumber->product_name ?> | (<?= $getProductNumber->part_number ?>)
                        </h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= site_url() ?>">Home</a></li>
                            <li class="breadcrumb-item active">CU44</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <?php if (session()->getFlashdata('berhasil')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('berhasil') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php endif ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning"><i class="fas fa-layer-group"></i></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Stock Barang (real time)</span>
                                <span class="info-box-number">Qty : <?= number_format($stock) ?> Pcs</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-calendar-times"></i></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Periode Stok</span>
                                <span class="info-box-number">Bulan : <?= date('F') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="fas fa-calendar-alt"></i></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Tanggal : <?= date('d-m-Y') ?></span>
                                <span class="info-box-number">Hari : <?= date('l') ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-secondary"><i class="fas fa-pen"></i></span>
                            <div class="info-box-content">
                                <a href="/cu44/preparation" class="info-box-number">Input Stock Persiapan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header text-weight-300 text-bold">
                            <span>Pencarian Data Stok by Date</span>
                        </div>
                        <div class="card-body px-3">
                            <form action="/cu44/SearchDate" method="POST" class="mx-3 py-2 form-inline">
                                <?= csrf_field() ?>
                                <div class="input-group mb-1 mr-sm-1">
                                    <div class="input-group-prepend">
                                        <label class="mr-1" for="">Tanggal Awal : </label>
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="date" class="form-control" id="inlineFormInputGroupUsername2" name="firstDate" placeholder="Username">
                                </div>
                                <div class="input-group mb-1 mr-sm-1">
                                    <div class="input-group-prepend">
                                        <label class="mr-1" for="">Tanggal Akhir : </label>
                                        <div class="input-group-text"><i class="far fa-calendar-alt"></i></div>
                                    </div>
                                    <input type="date" class="form-control" id="inlineFormInputGroupUsername2" name="endDate" placeholder="Username">
                                </div>
                                <button type="submit" title="Cari" class="btn btn-primary ml-2 mb-2 mt-2"><i class="fas fa-search"></i></button>
                                <a href="/cu44" title="Bersihkan Pencarian" class="ml-2 mb-2 mt-2 btn btn-outline-danger"><i class="fas fa-eraser"></i></a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header text-weight-300 text-bold">
                            <span>Pencarian Data Stok by Limit</span>
                        </div>
                        <div class="card-body px-3">
                            <form action="/cu44/SearchLimit" method="POST" class="mx-3 py-2 form-inline">
                                <?= csrf_field() ?>
                                <div class="input-group mb-1 mr-sm-1">
                                    <div class="input-group-prepend">
                                        <select class="form-control" name="limit">
                                            <option value="">-Silahkan Pilih-</option>
                                            <option value="5">5</option>
                                            <option value="15">15</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" title="Cari" class="btn btn-primary ml-2 mb-2 mt-2"><i class="fas fa-search"></i></button>
                                <a href="/cu44" title="Bersihkan" class="ml-2 mb-2 mt-2 btn btn-outline-danger"><i class="fas fa-eraser"></i></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-gradient-success">
                            <h3 class="card-title text-bold">Tabel Stock Card CU-44</h3>
                            <div class="card-tools">
                                <a href="/cu44/create" class="btn btn-sm btn-outline-primary float-right text-white"><i class="fas fa-plus fa-sm text-white-50"></i> Input Assy Entry</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table class="table table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th style="width: 2px">No</th>
                                        <th>Tanggal</th>
                                        <th>Qty</th>
                                        <th>Jenis</th>
                                        <th>Ket</th>
                                        <th>Di isi</th>
                                        <th>Di cek</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php foreach ($allData as $key => $value) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $value['date_transaction'] ?></td>
                                            <td><?= $value['quantity'] ?></td>
                                            <td><?= $value['input'] ?></td>
                                            <td><?= $value['remark'] ?></td>
                                            <td><?= ucfirst($value['fill_by']) ?></td>
                                            <td><?= ucfirst($value['checked_by'])  ?></td>
                                            <td>
                                                <?php $id = bin2hex($encrypter->encrypt($value['id_44'])); ?>
                                                <a href="/cu44/edit/<?= $id ?>"><i class="fa fa-edit"></i></a>
                                                <form action="/cu44/<?= $value['id_44'] ?>" method="POST" class="d-inline">
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
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <?= $this->endSection() ?>