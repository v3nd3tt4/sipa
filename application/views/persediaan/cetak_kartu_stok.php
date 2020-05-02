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
            <p class="text-center"><u><b>Kartu Stok</b></u> <br>
                <?=$this->input->post('tanggal_awal', true)?>/<?=$this->input->post('tanggal_akhir', true)?>
            </p>

            <table>
                <tr>
                    <td>Kode Obat</td>
                    <td>:<?=$obat->row()->kode_obat?></td>
                </tr>
                <tr>
                    <td>Nama Obat</td>
                    <td>:<?=$obat->row()->nama_obat?></td>
                </tr>
            </table>
            <br><br>
            <div class="btn-print">
            <button class="btn btn-danger " type="button" onclick="window.history.back();"><i class="fas fa-arrow-left"></i> Kembali</button>
            <button class="btn  btn-warning " onclick="window.print();">Cetak</button>
            <button class="btn btn-success" onclick="exportTableToExcel('cetak-table', 'Kartu Stok <?=$obat->row()->nama_obat?> <?=$this->input->post('tanggal_awal', true)?> sd <?=$this->input->post('tanggal_akhir', true)?>')"> Export Excel </button>
            <br><br>
            </div>
            <table class="table table-bordered table-striped table-hover dataTables" id="cetak-table">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Tanggal</td>
                        <td>Uraian</td>
                        <td>Referensi Transaksi</td>
                        <td>Bertambah</td>
                        <td>Berkurang</td>
                        <td>Saldo</td>
                    </tr>
                </thead>
                <?php 
                    $tanggal_awal = $this->input->post('tanggal_awal', true);
                    $tanggal_akhir = $this->input->post('tanggal_akhir', true);

                    $stok_plus = $this->db->query("SELECT sum(jumlah_unit) as stok_awal from tb_stok where tanggal_transaksi < '$tanggal_awal' and id_obat = '".$obat->row()->id_obat."' and status in ('stok awal', 'pembelian')");
                    $stok_minus = $this->db->query("SELECT sum(jumlah_unit) as stok_awal from tb_stok where tanggal_transaksi < '$tanggal_awal' and id_obat = '".$obat->row()->id_obat."' and status in ('penggunaan')");

                    $stok_awal = $stok_plus->row()->stok_awal - $stok_minus->row()->stok_awal;
                    // $stok_awal =0;
                ?>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td></td>
                        <td>Saldo Awal</td>
                        <td></td>
                        <td><?=$stok_awal?></td>
                        <td></td>
                        <td><?=$stok_awal?></td>
                    </tr>
                    <?php $no=2;
                    $st = $stok_awal;
                    $bertambah = $stok_awal;
                    $berkurang = 0;
                    foreach($stok->result() as $row_stok){
                        // $query_stok = $this->db->get_where('view_total_stok', array('id_obat' => $row_obat->id_obat))->row();
                        

                        // $stok_plus = $this->db->query("SELECT sum(jumlah_unit) as stok_awal from tb_stok where tanggal_transaksi < '$tanggal_awal' and id_obat = '".$row_obat->id_obat."' and status in ('stok awal', 'pembelian')");
                        // $stok_minus = $this->db->query("SELECT sum(jumlah_unit) as stok_awal from tb_stok where tanggal_transaksi < '$tanggal_awal' and id_obat = '".$row_obat->id_obat."' and status in ('penggunaan')");
                        // $stok_awal = $stok_plus->row()->stok_awal - $stok_minus->row()->stok_awal;

                        //pembelian
                        // $stok_pembelian = $this->db->query("SELECT sum(jumlah_unit) as stok_pembelian from tb_stok where id_obat = '".$row_obat->id_obat."' and status in ('stok awal', 'pembelian') and tanggal_transaksi between '$tanggal_awal' and '$tanggal_akhir'");

                        //penggunaan
                        // $stok_penggunaan = $this->db->query("SELECT sum(jumlah_unit) as stok_penggunaan from tb_stok where id_obat = '".$row_obat->id_obat."' and status in ('penggunaan') and tanggal_transaksi between '$tanggal_awal' and '$tanggal_akhir'");

                        // $stok = $query_stok->stok_awal + $query_stok->pembelian - $query_stok->penggunaan;
                        // $stok = $stok_awal + $stok_pembelian->row()->stok_pembelian - $stok_penggunaan->row()->stok_penggunaan;
                        if($row_stok->status == 'stok awal' || $row_stok->status == 'pembelian'){
                            $st += $row_stok->jumlah_unit;
                            $bertambah += $row_stok->jumlah_unit;
                        }  else if($row_stok->status == 'penggunaan'){
                            $st -= $row_stok->jumlah_unit;
                            $berkurang += $row_stok->jumlah_unit;
                        } 
                    ?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=$row_stok->tanggal_transaksi?></td>
                        <td>
                            <?=$row_stok->status == 'stok awal' || $row_stok->status == 'pembelian' ? 'pembelian' : $row_stok->status; ?>
                        </td>
                        <td><?=$row_stok->nomor_faktur?></td>
                        <td>
                            <?=$row_stok->status == 'stok awal' || $row_stok->status == 'pembelian' ? $row_stok->jumlah_unit : ''; ?>
                        </td>
                        <td><?=$row_stok->status == 'penggunaan' ? $row_stok->jumlah_unit : ''; ?></td>
                        <td>
                            <?=$st?>
                        </td>

                    </tr>
                    <?php }?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-right">Jumlah</th>
                        <th><?=$bertambah?></th>
                        <th><?=$berkurang?></th>
                        <th><?=$st?></th>
                    </tr>
                </tfoot>
            </table>
            
        </div>
    </div>
</div>