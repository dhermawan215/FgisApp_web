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
                            <li class="breadcrumb-item active">Edit Produk</li>
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
                                <h3 class="card-title text-bold  text-white">Form Edit Produk</h3>
                                <?php $id = bin2hex($encrypter->encrypt($editProduct['product_id'])) ?>
                            </div>
                            <div class="card-body p-0">
                                <form action="/product/update/<?= $id ?>" method="POST" class="mx-3 py-2">
                                    <?= csrf_field() ?>
                                    <div class="form-group col-lg-12">

                                        <input type="hidden" name="id_product" value="<?= $id ?>">

                                        <label for="ProductName">Product Name</label>
                                        <input type="text" name="product_name" id="ProductName" class="form-control <?= ($validation->hasError('product_name')) ? 'is-invalid' : ''; ?>" value="<?= (old('product_name')) ? old('product_name') : $editProduct['product_name'] ?>" placeholder="Masukan Product Name" aria-describedby="ProductName">
                                        <div class="invalid-feedback mb-1">
                                            <?= $validation->getError('product_name')  ?>
                                        </div>

                                        <label for="PartNumber">Part Number</label>
                                        <input type="text" name="part_number" id="PartNumber" class="form-control <?= ($validation->hasError('part_number')) ? 'is-invalid' : ''; ?>" value="<?= (old('part_number')) ? old('part_number') : $editProduct['part_number'] ?>" placeholder="Masukan Part Number" aria-describedby="PartNumber">
                                        <div class="invalid-feedback mb-1">
                                            <?= $validation->getError('part_number')  ?>
                                        </div>

                                        <label for="PartName">Part Name</label>
                                        <input type="text" name="part_name" id="PartName" class="form-control <?= ($validation->hasError('part_name')) ? 'is-invalid' : ''; ?>" value="<?= (old('part_name')) ? old('part_name') : $editProduct['part_name'] ?>" placeholder="Masukan Part Name" aria-describedby="PartName">
                                        <div class="invalid-feedback mb-1">
                                            <?= $validation->getError('part_number')  ?>
                                        </div>
                                        <label for="jenis">Jenis</label>
                                        <select class="custom-select <?= ($validation->hasError('jenis')) ? 'is-invalid' : ''; ?>" name="jenis">
                                            <option selected value="<?= (old('jenis')) ? old('jenis') :  $editProduct['jenis'] ?> "><?= $editProduct['jenis'] ?></option>
                                            <option value="IDF">IDF/ID</option>
                                            <option value="export">export</option>
                                            <option value="spo">SPO</option>
                                        </select>

                                        <label for="Category">Kategori Barang</label>
                                        <select class="custom-select <?= ($validation->hasError('category')) ? 'is-invalid' : ''; ?>" name="category">
                                            <option selected value="<?= (old('category')) ? old('category') : $editProduct['category_id'] ?>"><?= $editProduct['category_name'] ?></option>
                                            <?php foreach ($Kategori as $key => $category) : ?>
                                                <option value="<?= $category['id_category'] ?>"><?= $category['category_name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                        <label for="customers">Customers</label>
                                        <select class="custom-select <?= ($validation->hasError('customers')) ? 'is-invalid' : ''; ?>" name="customers">
                                            <option selected value="<?= (old('customers')) ? old('customers') : $editProduct['customers_id'] ?>"><?= $editProduct['customers_name'] ?></option>
                                            <?php foreach ($Customers as $key => $customer) : ?>
                                                <option value="<?= $customer['id_customers'] ?>"><?= $customer['customers_name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="mb-2 py-2 mx-2">

                                        <button type="submit" name="simpan" value="ok" class="btn btn-primary text-center">Simpan</button>
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