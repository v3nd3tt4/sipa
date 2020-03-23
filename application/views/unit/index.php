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

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <a href="<?=base_url()?>unit/tambah" class="btn btn-outline-success mb-1 float-right"><i class="fas fa-plus"></i> Tambah</a>
                    <br><br><br>
                    <table class="table table-bordered table-striped table-hover dataTables">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;foreach($row->result() as $row_data){?>
                            <tr>
                                <td><?=$no++?>.</td>
                                <td><?=$row_data->nama_unit?></td>
                                <td>
                                <a href="<?=base_url()?>unit/remove/<?=$row_data->id_unit?>" class="btn btn-outline-danger btn-sm mb-1 " onclick="return confirm('Apakah anda yakin akan menghapus data ini?');"><i class="fas fa-trash-alt"></i> Hapus</a>
                                <a href="<?=base_url()?>unit/edit/<?=$row_data->id_unit?>" class="btn btn-outline-info btn-sm mb-1 " onclick="return confirm('Apakah anda yakin akan mengedit data ini?');"><i class="fas fa-edit"></i> Edit</a>
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