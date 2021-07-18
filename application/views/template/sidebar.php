<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIPK</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php if ($this->uri->segment(1) == 'dashboard') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?php echo base_url('dashboard') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>

    <?php
    if ($this->session->userdata('Jabatan') == 'ADMIN') {
    ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Charts -->
        <li class="nav-item <?php if ($this->uri->segment(1) == 'variabel') {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="<?php echo base_url('variabel') ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Variabel</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Charts -->
        <li class="nav-item <?php if ($this->uri->segment(1) == 'indikator') {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="<?php echo base_url('indikator') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Indikator</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Charts -->
        <li class="nav-item <?php if ($this->uri->segment(1) == 'jabatan') {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="<?php echo base_url('jabatan') ?>">
                <i class="fas fa-fw fa-layer-group"></i>
                <span>Jabatan</span></a>
        </li>
    <?php
    }
    ?>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php
    if ($this->session->userdata('Jabatan') == 'ADMIN' || $this->session->userdata('Jabatan') == 'DIREKTUR') {
    ?>
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php if ($this->uri->segment(1) == 'pegawai' || $this->uri->segment(1) == 'penilaianpegawai') {
                                echo "active";
                            } ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-users"></i>
                <span>Pegawai</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <?php
                    if ($this->session->userdata('Jabatan') == 'ADMIN' || $this->session->userdata('Jabatan') == 'DIREKTUR') {
                    ?>
                        <a class="collapse-item" href="<?php echo base_url('pegawai') ?>">Data Pegawai</a>
                    <?php
                    }
                    ?>
                    <a class="collapse-item" href="<?php echo base_url('penilaianpegawai') ?>">Penilaian Pegawai</a>
                </div>
            </div>
        </li>
    <?php
    } else {
    ?>
        <!-- Nav Item - Charts -->
        <li class="nav-item <?php if ($this->uri->segment(1) == 'penilaianpegawai') {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="<?php echo base_url('penilaianpegawai') ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Penilaian Pegawai</span></a>
        </li>

    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Charts -->
    <li class="nav-item <?php if ($this->uri->segment(1) == 'ubahprofil') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?php echo base_url('ubahprofil') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Ubah Profil</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Charts -->
    <li class="nav-item <?php if ($this->uri->segment(1) == 'ubahpassword') {
                            echo "active";
                        } ?>">
        <a class="nav-link" href="<?php echo base_url('ubahpassword') ?>">
            <i class="fas fa-fw fa-key"></i>
            <span>Ubah Password</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('aksilogout') ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->