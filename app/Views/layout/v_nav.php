<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Aplikasi Pencarian KD</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('direction') ?>">
                    <i class="fas fa-fw">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
                            <path
                                d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5v2zM3 12v-2h2v2H3zm0 1h2v2H4a1 1 0 0 1-1-1v-1zm3 2v-2h3v2H6zm4 0v-2h3v1a1 1 0 0 1-1 1h-2zm3-3h-3v-2h3v2zm-7 0v-2h3v2H6z" />
                        </svg>
                    </i>
                    <span><b>Isi Semua Data KD</b></span></a>
            </li>

            <!-- Nav Item - Tables -->

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('year'); ?>">
                    <i class="fas fa-fw fa-calendar-check"></i>
                    <span>Data Tahun Surat KD</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('status'); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Status Surat KD</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('excel'); ?>">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Upload File Excel</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <div>

                </div>

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow text-center">
                    <div class="mx-auto center" style="width: 999px;">
                        <h1>Aplikasi Pencarian Surat KD</h1>
                    </div>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Tata Kelola
                                    Administrasi</span>
                                <img class="img-profile rounded-circle"
                                    src="<?= base_url('templates/img/undraw_profile.svg') ?> ">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
                            </div>
                        </li>

                        <ul class="na navbar-nav navbar-right">

                        </ul>
                        </li>
                </nav>
                <!-- End of Topbar -->