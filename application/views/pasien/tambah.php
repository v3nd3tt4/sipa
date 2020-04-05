<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>pasien">Pasien</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </div>
    <form action="<?=base_url()?>pasien/store" method="POST" enctype="multipart/form-data">
    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="">NIK:</label>
                            <input type="number" class="form-control" name="nik" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama:</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="">Foto:</label>
                            <input type="file" class="form-control" name="foto" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir"  required>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select class="form-control" name="jk"  required>
                                <option value="">--pilih--</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Agama</label>
                            <select class="form-control" name="agama"  required>
                                <option value="">--pilih--</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen Protestan">Kristen Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Kong Hu Cu">Kong Hu Cu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis</label>
                            <select name="jenis" id="" class="form-control" required>
                                <option value="">--pilih--</option>
                                <option value="umum">umum</option>
                                <option value="pasien jaminan">pasien jaminan</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">RT</label>
                            <input type="text" class="form-control" name="rt"  required>
                        </div>
                        <div class="form-group">
                            <label for="">RW</label>
                            <input type="text" class="form-control" name="rw"  required>
                        </div>
                        <div class="form-group">
                            <label for="">Desa/Kelurahan</label>
                            <input type="text" class="form-control" name="kelurahan"  required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat:</label>
                            <textarea  class="form-control" name="alamat" ></textarea>
                        </div>
                        <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        
    </div>
    </form>


</div>
<!---Container Fluid-->