<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>unit">Unit</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
        </ol>
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <form action="<?=base_url()?>user/store" method="POST">
                        <div class="form-group">
                            <label for="">Nama User:</label>
                            <input type="text" class="form-control" name="nama_user">
                        </div>
                        <div class="form-group">
                            <label for="">Username:</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label for="">Password:</label>
                            <input type="text" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label for="">Unit:</label>
                            <select class="form-control" name="unit">
                                <option value="">--Pilih--</option>
                                <?php foreach($unit->result() as $row_unit){?>
                                <option value="<?=$row_unit->id_unit?>"><?=$row_unit->nama_unit?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Level:</label>
                            <select name="level" id="" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Operator">Operator</option>
                                    <option value="Kasir">Kasir</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                    </form>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>


</div>
<!---Container Fluid-->