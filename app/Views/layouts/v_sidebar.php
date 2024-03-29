<!-- main sidebar container -->
<aside class="main-sidebar sidebar-dark-success elevation-4">
    <!-- Brand Logo -->
    <a href="<?= route_to('home') ?>" class="brand-link elevation-4 text-center">
        <img src="<?= base_url() ?>/img/icon.svg" alt="icon_fgisapp" height="25px">
        <span class="brand-text font-weight-light font-weight-bold">Fgis Apps</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->


        <!-- SidebarSearch Form -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= route_to('home') ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i> <i class=""></i>
                        <p>
                            CU
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= route_to('ahmcureg') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>AHM Reguler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= route_to('ahmcuspo') ?>" class=" nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>AHM SPO</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fas fa-adjust"></i>
                        <p>
                            Regulator IDF
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../UI/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>AHM Reguler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/icons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Suzuki Reguler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/buttons.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Yamaha Reguler</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../UI/sliders.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kawasaki Reguler</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-artstation"></i>
                        <p>
                            Regulator SPO
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../forms/general.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>AHM SPO</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../forms/advanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Suzuki SPO</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../forms/editors.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kawasaki SPO</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../forms/validation.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Yamaha SPO</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bahai"></i>
                        <p>
                            CDI
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>AHM SPO</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../forms/advanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Suzuki SPO</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= route_to('kmicdi') ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kawasaki</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('adptw') ?>" class="nav-link">
                        <i class="nav-icon fab fa-battle-net"></i>
                        <p>
                            ADP & TW
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('export') ?>" class="nav-link">
                        <i class="nav-icon fab fa-bandcamp"></i>
                        <p>
                            Export
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= route_to('hti') ?>" class="nav-link">
                        <i class="nav-icon fas fa-asterisk"></i>
                        <p>
                            HTI
                        </p>
                    </a>
                </li>
                <?php if (session()->level == "admin") : ?>
                    <li class="nav-header">Admin Dashboard</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-shield"></i>
                            <p>
                                Admin
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= route_to('product') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Produk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url('admin/member') ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Member</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>User Setting</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kategori Produk</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Customers</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="nav-link">
                        <i class="nav-icon bi bi-box-arrow-left"></i>

                        <p> Log Out
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- end of main sidebar container -->