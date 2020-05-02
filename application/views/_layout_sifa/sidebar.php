<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <!-- <img src="<?= base_url('assets/'); ?>img/logo/logo2.png"> -->
        </div>
        <div class="sidebar-brand-text mx-3">SIPA</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Features
    </div>
    <?php if($this->session->userdata('level') == 'Admin'){?>
    <li class="nav-item <?=$title=='Unit' || $title=='Tambah Unit' || $title=='Edit Unit' || $title=='Pasien' || $title=='Tambah Pasien' || $title=='Edit Pasien' || $title=='Dokter' || $title=='Tambah Dokter' || $title=='Edit Dokter' || $title=='Satuan' || $title=='Tambah Satuan' || $title=='Edit Satuan' || $title=='Obat' || $title=='Tambah Obat' || $title=='Tambah Stok' || $title=='Edit Obat' || $title=='Tambah Stok' || $title=='Riwayat Stok' ? 'active' :'' ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap" aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span>Master Data</span>
        </a>
        <div id="collapseBootstrap" class="collapse show" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data</h6>
                <a class="collapse-item <?=$title=='Unit' || $title=='Tambah Unit' || $title=='Edit Unit' ? 'active' :'' ?>" href="<?= base_url(); ?>unit">Data Unit</a>
                <a class="collapse-item <?=$title=='User' || $title=='Tambah User' || $title=='Edit User' ? 'active' :'' ?>" href="<?= base_url(); ?>user">Data User</a>
                <a class="collapse-item <?=$title=='Dokter' || $title=='Tambah Dokter' || $title=='Edit Dokter' ? 'active' :'' ?>" href="<?= base_url(); ?>dokter">Data Dokter</a>
                <a class="collapse-item <?=$title=='Pasien' || $title=='Tambah Pasien' || $title=='Edit Pasien' ? 'active' :'' ?>" href="<?= base_url(); ?>pasien">Data Pasien</a>
                <a class="collapse-item <?=$title=='Satuan' || $title=='Tambah Satuan' || $title=='Edit Satuan' ? 'active' :'' ?>" href="<?= base_url(); ?>satuan">Data Satuan</a>
                <a class="collapse-item <?=$title=='Pbf' || $title=='Tambah PBF' || $title=='Edit PBF' ? 'active' :'' ?>" href="<?= base_url(); ?>pbf">Data PBF</a>
                <a class="collapse-item <?=$title=='Obat' || $title=='Tambah Obat' || $title=='Edit Obat' || $title=='Tambah Stok' || $title=='Riwayat Stok'  ? 'active' :'' ?>" href="<?= base_url(); ?>obat">Data Obat</a>
            </div>
        </div>
    </li>
    <li class="nav-item <?=$title=='Transaksi' ? 'active' : ''?>">
        <a class="nav-link" href="<?= base_url(); ?>trx">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Transaksi</span>
        </a>
    </li>
    <li class="nav-item <?=$title=='Persediaan' ? 'active' : ''?>">
        <a class="nav-link " href="<?= base_url(); ?>persediaan">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Persediaan</span>
        </a>
    </li>
    <?php }?>

    <?php if($this->session->userdata('level') == 'Operator'){?>
    <li class="nav-item <?=$title=='Resep' ? 'active' : ''?>">
        <a class="nav-link" href="<?= base_url(); ?>resep">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Resep</span>
        </a>
    </li>
    
    <?php }?>

    <?php if($this->session->userdata('level') == 'Kasir'){?>
    <li class="nav-item <?=$title=='Kasir' ? 'active' : ''?>">
        <a class="nav-link " href="<?= base_url(); ?>kasir">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Transaksi</span>
        </a>
    </li>
    <li class="nav-item <?=$title=='Laporan' ? 'active' : ''?>">
        <a class="nav-link " href="<?= base_url(); ?>laporan">
            <i class="fab fa-fw fa-wpforms"></i>
            <span>Laporan</span>
        </a>
    </li>
    <?php }?>
    
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>
<!-- Sidebar -->