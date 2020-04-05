<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="<?=base_url()?>persediaan">Persediaan</a></li>
            
        </ol>
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
                    <a href="<?=base_url()?>persediaan/rekap" class="btn btn-outline-success mb-1 float-right">Kartu Persediaan</a>
                    <br><br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTables">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kode Obat</td>
                                    <td>Nama Obat</td>
                                    <td>Stok Tersedia</td>
                                    <td>Aksi</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;foreach($obat->result() as $row_obat){
                                    $query_stok = $this->db->get_where('view_total_stok', array('id_obat' => $row_obat->id_obat))->row();
                                    $stok = $query_stok->stok_awal + $query_stok->pembelian - $query_stok->penggunaan;
                                ?>
                                <tr>
                                    <td><?=$no++?>.</td>
                                    <td><?=$row_obat->kode_obat?></td>
                                    <td><?=$row_obat->nama_obat?></td>
                                    <td><?=$stok?></td>
                                    <td>
                                   
                                    <a href="<?=base_url()?>persediaan/kartu_stok/<?=$row_obat->id_obat?>" class="btn btn-outline-warning btn-sm mb-1 "><i class="fab fa-fw fa-wpforms"></i> Kartu Stok</a>
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