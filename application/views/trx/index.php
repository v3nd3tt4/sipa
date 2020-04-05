<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>trx">Transaksi</a></li>
            <!-- <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active" aria-current="page">Blank Page</li> -->
        </ol>
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <!-- <a href="<?=base_url()?>resep/tambah" class="btn btn-outline-success mb-1 float-right"><i class="fas fa-plus"></i> Buat</a> -->
                    <br><br><br>
                    <table class="table table-bordered table-striped table-hover dataTables">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Kode Resep</td>
                                <td>Pasien</td>
                                <td>Jenis</td>
                                <td>Status</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;foreach($row->result() as $row_data){
                            if($row_data->status == 'dibuat'){
                                $class_badges = 'badge-secondary';
                            }else if($row_data->status == 'dibayar'){
                                $class_badges = 'badge-info';
                            }else if($row_data->status == 'selesai'){
                                $class_badges = 'badge-success';
                            }      
                            ?>
                            <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$row_data->kode_resep?></td>
                                <td><?=$row_data->nama?></td>
                                <td><?=$row_data->jenis?></td>
                                <td><span class="badge <?=$class_badges?>"><?=$row_data->status?></span> </td>
                                <td>
                                <!-- <a href="<?=base_url()?>resep/remove/<?=$row_data->id_resep?>" class="btn btn-outline-danger btn-sm mb-1 " onclick="return confirm('Apakah anda yakin akan menghapus data ini?');"><i class="fas fa-trash-alt"></i> Hapus</a>
                                <a href="<?=base_url()?>resep/edit/<?=$row_data->id_resep?>" class="btn btn-outline-info btn-sm mb-1 " onclick="return confirm('Apakah anda yakin akan mengedit data ini?');"><i class="fas fa-edit"></i> Edit</a> -->
                                <?php if($row_data->status == 'dibuat'){?>
                                <!-- <a href="<?=base_url()?>kasir/detail/<?=$row_data->id_resep?>" class="btn btn-outline-info btn-sm mb-1 " ><i class="fas fa-money-bill"></i> Pembayaran</a>  -->
                                <?php }?>
                                <?php if($row_data->status == 'dibayar'){?>
                                <!-- <a href="<?=base_url()?>kasir/cek/<?=$row_data->id_resep?>" class="btn btn-outline-success btn-sm mb-1 " ><i class="fas fa-eye"></i> Detail</a>  -->
                                <?php }?>
                                <a href="<?=base_url()?>trx/cek/<?=$row_data->id_resep?>" class="btn btn-outline-success btn-sm mb-1 " ><i class="fas fa-eye"></i> Detail</a> 
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
<!---Container Fluid-->