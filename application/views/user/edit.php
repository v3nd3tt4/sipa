<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>unit">Unit</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <form action="<?=base_url()?>user/update" method="POST">
                    <div class="form-group">
                            <label for="">Nama User:</label>
                            <input type="hidden" name="id_user" value="<?=$row->row()->id_user?>">
                            <input type="text" class="form-control" name="nama_user" value="<?=$row->row()->nama_user?>">
                        </div>
                        <div class="form-group">
                            <label for="">Username:</label>
                            <input type="text" class="form-control" readonly name="username" value="<?=$row->row()->username?>">
                        </div>
                        <div class="form-group">
                            <label for="">Password:</label>
                            <input type="text" class="form-control" name="password" value="<?=$row->row()->password?>">
                        </div>
                        <div class="form-group">
                            <label for="">Unit:</label>
                            <select class="form-control" name="unit">
                                <option value="">--Pilih--</option>
                                <?php foreach($unit->result() as $row_unit){?>
                                <option value="<?=$row_unit->id_unit?>" <?=$row->row()->unit==$row_unit->id_unit?'selected': ''?>><?=$row_unit->nama_unit?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Level:</label>
                            <select name="level" id="" class="form-control">
                                    <option value="">--Pilih--</option>
                                    <option value="Admin" <?=$row->row()->level=='Admin'?'selected': ''?>>Admin</option>
                                    <option value="Operator" <?=$row->row()->level=='Operator'?'selected': ''?>>Operator</option>
                                    <option value="Kasir" <?=$row->row()->level=='Kasir'?'selected': ''?>>Kasir</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update</button>
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