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
                        <div class="card-body">
                            <button class="btn btn-primary btn-user btn-block mb-3" data-toggle="modal" data-target="#modalPenilaianpegawai">
                                Tambah Penilaian Pegawai
                            </button>
                        </div>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Penilaian Pegawai</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-md-12">
                                    <div class="form-group">
                                        <select class="form-control" name="idpegawaicari" required>
                                            <option value="">Pegawai</option>
                                            <?php foreach ($pegawai as $data) { ?>
                                                <option value="<?php echo $data['Idpegawai'] ?>"><?php echo $data['Namapegawai'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="form-group">
                                        <input type="date" name="tanggalmulaicari" class="form-control form-control-user" id="exampleInputPassword" placeholder="Tanggal Laporan" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="form-group">
                                        <input type="date" name="tanggalselesaicari" class="form-control form-control-user" id="exampleInputPassword" placeholder="Tanggal Laporan" required>
                                    </div>
                                </div>
                            </div>
                            <button onclick="caripenilaianPegawai('<?php base_url() ?>')" class="btn btn-primary btn-user btn-block mb-3">
                                Cari Penilaian Pegawai
                            </button>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tabelPenilaianpegawai" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nama Pegawai</th>
                                            <th>Tanggal Laporan</th>
                                            <th>Nama Indikator</th>
                                            <th>Nilai Indikator</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Pegawai</th>
                                            <th>Tanggal Laporan</th>
                                            <th>Nama Indikator</th>
                                            <th>Nilai Indikator</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <!-- <?php foreach ($penilaianpegawai as $data) { ?>
                                            <tr>
                                                <td><?= $data['Namapegawai'] ?></td>
                                                <td><?= $data['Tanggallaporan'] ?></td>
                                                <td><?= $data['Namaindikator'] ?></td>
                                                <td><?= $data['Nilaiindikator'] ?></td>
                                            </tr>
                                        <?php } ?> -->
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
                function caripenilaianPegawai(url) {
                    var Idpegawai = document.getElementsByName("idpegawaicari")[0].value;
                    var Tanggalmulai = document.getElementsByName("tanggalmulaicari")[0].value;
                    var Tanggalselesai = document.getElementsByName("tanggalselesaicari")[0].value;

                    var Namapegawai;
                    var Nokartuidentitas;
                    var Jabatan;
                    var Status;
                    var Bobot;

                    var data_penilaianpegawai = url + 'lihatpenilaianpegawai/' + Idpegawai + '?' + 'tanggalmulai=' + Tanggalmulai + '&tanggalselesai=' + Tanggalselesai;
                    $.ajax({
                        type: "GET",
                        dataType: 'JSON',
                        url: data_penilaianpegawai,
                        success: function(res) {
                            Namapegawai = res.data[0].Namapegawai;
                            Nokartuidentitas = res.data[0].Nokartuidentitas;
                            Jabatan = res.data[0].Jabatan;
                            Status = res.data[0].Status;
                            Bobot = res.bobot;
                            Skala = res.skala;
                            Peringkat = res.peringkat;
                        }
                    });

                    var tanggalbulantahun = new Date();
                    if (Idpegawai == '' || Tanggalmulai == '' || Tanggalselesai == '') {
                        alert('Pastikan Input Pencarian Terisi');
                    } else {
                        $('#tabelPenilaianpegawai').DataTable({
                            "bDestroy": true,
                            "lengthMenu": [
                                [-1, 10, 25, 50],
                                ["All", 10, 25, 50]
                            ],
                            "dom": "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                                "<'row'<'col-sm-12'tr>>" +
                                "<'row'<'col-sm-6'i><'col-sm-6'p>>",
                            "buttons": [{
                                extend: 'collection',
                                text: 'Export',
                                buttons: [
                                    {
                                        extend: 'print',
                                        autoPrint: true,
                                        text: 'Print',
                                        title: 'Laporan Penilaian Pegawai',
                                        customize: function(win, doc) {
                                            $(win.document.body).prepend(
                                                '<h1 class="text-center my-5">Laporan Penilaian Pegawai</h1>' +
                                                '<div class="container">' +
                                                '<div class="row">' +
                                                '<div class="col-xl-12 col-md-12 mb-4">Nama Pegawai : ' + Namapegawai+' </div>' +
                                                '<div class="col-xl-12 col-md-12 mb-4">No Kartu Identitas : ' + Nokartuidentitas+' </div>' +
                                                '<div class="col-xl-12 col-md-12 mb-4">Jabatan : ' + Jabatan+' </div>' +
                                                '<div class="col-xl-6 col-md-6 mb-4">Status : ' + Status+' </div>' +
                                                '<div class="col-xl-6 col-md-6 mb-4">Tanggal Cetak : ' + + tanggalbulantahun.getDate() + '-' + (tanggalbulantahun.getMonth() + 1) + '-' + tanggalbulantahun.getFullYear() +' </div>' +
                                                '</div>' +
                                                '</div>'
                                            );
                                            $(win.document.body).append(
                                                '<div class="container">' +
                                                '<div class="row">' +
                                                '<div class="col-xl-6 col-md-6 mb-4">Jumlah Bobot : ' + Bobot+' </div>' +
                                                '<div class="col-xl-6 col-md-6 mb-4"></div>' +
                                                '<div class="col-xl-6 col-md-6 mb-4">Skala : ' + Skala+' </div>' +
                                                '<div class="col-xl-6 col-md-6 mb-4"></div>' +
                                                '<div class="col-xl-6 col-md-6 mb-4">Peringkat : ' + Peringkat+'  </div>' +
                                                '<div class="col-xl-6 col-md-6 mb-4"></div>' +
                                                '</div>' +
                                                '<div class="row">' +
                                                '<div class="col-xl-9 col-md-8 mb-4"></div>' +
                                                '<div class="col-xl-3 col-md-4 mb-4"><p class="text-center">......................................., ' + tanggalbulantahun.getDate() + '-' + (tanggalbulantahun.getMonth() + 1) + '-' + tanggalbulantahun.getFullYear() + '</p></div>' +
                                                '</div>' +
                                                '<div class="row mt-4">' +
                                                '<div class="col-xl-9 col-md-8 mb-4"></div>' +
                                                '<div class="col-xl-3 col-md-4 mb-4"><p class="text-center">' + Namapegawai+'</p></div>' +
                                                '</div>' +
                                                '</div>'
                                            );
                                            doc.content[1].table.widths = ['20%', '15%', '50%', '15%'];
                                        }
                                    }
                                ]
                            }],
                            "ajax": {
                                url: data_penilaianpegawai,
                                dataSrc: 'data'
                            },
                            "columns": [{
                                    "data": "Namapegawai"
                                },
                                {
                                    "data": "Tanggallaporan"
                                },
                                {
                                    "data": "Namaindikator"
                                },
                                {
                                    "data": "Nilaiindikator"
                                }
                            ]
                        });
                    }
                }
            </script>
            <?php $this->load->view('template/footer'); ?>