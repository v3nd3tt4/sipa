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
                    <div class="text-center">
                        <h4>Selamat Datang dalam Sistem Informasi Farmasi</h4>
                        <hr>
                    </div>
                    <div class="row">
                        <?php if($data_kadaluarsa->num_rows() != 0){?>
                        <div class="col-md-6">
                            <div class="alert alert-danger">
                                Obat yang akan kadaluarsa
                                <hr>
                                <ol>
                                    <?php foreach($data_kadaluarsa->result() as $row_data){?>
                                    <li><?=$row_data->nama_obat?> <br> Tanggal Kadaluarsa <b><?=$row_data->tanggal_kadaluarsa?></b>
                                    <br> No.Faktur/No.PBF: <?=$row_data->nomor_faktur?> 
                                    <br> Jumlah: <?=$row_data->jumlah_unit?> 
                                    </li>
                                    <?php }?>
                                </ol>
                            </div>
                        </div>
                        <?php }?>
                        <?php if($data_kadaluarsa->num_rows() != 0){?>
                        <div class="col-md-6">
                            <div class="alert alert-warning">
                                Obat yang akan jatuh tempo
                                <hr>
                                <ol>
                                    <?php foreach($data_jatuh_tempo->result() as $row_data){?>
                                    <li><?=$row_data->nama_obat?> <br> Tanggal Jatuh Tempo <b><?=$row_data->tanggal_jatuh_tempo?></b>
                                    <br> No.Faktur/No.PBF: <?=$row_data->nomor_faktur?> 
                                    <br> Jumlah: <?=$row_data->jumlah_unit?> 
                                    </li>
                                    <?php }?>
                                </ol>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!---Container Fluid-->