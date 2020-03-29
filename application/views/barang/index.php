<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <!-- <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active" aria-current="page">Blank Page</li>
        </ol> -->
    </div>
    <style>
        /* th { font-size: 12px; }
        td { font-size: 11px; } */
        .dataTables_wrapper {
            font-family: tahoma;
            font-size: 10px;
            
        }
    </style>
    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <a href="<?=base_url()?>barang/tambah" class="btn btn-outline-success mb-1 float-right"><i class="fas fa-plus"></i> Tambah</a>
                    <br><br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTables">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Tanggal</td>
                                    <td>Nomor Faktur/Nama PBF</td>
                                    <td>Kode Barang</td>
                                    <td>Nama Barang</td>
                                    <td>Unit</td>
                                    <td>Harga Beli</td>
                                    <td>Jumlah</td>
                                    <td>Harga Jual</td>
                                    <td>Jumlah</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;foreach($barang->result() as $row_barang){?>
                                <tr>
                                    <td><?=$no++?>.</td>
                                    <td><?=$row_barang->tanggal?></td>
                                    <td><?=$row_barang->nomor_faktur?></td>
                                    <td><?=$row_barang->kode_barang?></td>
                                    <td><?=$row_barang->nama_barang?></td>
                                    <td><?=$row_barang->jumlah_unit?> <?=$row_barang->nama_satuan?></td>
                                    <td>Rp. <?=number_format($row_barang->harga_beli, 2, ',', '.')?></td>
                                    <td>Rp. <?=number_format($row_barang->sum_jumlah_beli, 2, ',', '.')?></td>
                                    <td>Rp. <?=number_format($row_barang->harga_jual, 2, ',', '.')?></td>
                                    <td>Rp. <?=number_format($row_barang->sum_jumlah_jual, 2, ',', '.')?></td>
                                    <td>
                                    <a href="<?=base_url()?>barang/remove/<?=$row_barang->id_barang?>" class="btn btn-outline-danger btn-sm mb-1 " onclick="return confirm('Apakah anda yakin akan menghapus data ini?');"><i class="fas fa-trash-alt"></i> Hapus</a>
                                    <a href="<?=base_url()?>barang/edit/<?=$row_barang->id_barang?>" class="btn btn-outline-info btn-sm mb-1 " onclick="return confirm('Apakah anda yakin akan mengedit data ini?');"><i class="fas fa-edit"></i> Edit</a>
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