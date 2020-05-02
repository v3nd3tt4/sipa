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
            <p class="text-center"><u><b>Kartu Persediaan</b></u> <br>
                <?=$this->input->post('tanggal_awal', true)?>/<?=$this->input->post('tanggal_akhir', true)?>
            </p>
            
            <div class="btn-print">
            <button class="btn btn-danger " type="button" onclick="window.history.back();"><i class="fas fa-arrow-left"></i> Kembali</button>
            <button class="btn  btn-info " onclick="window.print();">Cetak</button>
            <button class="btn btn-success" onclick="exportTableToExcel('cetak-table', 'Kartu Persediaan <?=$this->input->post('tanggal_awal', true)?> sd <?=$this->input->post('tanggal_akhir', true)?>')"> Export Excel </button>
            <br><br>
            </div>
            <table class="table table-bordered table-striped table-hover dataTables" id="cetak-table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Kode Obat</td>
                        <td>Nama Obat</td>
                        <td>Saldo Awal</td>
                        <td>Bertambah</td>
                        <td>Berkurang</td>
                        <td>Saldo Akhir</td>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                    $tanggal_awal = $this->input->post('tanggal_awal', true);
                    $tanggal_akhir = $this->input->post('tanggal_akhir', true);
                    foreach($obat->result() as $row_obat){
                        // $query_stok = $this->db->get_where('view_total_stok', array('id_obat' => $row_obat->id_obat))->row();
                        

                        $stok_plus = $this->db->query("SELECT sum(jumlah_unit) as stok_awal from tb_stok where tanggal_transaksi < '$tanggal_awal' and id_obat = '".$row_obat->id_obat."' and status in ('stok awal', 'pembelian')");
                        $stok_minus = $this->db->query("SELECT sum(jumlah_unit) as stok_awal from tb_stok where tanggal_transaksi < '$tanggal_awal' and id_obat = '".$row_obat->id_obat."' and status in ('penggunaan')");
                        $stok_awal = $stok_plus->row()->stok_awal - $stok_minus->row()->stok_awal;

                        //pembelian
                        $stok_pembelian = $this->db->query("SELECT sum(jumlah_unit) as stok_pembelian from tb_stok where id_obat = '".$row_obat->id_obat."' and status in ('stok awal', 'pembelian') and tanggal_transaksi between '$tanggal_awal' and '$tanggal_akhir'");

                        //penggunaan
                        $stok_penggunaan = $this->db->query("SELECT sum(jumlah_unit) as stok_penggunaan from tb_stok where id_obat = '".$row_obat->id_obat."' and status in ('penggunaan') and tanggal_transaksi between '$tanggal_awal' and '$tanggal_akhir'");

                        // $stok = $query_stok->stok_awal + $query_stok->pembelian - $query_stok->penggunaan;
                        $stok = $stok_awal + $stok_pembelian->row()->stok_pembelian - $stok_penggunaan->row()->stok_penggunaan;

                    ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$row_obat->kode_obat?></td>
                        <td><?=$row_obat->nama_obat?></td>
                        <td><?=$stok_awal?></td>
                        <td><?=$stok_pembelian->row()->stok_pembelian == '' ? 0 : $stok_pembelian->row()->stok_pembelian?></td>
                        <td><?=$stok_penggunaan->row()->stok_penggunaan == '' ? 0 : $stok_penggunaan->row()->stok_penggunaan?></td>
                        <td><?=$stok?></td>
                    </tr>
                    <?php }?>
                </tbody>
                
            </table>
            
        </div>
    </div>
</div>