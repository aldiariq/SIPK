            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; SIPK 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Bootstrap core JavaScript-->
            <script src="<?php echo base_url('assets/assetsdashboard/vendor/jquery/jquery.min.js') ?>"></script>
            <script src="<?php echo base_url('assets/assetsdashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?php echo base_url('assets/assetsdashboard/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?php echo base_url('assets/assetsdashboard/js/sb-admin-2.min.js') ?>"></script>

            <!-- Page level plugins -->
            <script src="<?php echo base_url('assets/assetsdashboard/vendor/chart.js/Chart.min.js') ?>"></script>

            <!-- Page level custom scripts -->
            <script src="<?php echo base_url('assets/assetsdashboard/js/demo/chart-area-demo.js') ?>"></script>
            <script src="<?php echo base_url('assets/assetsdashboard/js/demo/chart-pie-demo.js') ?>"></script>

            <!-- Page level plugins -->
            <script src="<?php echo base_url('assets/assetsdashboard/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
            <script src="<?php echo base_url('assets/assetsdashboard/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

            <!-- <script src="https://code.jquery.com/jquery"></script> -->
            <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>

            <script>
                $(document).ready(function() {
                    $('#tabelPegawai').DataTable();
                });

                $(document).ready(function() {
                    $('#tabelIndikator').DataTable();
                });

                $(document).ready(function() {
                    $('#tabelVariabel').DataTable();
                });

                $(document).ready(function() {
                    $('#tabelJabatan').DataTable();
                });

                // $(document).ready(function() {
                //     $('#tabelPenilaianpegawai').DataTable({
                //         "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                //         "dom": "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>" +
                //             "<'row'<'col-sm-12'tr>>" +
                //             "<'row'<'col-sm-6'i><'col-sm-6'p>>",
                //         "buttons": [{
                //             extend: 'collection',
                //             text: 'Export',
                //             buttons: [
                //                 'copy',
                //                 {
                //                     extend: 'pdf',
                //                     text: 'PDF',
                //                     title: 'Laporan Penilaian Pegawai',
                //                     orientation: 'portrait',
                //                     pageSize: 'A4',
                //                     exportOptions: {
                //                         modifier: {
                //                             // DataTables core
                //                             order: 'index', // 'current', 'applied',
                //                             //'index', 'original'
                //                             page: 'all', // 'all', 'current'
                //                             search: 'applied' // 'none', 'applied', 'removed'
                //                         },
                //                         columns: [0, 1, 2, 3],
                //                     }
                //                 },
                //                 {
                //                     extend: 'excel',
                //                     text: 'Excel',
                //                     title: 'Laporan Penilaian Pegawai',
                //                     exportOptions: {
                //                         modifier: {
                //                             // DataTables core
                //                             order: 'index', // 'current', 'applied',
                //                             //'index', 'original'
                //                             page: 'all', // 'all', 'current'
                //                             search: 'applied' // 'none', 'applied', 'removed'
                //                         },
                //                         columns: [0, 1, 2, 3]
                //                     }
                //                 },
                //             ]
                //         }],
                //     });
                // });
            </script>

            </body>

            </html>