        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?=base_url();?>design/admin/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?=base_url();?>design/admin/vendors/chart.js/Chart.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/moment/moment.min.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/daterangepicker/daterangepicker.js"></script>
    <script src="<?=base_url();?>design/admin/vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?=base_url();?>design/admin/js/off-canvas.js"></script>
    <script src="<?=base_url();?>design/admin/js/misc.js"></script>
    <!-- endinject -->
    <!-- Start Datatables -->
    <script src="<?=base_url();?>design/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url();?>design/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?=base_url();?>design/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?=base_url();?>design/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?=base_url();?>design/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?=base_url();?>design/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <!-- Custom js for this page -->
    <script src="<?=base_url();?>design/admin/js/dashboard.js"></script>
    <!-- End custom js for this page -->    

    <script>
        $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "sorting": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false, "sorting": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
    </script>
  </body>
</html>