<div class="layout-sidebar">
<div class="layout-sidebar-backdrop"></div>
<div class="layout-sidebar-body">
    <nav id="sidenav" class="sidenav-collapse collapse">
    <ul class="sidenav">
        <li class="sidenav-search hidden-md hidden-lg">
        <form class="sidenav-form" action="/">
            <div class="form-group form-group-sm">
            <div class="input-with-icon">
                <input class="form-control" type="text" placeholder="Search…">
                <span class="icon icon-search input-icon"></span>
            </div>
            </div>
        </form>
        </li>
        <li class="sidenav-heading">Master</li>
        <li class="sidenav-item <?php echo (strpos(base_url('dashboard'), current_url()) === true) ? 'active' : ''; ?>">
            <a href="<?php echo base_url('dashboard'); ?>">
                <span class="sidenav-icon icon icon-home"></span>
                <span class="sidenav-label">Dashboards</span>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="<?php echo base_url('karyawan'); ?>">
                <span class="sidenav-icon icon icon-th"></span>
                <span class="sidenav-label">Karyawan</span>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="<?php echo base_url('penggajian'); ?>">
                <span class="sidenav-icon icon icon-th"></span>
                <span class="sidenav-label">Gaji</span>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="<?php echo base_url('potongan'); ?>">
                <span class="sidenav-icon icon icon-th"></span>
                <span class="sidenav-label">Potongan Gaji</span>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="<?php echo base_url('jabatan'); ?>">
                <span class="sidenav-icon icon icon-th"></span>
                <span class="sidenav-label">Jabatan</span>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="<?php echo base_url('departemen'); ?>">
                <span class="sidenav-icon icon icon-th"></span>
                <span class="sidenav-label">Departemen</span>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="<?php echo base_url('tunjangan'); ?>">
                <span class="sidenav-icon icon icon-th"></span>
                <span class="sidenav-label">Tunjangan</span>
            </a>
        </li>
        <li class="sidenav-heading">Transaksi</li>
        <li class="sidenav-item">
            <a href="<?php echo base_url('absensi'); ?>" >
                <span class="sidenav-icon icon icon-briefcase"></span>
                <span class="sidenav-label">Absensi</span>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="<?php echo base_url('penggajian/transaksi'); ?>" >
                <span class="sidenav-icon icon icon-credit-card"></span>
                <span class="sidenav-label">Penggajian</span>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="<?php echo base_url('pinjaman'); ?>" >
                <span class="sidenav-icon icon icon-edit"></span>
                <span class="sidenav-label">Pinjaman</span>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="#">
                <span class="sidenav-icon icon icon-list"></span>
                <span class="sidenav-label">Lemburan</span>
            </a>
        </li>
        <li class="sidenav-heading">Laporan</li>
        <li class="sidenav-item">
            <a href="#">
                <span class="sidenav-icon icon icon-info-circle"></span>
                <span class="sidenav-label">Laporan Gaji</span>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="#">
                <span class="sidenav-icon icon icon-info-circle"></span>
                <span class="sidenav-label">Laporan Absen</span>
            </a>
        </li>
        <li class="sidenav-item">
            <a href="#">
                <span class="sidenav-icon icon icon-info-circle"></span>
                <span class="sidenav-label">Laporan Pinjaman</span>
            </a>
        </li>
    </ul>
    </nav>
</div>
</div>