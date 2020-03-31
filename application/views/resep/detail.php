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
            <button class="btn  btn-success " onclick="window.print();">Cetak</button>
            <br><br>
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
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Obat</td>
                        <td>Jumlah</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;foreach($row_resep_detail->result() as $resep_detail){?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$resep_detail->kode_obat?> - <?=$resep_detail->nama_obat?></td>
                        <td><?=$resep_detail->jumlah?></td>
                    </tr>
                    <?php }
                    if($row_resep_detail->num_rows() < 3 ){
                        for($i=0;$i<$row_resep_detail->num_rows()+3;$i++){
                    ?>
                    <tr>
                        <td></td>
                        <td>&nbsp;</td>
                        <td></td>
                    </tr>
                    <?php
                        }
                    } 
                    ?>
                </tbody>
            </table>
            <p class="text-right">Bandar Lampung, <?=date('d M Y')?></p>
        </div>
    </div>
</div>