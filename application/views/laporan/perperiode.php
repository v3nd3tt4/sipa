<div class="container">
    <div class="row">
        <div class="col-md-12">
            <style>
                @media print {
                    .btn-print {
                        display: none;
                    }
                }
            </style>
            <p class="text-center"><u><b>Laporan Per Periode</b></u> <br>
                <?=$this->input->post('tanggal_awal', true)?>/<?=$this->input->post('tanggal_akhir', true)?>
            </p>
            <?php 
                $get_kasir = $this->db->get_where('tb_user', array('id_user' => $this->session->userdata('id_user')));
                echo 'Kasir: '.$get_kasir->row()->nama_user;
            ?>
            <br><br>
            <div class="btn-print">
            <button class="btn  btn-success " onclick="window.print();">Cetak</button>
            <br><br>
            </div>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pasien</th>
                        <th>Obat</th>
                        <th>Jumlah</th>
                        <th>Harga Jual</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $tot=0;$no=1;foreach($data_laporan->result() as $row_data){ ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$row_data->nama?></td>
                        <td><?=$row_data->nama_obat?></td>
                        <td><?=$row_data->jumlah?></td>
                        <td>Rp. <?=number_format($row_data->harga_jual, '0', ',', '.')?></td>
                        <td>Rp. <?=number_format($row_data->sum_harga_jual, '0', ',', '.')?></td>
                    </tr>
                    <?php $tot += $row_data->sum_harga_jual;}?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5" class="text-right">Total</th>
                        <th colspan="1">Rp. <?=number_format($tot, '0', ',', '.')?></th>
                    </tr>
                </tfoot>
            </table>
            
        </div>
    </div>
</div>