</div>
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>copyright &copy; 2020 - <?= SITE_NAME; ?>
            </span>
        </div>
    </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script> -->
<script src="<?= base_url('assets/'); ?>js/jquery-3.3.1.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/ruang-admin.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/chart-bar-demo.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="<?= base_url('assets/'); ?>js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/vfs_fonts.js"></script>
<script src="<?= base_url('assets/'); ?>js/buttons.html5.min.js"></script>

<link href="<?=base_url()?>assets/select2/css/select2.min.css" rel="stylesheet" />
<script src="<?=base_url()?>assets/select2/js/select2.min.js"></script>

<script>
    $(document).ready(function(){
        // $('.dataTables').dataTable({
        //     dom: 'Bfrtip',
        //     buttons: [
        //         'copyHtml5',
        //         'excelHtml5',
        //         'csvHtml5',
        //         'pdfHtml5'
        //     ]
        // });

        $('.dataTables').DataTable();

        $('.dataTablesRiwayat').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
    });
</script>
<?php
    if(!empty($script)){
        $this->load->view($script);
    }
?>
</body>


</html>