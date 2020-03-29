<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>barang">Obat</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </div>
    <style>
        /* th { font-size: 12px; }
        td { font-size: 11px; } */
        .dataTables_wrapper {
            font-family: tahoma;
            font-size: 12px;
            
        }
    </style>
    <form action="<?=base_url()?>barang/store" method="POST">
    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Tanggal:</label>
                        <input type="date" class="form-control" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nomor Faktur/Nomor PBF:</label>
                        <input type="text" class="form-control" name="nomor_faktur" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kode Barang:</label>
                        <input type="text" class="form-control" name="kode_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Barang:</label>
                        <input type="text" class="form-control" name="nama_barang" required>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Unit:</label>
                        <input type="number" class="form-control" name="jumlah_unit" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Satuan:</label>
                        <select name="id_satuan"  class="form-control" required>
                            <option value="">--pilih--</option>
                            <?php foreach($satuan->result() as $row_satuan){?>
                            <option value="<?=$row_satuan->id_satuan?>"><?=$row_satuan->nama_satuan?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Beli:</label>
                        <input type="number" class="form-control" name="harga_beli" required>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Jual:</label>
                        <input type="number" class="form-control" name="harga_jual" required>
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
    </form>

</div>
<!---Container Fluid-->