<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <ol class="breadcrumb">
            
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>persediaan">Persediaan</a></li>
                <li class="breadcrumb-item" >Kartu Stok</li>
                <li class="breadcrumb-item active" aria-current="page"><?=$obat->row()->nama_obat?></li>
            </ol>
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
        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card h-100">
                <div class="card-body">
                    <p>Kartu Stok</p><hr>
                    <form action="<?=base_url()?>persediaan/proses_kartu_stok" method="POST">
                        <div class="form-group">
                            <label for="">Obat</label>
                            <input type="hidden" name="id_obat" value="<?=$obat->row()->id_obat?>">
                            <input type="text" class="form-control" name="obat" value="<?=$obat->row()->nama_obat?>" readonly required> 
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Awal</label>
                            <input type="date" name="tanggal_awal" id="" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" id="" class="form-control" required>
                        </div>
                        <button class="btn btn-success" type="submit">Proses</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>


</div>
<!---Container Fluid-->