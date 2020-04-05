<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>pasien">Pasien</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </div>

    <form action="<?=base_url()?>pasien/update" method="POST" enctype="multipart/form-data">
    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label for="">NIK:</label>
                            <input type="number" class="form-control" name="nik" value="<?=$row->row()->nik?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Pemilih:</label>
                            <input type="hidden" name="id_pasien" value="<?=$row->row()->id_pasien?>">
                            <input type="text" class="form-control" name="nama" value="<?=$row->row()->nama?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Foto: <a class="btn btn-sm btn-info" target="_blank" href="<?=base_url()?>gambar/pasien/<?=$row->row()->foto?>">Lihat</a></label>
                            <input type="file" class="form-control" name="foto">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" value="<?=$row->row()->tgl_lahir?>"  required>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select class="form-control" name="jk"  required>
                                <option value="">--pilih--</option>
                                <option value="Pria" <?=$row->row()->jk == 'Pria' ? 'selected' : ''?>>Pria</option>
                                <option value="Wanita" <?=$row->row()->jk == 'Wanita' ? 'selected' : ''?>>Wanita</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Agama</label>
                            <select class="form-control" name="agama"  required>
                                <option value="">--pilih--</option>
                                <option value="Islam" <?=$row->row()->agama == 'Islam' ? 'selected' : ''?>>Islam</option>
                                <option value="Kristen Protestan" <?=$row->row()->agama == 'Kristen Protestan' ? 'selected' : ''?>>Kristen Protestan</option>
                                <option value="Katolik" <?=$row->row()->agama == 'Katolik' ? 'selected' : ''?>>Katolik</option>
                                <option value="Hindu" <?=$row->row()->agama == 'Hindu' ? 'selected' : ''?>>Hindu</option>
                                <option value="Buddha" <?=$row->row()->agama == 'Buddha' ? 'selected' : ''?>>Buddha</option>
                                <option value="Kong Hu Cu" <?=$row->row()->agama == 'Kong Hu Cu' ? 'selected' : ''?>>Kong Hu Cu</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis</label>
                            <select name="jenis" id="" class="form-control" required>
                                <option value="">--pilih--</option>
                                <option value="umum" <?=$row->row()->jenis == 'umum' ? 'selected' : ''?>>umum</option>
                                <option value="pasien jaminan" <?=$row->row()->jenis == 'pasien jaminan' ? 'selected' : ''?>>pasien jaminan</option>
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
                            <input type="text" class="form-control" name="rt" value="<?=$row->row()->rt?>"  required>
                        </div>
                        <div class="form-group">
                            <label for="">RW</label>
                            <input type="text" class="form-control" name="rw" value="<?=$row->row()->rw?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Desa/Kelurahan</label>
                            <input type="text" class="form-control" name="kelurahan" value="<?=$row->row()->kelurahan?>"  required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat:</label>
                            <textarea  class="form-control" name="alamat" ><?=$row->row()->alamat?></textarea>
                        </div>
                        <button class="btn btn-success" type="submit"><i class="fas fa-save"></i> Update</button>
                    </div>
                </div>
            </div>
        
    </div>
    </form>


</div>
<!---Container Fluid-->