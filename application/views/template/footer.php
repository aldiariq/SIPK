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
            </script>

            </body>

            </html>