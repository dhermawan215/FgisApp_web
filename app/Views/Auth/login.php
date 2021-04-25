<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/Backend/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>/Backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/Backend/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>/assets/css_custom/main.css">
    <link rel="icon" href="<?= base_url() ?>/myfavicon.ico" type="ico" sizes="16x16">
</head>

<body class="hold-transition ppage-login">
    <main class="login-container">

        <div class="container">
            <div class="row page-login d-flex align-items-center">
                <div class="section-left image-left col-12 col-md-6">
                    <p class="text-bold text-custom">
                        <img src="<?= base_url() ?>/img/icon.svg" alt="icon_fgisapp" class="my-1" height="50px">
                        Selamat Datang <br> Sistem Inventory Finished good warehouse</p>

                </div>
                <div class="section-right col-12 col-md-6">
                    <div class="login-box">
                        <!-- /.login-logo -->
                        <div class="card card-outline card-primary">
                            <div class="card-header text-center">

                                <span class="h1"><b>Fgis_</b>App</span>
                            </div>
                            <div class="card-body">


                                <?= $this->include('layouts/v_alerts'); ?>

                                <form action="/auth/logging" method="POST">
                                    <?= csrf_field() ?>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" value="<?= old('email') ?>" placeholder="Email">
                                        <div class="input-group-append">
                                            <div class="input-group-text bg-primary">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback mb-1">
                                            <?= $validation->getError('email')  ?>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" value="<?= old('password') ?>" placeholder="Password">
                                        <div class="input-group-append">
                                            <div class="input-group-text bg-primary">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback mb-1">
                                            <?= $validation->getError('password')  ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- /.col -->
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary btn-block text-bold"><i class="fas fa-sign-in-alt"></i> <span></span> Sign In</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                                <!-- /.social-auth-links -->

                                <p class="mb-1">

                                </p>
                                <p class="mb-0">
                                    <a href="<?= route_to('register') ?>" class="text-center">Register a new membership</a>
                                </p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- /.login-box -->



    <!-- jQuery -->
    <script src="<?= base_url() ?>/Backend/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/Backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/Backend/dist/js/adminlte.min.js"></script>

    <!-- auto close alert -->
    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function() {
                    $(this).remove();
                });
            }, 4000);
        });
    </script>
</body>

</html>