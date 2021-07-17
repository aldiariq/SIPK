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
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Pegawai</h6>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary btn-user btn-block mb-3" data-toggle="modal" data-target="#modalPegawai">
                                Tambah Pegawai
                            </button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabelPegawai" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>JK</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Kartu Identitas</th>
                                            <th>No Kartu</th>
                                            <th>Agama</th>
                                            <th>No Telepon</th>
                                            <th>Status</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>JK</th>
                                            <th>Tempat Lahir</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Kartu Identitas</th>
                                            <th>No Kartu</th>
                                            <th>Agama</th>
                                            <th>No Telepon</th>
                                            <th>Status</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($pegawai as $data) { ?>
                                            <tr>
                                                <td><?= $data['Namapegawai'] ?></td>
                                                <td><?= $data['Alamat'] ?></td>
                                                <td><?= $data['Jeniskelamin'] ?></td>
                                                <td><?= $data['Tempatlahir'] ?></td>
                                                <td><?= $data['Tanggallahir'] ?></td>
                                                <td><?= $data['Jeniskartuidentitas'] ?></td>
                                                <td><?= $data['Nokartuidentitas'] ?></td>
                                                <td><?= $data['Agama'] ?></td>
                                                <td><?= $data['Notelepon'] ?></td>
                                                <td><?= $data['Status'] ?></td>
                                                <td><?= $data['Jabatan'] ?></td>
                                                <td>
                                                    <a href="#" onclick="isiForm('<?= base_url('') ?>','<?= $data['Idpegawai'] ?>')" data-toggle="modal" data-target="#modalPegawai" role="button">
                                                        <i class="fas fa-pen"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('aksihapuspegawai/' . $data['Idpegawai']) ?>" role="button">
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
            <div class="modal fade" id="modalPegawai" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form id="formPegawai" action="<?php echo base_url('aksitambahpegawai') ?>" method="POST">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah atau Ubah Pegawai</h5>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <input type="text" name="namapegawai" class="form-control form-control-user" placeholder="Nama Pegawai" required>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="alamat" class="form-control form-control-user" placeholder="Alamat Pegawai" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="jeniskelamin" required>
                                                <option value="">Jenis Kelamin</option>
                                                <option value="PRIA">PRIA</option>
                                                <option value="WANITA">WANITA</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="tempatlahir" class="form-control form-control-user" placeholder="Tempat Lahir" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="date" name="tanggallahir" class="form-control form-control-user" placeholder="Tanggal Lahir" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="jeniskartuidentitas" class="form-control form-control-user" placeholder="Jenis Kartu Identitas" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="nokartuidentitas" class="form-control form-control-user" placeholder="No Kartu Identitas" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="agama" class="form-control form-control-user" placeholder="Agama" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="notelepon" class="form-control form-control-user" placeholder="No Telepon" required>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="status" required>
                                                <option value="">Status</option>
                                                <option value="PEGAWAI TETAP">PEGAWAI TETAP</option>
                                                <option value="PEGAWAI HONORER">PEGAWAI HONORER</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="idjabatan" id="exampleFormControlSelect1" required>
                                                <option value="">Jabatan</option>
                                                <?php foreach ($jabatan as $data) { ?>
                                                    <option value="<?php echo $data['Idjabatan'] ?>"><?php echo $data['Jabatan'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" onclick="kosongkanForm()" type="button" data-dismiss="modal">Batal</button>
                                <button class="btn btn-primary btn-user">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                function isiForm(url, idpegawai) {
                    $.ajax({
                        type: "GET",
                        dataType: 'JSON',
                        url: url + 'lihatpegawai/' + idpegawai,
                        success: function(res) {
                            document.getElementById('formPegawai').action = url + 'aksiubahpegawai/' + idpegawai
                            document.getElementsByName("namapegawai")[0].value = res[0].Namapegawai;
                            document.getElementsByName("alamat")[0].value = res[0].Alamat;
                            document.getElementsByName("jeniskelamin")[0].value = res[0].Jeniskelamin;
                            document.getElementsByName("tempatlahir")[0].value = res[0].Tempatlahir;
                            document.getElementsByName("tanggallahir")[0].value = res[0].Tanggallahir;
                            document.getElementsByName("jeniskartuidentitas")[0].value = res[0].Jeniskartuidentitas;
                            document.getElementsByName("nokartuidentitas")[0].value = res[0].Nokartuidentitas;
                            document.getElementsByName("agama")[0].value = res[0].Agama;
                            document.getElementsByName("notelepon")[0].value = res[0].Notelepon;
                            document.getElementsByName("status")[0].value = res[0].Status;
                            document.getElementsByName("idjabatan")[0].value = res[0].Idjabatan;
                        }
                    });
                }

                function kosongkanForm() {
                    document.getElementsByName("namapegawai")[0].value = "";
                    document.getElementsByName("alamat")[0].value = "";
                    document.getElementsByName("jeniskelamin")[0].value = "";
                    document.getElementsByName("tempatlahir")[0].value = "";
                    document.getElementsByName("tanggallahir")[0].value = "";
                    document.getElementsByName("jeniskartuidentitas")[0].value = "";
                    document.getElementsByName("nokartuidentitas")[0].value = "";
                    document.getElementsByName("agama")[0].value = "";
                    document.getElementsByName("notelepon")[0].value = "";
                    document.getElementsByName("status")[0].value = "";
                    document.getElementsByName("idjabatan")[0].value = "";
                }
            </script>
            <?php $this->load->view('template/footer'); ?>