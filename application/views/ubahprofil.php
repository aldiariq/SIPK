<?php $this->load->view('template/header'); ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php $this->load->view('template/sidebar'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('Namapegawai') ?></span>
                                <div class="sidebar-brand-icon">
                                    <i class="fas fa-user"></i>
                                </div>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?php echo base_url('ubahprofil') ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ubah Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url('ubahpassword') ?>">
                                    <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ubah Password
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url('aksilogout') ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ubah Profil</h1>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <form action="<?php echo base_url('aksiubahprofil') ?>" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="namapegawai" value="<?php echo $this->session->userdata('Namapegawai') ?>" class="form-control form-control-user" id="exampleInputPassword" placeholder="Nama Pegawai" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea name="alamat" class="form-control form-control-user" id="exampleInputPassword" placeholder="Alamat Pegawai" required><?php echo $this->session->userdata('Alamat') ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="jeniskelamin" id="exampleFormControlSelect1" required>
                                            <option value="">Jenis Kelamin</option>
                                            <option <?php if ($this->session->userdata('Jeniskelamin') == 'PRIA') {
                                                        echo 'selected';
                                                    } ?> value="PRIA">PRIA</option>
                                            <option <?php if ($this->session->userdata('Jeniskelamin') == 'WANITA') {
                                                        echo 'selected';
                                                    } ?> value="WANITA">WANITA</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="tempatlahir" value="<?php echo $this->session->userdata('Tempatlahir') ?>" class="form-control form-control-user" id="exampleInputPassword" placeholder="Tempat Lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="tanggallahir" value="<?php echo $this->session->userdata('Tanggallahir') ?>" class="form-control form-control-user" id="exampleInputPassword" placeholder="Tanggal Lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="jeniskartuidentitas" value="<?php echo $this->session->userdata('Jeniskartuidentitas') ?>" class="form-control form-control-user" id="exampleInputPassword" placeholder="Jenis Kartu Identitas" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nokartuidentitas" value="<?php echo $this->session->userdata('Nokartuidentitas') ?>" class="form-control form-control-user" id="exampleInputPassword" placeholder="No Kartu Identitas" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="agama" value="<?php echo $this->session->userdata('Agama') ?>" class="form-control form-control-user" id="exampleInputPassword" placeholder="Agama" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="notelepon" value="<?php echo $this->session->userdata('Notelepon') ?>" class="form-control form-control-user" id="exampleInputPassword" placeholder="No Telepon" required>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="status" id="exampleFormControlSelect1" required>
                                            <option value="">Status</option>
                                            <option <?php if ($this->session->userdata('Status') == 'PEGAWAI TETAP') {
                                                        echo 'selected';
                                                    } ?> value="PEGAWAI TETAP">PEGAWAI TETAP</option>
                                            <option <?php if ($this->session->userdata('Status') == 'PEGAWAI HONORER') {
                                                        echo 'selected';
                                                    } ?> value="PEGAWAI HONORER">PEGAWAI HONORER</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block">
                                        Simpan Profil
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <?php $this->load->view('template/footer'); ?>