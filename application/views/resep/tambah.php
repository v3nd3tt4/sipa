<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>resep">Resep</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </div>
    <style>
        th { font-size: 12px; }
        td { font-size: 11px; }
    </style>
    <form action="<?=base_url()?>resep/store" method="POST">
    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <form action="<?=base_url()?>resep/store" method="POST">
                        <div class="form-group">
                            <label for="">Kode Resep:</label>
                            <input type="text" class="form-control" name="nama_resep" required>
                        </div>
                        <div class="form-group">
                            <label for="">Pasien:</label>
                            <select name="id_pasien" id="" required class="form-control select2">
                                <option value="">--pilih--</option>
                                <?php foreach($pasien->result() as $row_pasien){?>
                                    <option value="<?=$row_pasien->id_pasien?>"><?=$row_pasien->nik?> - <?=$row_pasien->nama?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Dokter:</label>
                            <select name="id_dokter" id="" required class="form-control select2">
                                <option value="">--pilih--</option>
                                <?php foreach($dokter->result() as $row_dokter){?>
                                    <option value="<?=$row_dokter->id_dokter?>"><?=$row_dokter->id_dokter?> - <?=$row_dokter->nama_dokter?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Rekam Medis:</label>
                            <input type="text" class="form-control" name="nomor_rekam_medis" required>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-md-8 mb-8">
            <div class="card h-100">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Obat:</label>
                        <select name="obat" id="obat_resep" required class="form-control select2">
                            <option value="">--pilih--</option>
                            <?php foreach($obat->result() as $row_obat){
                                $stok = $row_obat->stok_awal + $row_obat->pembelian - $row_obat->penggunaan;
                            ?>
                            <option value="<?=$row_obat->id_obat?>" data-stok="<?=$stok?>"><?=$row_obat->kode_obat?> - <?=$row_obat->nama_obat?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Stok:</label>
                        <input type="number" class="form-control" name="stok" id="stok_resep" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah:</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah_resep" required>
                    </div>
                    <button type="button" class="btn btn-success btn-sm btn-tambah"><i class="fas fa-plus"></i> Tambah</button>
                    <br/><br/>
                    <table class="table table-striped table-border table-trx">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>Obat</td>
                                <td>Jumlah</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <br>
                    <button type="submit" class="btn btn-info btn-sm float-right"><i class="fas fa-save"></i>  Buat resep dan Selesai</button>
                </div>
            </div>
        </div>
        
    </div>
    </form>

</div>
<!---Container Fluid-->