


<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?= base_url()?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url()?>assets/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?= base_url()?>assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="<?= base_url()?>assets/adminlte/bower_components/raphael/raphael.min.js"></script>
<script src="<?= base_url()?>assets/adminlte/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url()?>assets/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?= base_url()?>assets/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?= base_url()?>assets/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url()?>assets/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url()?>assets/adminlte/bower_components/moment/min/moment.min.js"></script>
<script src="<?= base_url()?>assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?= base_url()?>assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?= base_url()?>assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?= base_url()?>assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?= base_url()?>assets/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url()?>assets/adminlte/dist/js/pages/dashboard.js"></script>
<!-- DataTables -->
<script src="<?= base_url()?>assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })


</script>
<script>
$('#exampleModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    var id = button.data('id') // Extract info from data-* attributes
    var material = button.data('material')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)

    modal.find('#id_boleia').val(id)
    modal.find('#material').val(material)
})
</script>
<!-- /. MODAL PARA BOTAO ADICIONAR-->
</body>
</html>
