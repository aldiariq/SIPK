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
                    <h1 class="h3 mb-2 text-gray-800">Penilaian Pegawai</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Penilaian Pegawai</h6>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary btn-user btn-block mb-3" data-toggle="modal" data-target="#modalPenilaianpegawai">
                                Tambah Penilaian Pegawai
                            </button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabelPenilaianpegawai" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Pegawai</th>
                                            <th>Peringkat</th>
                                            <th>Skala</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal Laporan</th>
                                            <th>Nama Indikator</th>
                                            <th>Nilai Indikator</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Pegawai</th>
                                            <th>Peringkat</th>
                                            <th>Skala</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal Laporan</th>
                                            <th>Nama Indikator</th>
                                            <th>Nilai Indikator</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($penilaianpegawai as $data) { ?>
                                            <tr>
                                                <td><?= $data['Namapegawai'] ?></td>
                                                <td><?= $data['Peringkat'] ?></td>
                                                <td><?= $data['Skala'] ?></td>
                                                <td><?= $data['Keterangan'] ?></td>
                                                <td><?= $data['Tanggallaporan'] ?></td>
                                                <td><?= $data['Namaindikator'] ?></td>
                                                <td><?= $data['Nilaiindikator'] ?></td>
                                                <td>
                                                    <a href="#" onclick="isiForm('<?= base_url('') ?>','<?= $data['Idlaporan'] ?>')" data-toggle="modal" data-target="#modalPenilaianpegawai" role="button">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('aksihapuspenilaianpegawai/' . $data['Idlaporan']) ?>" role="button">
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
            <div class="modal fade" id="modalPenilaianpegawai" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="formPenilaianpegawai" action="<?php echo base_url('aksitambahpenilaianpegawai') ?>" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah atau Ubah Penilaian Pegawai</h5>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <select class="form-control" name="idpegawai" required>
                                                <option value="">Pegawai</option>
                                                <?php foreach ($pegawai as $data) { ?>
                                                    <option value="<?php echo $data['Idpegawai'] ?>"><?php echo $data['Namapegawai'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" name="tanggallaporan" class="form-control form-control-user" id="exampleInputPassword" placeholder="Tanggal Laporan" required>
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
                function isiForm(url, idlaporan) {
                    $.ajax({
                        type: "GET",
                        dataType: 'JSON',
                        url: url + 'lihatpenilaianpegawai/' + idlaporan,
                        success: function(res) {
                            // alert(url + 'lihatvariabel/' + idvariabel);
                            document.getElementById('formPenilaianpegawai').action = url + 'aksiubahpenilaianpegawai/' + idlaporan
                            document.getElementsByName("idpegawai")[0].value = res[0].Idpegawai;
                            document.getElementsByName("tanggallaporan")[0].value = res[0].Tanggallaporan;
                        }
                    });
                }

                function kosongkanForm(url) {
                    document.getElementById('formPenilaianpegawai').action = url + 'aksitambahpenilaianpegawai'
                    document.getElementsByName("idpegawai")[0].value = "";
                    document.getElementsByName("tanggallaporan")[0].value = "";
                }
            </script>
            <?php $this->load->view('template/footer'); ?>