<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>obat">Obat</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?=$obat->row()->nama_obat?></li>
        </ol>
    </div>
    <style>
        /* th { font-size: 12px; }
        td { font-size: 11px; } */
        /* .dataTables_wrapper {
            font-family: tahoma;
            font-size: 6px;
            
        } */
    </style>
    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                <a href="<?=base_url()?>obat/tambah_stok/<?=$obat->row()->id_obat?>" class="btn btn-outline-success btn-sm mb-1" onclick="return confirm('Apakah anda yakin akan menambah stok obat ini?');"><i class="fas fa-plus"></i> Tambah Stok</a>
                    <br><br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTablesRiwayat">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Tanggal</td>
                                    <td>Tanggal Jatuh Tempo</td>
                                    <td>Tanggal Kadaluarsa</td>
                                    <td>Nomor Faktur/Nomor PBF</td>
                                    <td>Nama PBF</td>
                                    <td>Kode Riwayat</td>
                                    <td>Nama Riwayat</td>
                                    <td>Unit</td>
                                    <td>Harga Beli</td>
                                    <td>Jumlah</td>
                                    <td>Harga Jual</td>
                                    <td>Jumlah</td>
                                    <td>No. Batch</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;foreach($riwayat->result() as $row_riwayat){?>
                                <tr>
                                    <td><?=$no++?>.</td>
                                    <td><?=$row_riwayat->tanggal_transaksi?></td>
                                    <td><?=$row_riwayat->tanggal_jatuh_tempo?></td>
                                    <td><?=$row_riwayat->tanggal_kadaluarsa?></td>
                                    <td><?=$row_riwayat->nomor_faktur?></td>
                                    <td><?=$row_riwayat->nama_pbf?></td>
                                    <td><?=$row_riwayat->kode_obat?></td>
                                    <td><?=$row_riwayat->nama_obat?></td>
                                    <td><?=$row_riwayat->jumlah_unit?> <?=$row_riwayat->nama_satuan?></td>
                                    <td>Rp. <?=number_format($row_riwayat->harga_beli, 2, ',', '.')?></td>
                                    <td>Rp. <?=number_format($row_riwayat->sum_harga_beli, 2, ',', '.')?></td>
                                    <td>Rp. <?=number_format($row_riwayat->harga_jual, 2, ',', '.')?></td>
                                    <td>Rp. <?=number_format($row_riwayat->sum_harga_jual, 2, ',', '.')?></td>
                                    <td>
                                    <?=$row_riwayat->status?>
                                    </td>
                                    <td>
                                    <?=$row_riwayat->no_batch?>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!---Container Fluid-->