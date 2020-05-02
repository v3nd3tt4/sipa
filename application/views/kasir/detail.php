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
            <form action="<?=base_url()?>kasir/prev_trx" method="POST">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Obat</td>
                        <td>Jumlah</td>
                        <td style="display:none">Harga Beli (per satuan)</td>
                        <td>Harga Jual (per satuan)</td>
                    </tr>
                </thead>
                <tbody>
                    <input type="hidden" name="id_resep_bayar" value="<?=$row_resep->row()->id_resep?>">
                    <?php $no=1;foreach($row_resep_detail->result() as $resep_detail){
                        $id_obat = $resep_detail->id_obat;
                    $get_max_harga_beli = $this->db->query("SELECT max(harga_beli) as ref_harga_beli from tb_stok where id_obat = '$id_obat'");    
                    $get_max_harga_jual = $this->db->query("SELECT max(harga_jual) as ref_harga_jual from tb_stok where id_obat = '$id_obat'");    
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
                            <small>Referensi Harga Beli: <b>Rp. <?=$get_max_harga_beli->row()->ref_harga_beli?></b></small>
                            <input type="number" class="form-control" name="harga_beli_bayar[]" value="<?=$get_max_harga_beli->row()->ref_harga_beli?>" required>
                        </td>
                        <td>
                            <small>Referensi Harga Jual: <b>Rp. <?=$get_max_harga_jual->row()->ref_harga_jual?></b></small>
                            <input type="number" class="form-control" name="harga_jual_bayar[]" required>
                        </td>
                    </tr>
                    <?php }
                    if($row_resep_detail->num_rows() < 3 ){
                        for($i=0;$i<$row_resep_detail->num_rows()+3;$i++){
                    ?>
                    <tr>
                        <td></td>
                        <td>&nbsp;</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <?php
                        }
                    } 
                    ?>
                </tbody>
                
            </table>
            <button class="btn btn-success float-right" ><i class="fas fa-arrow-right"></i>  Selanjutnya</button>
            </form>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>