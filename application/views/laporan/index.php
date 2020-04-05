<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?=$title?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url()?>laporan">Laporan</a></li>
            <!-- <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active" aria-current="page">Blank Page</li> -->
        </ol>
    </div>

    <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card h-100">
                <div class="card-body">
                    <p>Laporan Kas Per Hari</p>
                    <hr>
                    <form action="<?=base_url()?>laporan/hari" target="_blank" method="POST">
                        <div class="form-group">
                            <label for="">Tanggal:</label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <button class="btn btn-success">Proses</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card h-100">
                <div class="card-body">
                    <p>Laporan Kas Per Periode</p>
                    <hr>
                    <form action="<?=base_url()?>laporan/periode" target="_blank" method="POST">
                        <div class="form-group">
                            <label for="">Tanggal Awal:</label>
                            <input type="date" name="tanggal_awal" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Akhir:</label>
                            <input type="date" name="tanggal_akhir" class="form-control" required>
                        </div>
                        <button class="btn btn-success">Proses</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<!---Container Fluid-->