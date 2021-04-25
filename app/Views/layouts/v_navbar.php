<!-- navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">

            <a class="nav-link text-primary" data-toggle="dropdown" href="#">
                <i class="bi bi-person-circle"></i>
                <span class="text-bold "><?= session()->nama ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"></span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i>
                    <span><?= session()->nama ?></span>

                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-at mr-2"></i>
                    <span><?= session()->email ?></span>

                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-layer-group mr-2"></i>
                    <span><?= session()->level ?></span>
                    <span class="float-right text-muted text-sm"></span>
                </a>
                <div class="dropdown-divider"></div>

                <a href="#" data-toggle="modal" data-target="#exampleModal" class="dropdown-item dropdown-footer"><i class="bi bi-box-arrow-in-left"></i> Logout</a>
            </div>
        </li>

    </ul>
</nav>

<!-- end of navbar -->