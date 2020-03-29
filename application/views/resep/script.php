<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2({
            placeholder: 'Select an option'
        });
        $(document).on('change', '#obat_resep', function(e){
            e.preventDefault();
            var $this = $(this);
            var stok = $this.find('option:selected').attr('data-stok'); 
            $('#stok_resep').val(stok);
        });
    });
</script>