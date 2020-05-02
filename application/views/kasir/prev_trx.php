<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p class="text-center"><u><b>Resep</b></u></p>
            <br><br>
            <p class="text-right">Kode Resep: <?=$row_resep->row()->kode_resep?></p> 
            <br><br>
            <style>
                @media print {
                    .btn-print {
                        display: none;
                    }
                }
            </style>
            <div class="btn-print">
            <!-- <button class="btn  btn-success " onclick="window.print();">Cetak</button>
            <br><br> -->
            </div>
            
            <table class="table table-striped table-bordered">
                <tr>
                    <td>Nama Unit</td>
                    <td>: <?=$row_resep->row()->nama_unit?></td>
                    
                </tr>
                <tr>
                    <td>Nama Dokter</td>
                    <td>: <?=$row_resep->row()->nama_dokter?></td>
                    
                </tr>
                <tr>
                    <td>Nama Pasien</td>
                    <td>: <?=$row_resep->row()->nama?></td>
                    
                </tr>
                <tr>
                    <td>Nomor Rekam Medis</td>
                    <td>: <?=$row_resep->row()->nomor_rekam_medis?></td>
                    
                </tr>
            </table>
            <br>
            <br>
            <br>
            *Masukkan Harga Beli dan Harga Jual
            <form action="<?=base_url()?>kasir/proses_bayar" method="POST">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Obat</td>
                        <td>Jumlah</td>
                        <td style="display:none">Harga Beli (per satuan)</td>
                        <td>Harga Jual (per satuan)</td>
                        <td>Total</td>
                    </tr>
                </thead>
                <tbody>
                    <input type="hidden" name="id_resep_bayar" value="<?=$row_resep->row()->id_resep?>">
                    <?php 
                    $no=1;
                    // foreach($row_resep_detail->result() as $resep_detail){
                    $total_bayar = 0;
                    for($i=0;$i<count($data_from_post);$i++){
                        $id_resep = $data_from_post[$i]['id_resep_detail'];
                        $this->db->from('tb_resep_detail');
                        $this->db->join('tb_obat', 'tb_obat.id_obat=tb_resep_detail.id_obat');
                        $this->db->where(array('id_resep_detail' => $id_resep));
                        $resep_detail = $this->db->get()->row();
                        
                    ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$resep_detail->kode_obat?> - <?=$resep_detail->nama_obat?></td>
                        <td>
                        <input type="hidden" class="form-control" value="<?=$resep_detail->id_resep_detail?>" name="id_resep_detail_bayar[]">
                            <input type="hidden" class="form-control" value="<?=$resep_detail->jumlah?>" name="jumlah_bayar[]">
                            <?=$resep_detail->jumlah?>
                        </td>
                        <td style="display:none">
                            <?php echo 'RP. '.number_format($data_from_post[$i]['harga_beli'], '0', ',', '.'); ?>
                            <input type="hidden" class="form-control" name="harga_beli_bayar[]" value="<?=$data_from_post[$i]['harga_beli']?>" readonly required>
                        </td>
                        <td>
                            <?php echo 'RP. '.number_format($data_from_post[$i]['harga_jual'], '0', ',', '.'); ?>
                            <input type="hidden" class="form-control" name="harga_jual_bayar[]" value="<?=$data_from_post[$i]['harga_jual']?>" readonly required>
                        </td>
                        <td>
                            <?php $total = $data_from_post[$i]['harga_jual']*$resep_detail->jumlah; 
                                $total_bayar += $total;
                            ?>
                            <?php echo 'RP. '.number_format($total, '0', ',', '.'); ?>
                            <input type="hidden" class="form-control" name="total_bayar[]" value="<?=$total?>" readonly required>
                        </td>
                    </tr>
                    <?php }
                    if(count($data_from_post) < 3 ){
                        for($i=0;$i<count($data_from_post)+3;$i++){
                    ?>
                    <tr>
                        <td></td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td style="display:none"></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                        }
                    } 
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4"><p class="text-right"><b>Total Bayar</b></p></td>
                        <td colspan="1"><?php echo 'RP. '.number_format($total_bayar, '0', ',', '.'); ?></td>
                        
                    </tr>
                </tfoot>
            </table>
            <button class="btn btn-success float-right" type="submit" onclick="return confirm('Apakah anda yakin?')" ><i class="fas fa-save"></i>  Bayar & Simpan</button> 

            <button class="btn btn-danger float-right" type="button" onclick="myFunction();"><i class="fas fa-arrow-left"></i>  Batal & Kembali</button>
            </form>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
<script>
function myFunction() {
    var result = confirm("Apakah anda yakin?");
    if (result) {
        window.history.go(-1);
    }
}
</script>