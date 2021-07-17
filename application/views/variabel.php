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
                    <h1 class="h3 mb-2 text-gray-800">Pegawai</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Variabel</h6>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary btn-user btn-block mb-3" data-toggle="modal" data-target="#modalVariabel">
                                Tambah Variabel
                            </button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabelPegawai" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Variabel</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>Nama Variabel</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($variabel as $data) { ?>
                                            <tr>
                                                <td><?= $data['Namavariabel'] ?></td>
                                                <td>
                                                    <a href="#" onclick="isiForm('<?= base_url('') ?>','<?= $data['Idvariabel'] ?>')" data-toggle="modal" data-target="#modalVariabel" role="button">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('aksihapusvariabel/' . $data['Idvariabel']) ?>" role="button">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- Pegawai Modal-->
            <div class="modal fade" id="modalVariabel" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="formVariabel" action="<?php echo base_url('aksitambahvariabel') ?>" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah atau Ubah Variabel</h5>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="namavariabel" class="form-control form-control-user" placeholder="Nama Variabel" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" onclick="kosongkanForm('<?php echo base_url() ?>')" type="button" data-dismiss="modal">Batal</button>
                                <button class="btn btn-primary btn-user">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                function isiForm(url, idvariabel) {
                    $.ajax({
                        type: "GET",
                        dataType: 'JSON',
                        url: url + 'lihatvariabel/' + idvariabel,
                        success: function(res) {
                            // alert(url + 'lihatvariabel/' + idvariabel);
                            document.getElementById('formVariabel').action = url + 'aksiubahvariabel/' + idvariabel
                            document.getElementsByName("namavariabel")[0].value = res[0].Namavariabel;
                        }
                    });
                }

                function kosongkanForm(url) {
                    document.getElementById('formVariabel').action = url + 'aksitambahvariabel'
                    document.getElementsByName("namavariabel")[0].value = "";
                }
            </script>
            <?php $this->load->view('template/footer'); ?>