
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

        $(document).on('click', '.btn-tambah', function(e){
            e.preventDefault();
            var stok = $('#stok_resep').val();
            var jumlah = $('#jumlah_resep').val();
            var obat = $('#obat_resep').val();

            if(parseInt(jumlah) > parseInt(stok)){
                alert('stok tidak mencukupi');
            }if(parseInt(stok) == 0){
                alert('stok tidak ada');
            }else{
                
                var tb = '';
                var no = 0;
                var obatnya = $("#obat_resep option:selected").html();
                tb += '<tr>';
                    tb += '<td>#</td>';
                    tb += '<td><input type="hidden" name="obat_order[]" value="'+obat+'"/>'+obatnya+'</td>';
                    tb += '<td><input type="hidden" name="obat_jumlah[]" value="'+jumlah+'"/>'+jumlah+'</td>';
                    tb += '<td><button class="btn btn-sm btn-danger delete-row"><i class="fas fa-trash-alt"></i></button></td>';
                tb += '</tr>';
                $('.table-trx > tbody:last-child').append(tb);
            }
        });

        // Find and remove selected table rows
        $(document).on('click', "table.table-trx button.delete-row", function(e){
            e.preventDefault();
            $(this).parents("tr").remove();
        });
    });
</script>