<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>/Backend/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url() ?>/Backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>/Backend/dist/css/adminlte.min.css">
    <link rel="icon" href="<?= base_url() ?>/myfavicon.ico" type="ico" sizes="16x16">
</head>

<body class="hold-transition login-page">

    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="<?= base_url() ?>/img/icon.svg" alt="icon_fgisapp" class="my-1" height="50px">
                <span class="h1"><b>Fgis_</b>App</span>
            </div>
            <div class="card-body">
                <p class="login-box-msg"><?= $subtitle ?></p>

                <form action="/auth/registered" method="POST">
                    <?= csrf_field() ?>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text bg-primary text-white ">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" name="nama" value="<?= old('nama') ?>" placeholder="Full name">
                        <div class="invalid-feedback mb-1">
                            <?= $validation->getError('nama')  ?>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text bg-primary text-white">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" value="<?= old('email') ?>" placeholder="Email">
                        <div class="invalid-feedback mb-1">
                            <?= $validation->getError('email')  ?>
                        </div>
                    </div>
                    <div class="input-group mb-1">
                        <div class="input-group-append">
                            <div class="input-group-text bg-primary text-white">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="password" id="myInput" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" value="<?= old('password') ?>" placeholder="Password">
                        <div class="invalid-feedback mb-1">
                            <?= $validation->getError('password')  ?>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" onclick="myFunction()">
                            <label class="form-check-label" for="exampleCheck1">Show Password</label>
                        </div>
                    </div>
                    <div class="input-group mb-1 mt-1">
                        <div class="input-group-append">
                            <div class="input-group-text bg-primary text-white">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="password" id="myInput2" class="form-control <?= ($validation->hasError('cpassword')) ? 'is-invalid' : ''; ?>" name="cpassword" value="<?= old('cpassword') ?>" placeholder="Retype password">
                        <div class="invalid-feedback mb-1">
                            <?= $validation->getError('cpassword')  ?>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" onclick="myFunction2()">
                            <label class="form-check-label" for="exampleCheck1">Show Password</label>
                        </div>
                    </div>
                    <div class="input-group mt-1 mb-3">
                        <select name="level" id="" class="custom-select">
                            <option selected value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="row mb-2 mt-1">

                        <!-- /.col -->
                        <div class="col-12 ">
                            <button type="submit" class="btn btn-primary btn-block text-bold"> <i class="fas fa-check"></i> <span> </span> Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <span class="text-center mt-1">Sudah Terdaftar? Silahkan </span>
                <a href="<?= route_to('login') ?>" class="text-center text-bold">Login</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>/Backend/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>/Backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>/Backend/dist/js/adminlte.min.js"></script>

    <!-- view password -->
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function myFunction2() {
            var x = document.getElementById("myInput2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>