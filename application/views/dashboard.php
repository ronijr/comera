<div class="layout-content-body">
    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="d-ib">Dashboard</span>
        </h1>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="col-sm-9 col-sm-offset-3 col-md-8 col-md-offset-4">
                <h1 class="title-bar-title">
                    <span class="d-ib">Selamat Datang, <span class="text-warning"><?php echo $this->session->userdata('data_user')[0]->kry_nama; ?></span></span>
                </h1>
            </div>
        </div>
    </div><br>
    <div class="row gutter-xs">
        <div class="col-md-6 col-lg-3 col-lg-push-0">
            <div class="card bg-default">
            <div class="card-body">
                <div class="media">
                <div class="media-middle media-left">
                    <span class="bg-default-inverse circle sq-48">
                    <span class="icon icon-user"></span>
                    </span>
                </div>
                <div class="media-middle media-body">
                    <h6 class="media-heading">Data Karyawan</h6>
                    <h3 class="media-heading">
                    <span class="fw-l"><?php echo $karyawan; ?></span>
                    </h3>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-lg-push-3">
            <div class="card bg-warning">
            <div class="card-body">
                <div class="media">
                <div class="media-middle media-left">
                    <span class="bg-warning-inverse circle sq-48">
                    <span class="icon icon-shopping-bag"></span>
                    </span>
                </div>
                <div class="media-middle media-body">
                    <h6 class="media-heading">Karyawan Masuk hari ini</h6>
                    <h3 class="media-heading">
                    <span class="fw-l"><?php echo $absensi_hadir; ?></span>
                    </h3>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-lg-pull-3">
            <div class="card bg-default">
            <div class="card-body">
                <div class="media">
                <div class="media-middle media-left">
                    <span class="bg-default-inverse circle sq-48">
                    <span class="icon icon-clock-o"></span>
                    </span>
                </div>
                <div class="media-middle media-body">
                    <h6 class="media-heading">Karyawan Ijin/Sakit</h6>
                    <h3 class="media-heading">
                    <span class="fw-l"><?php echo $absensi_sakit_ijin; ?></span>
                    </h3>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-lg-pull-0">
            <div class="card bg-warning">
            <div class="card-body">
                <div class="media">
                <div class="media-middle media-left">
                    <span class="bg-warning-inverse circle sq-48">
                    <span class="icon icon-usd"></span>
                    </span>
                </div>
                <div class="media-middle media-body">
                    <h6 class="media-heading">Total Pinjaman</h6>
                    <h3 class="media-heading">
                    <span class="fw-l">Rp<?php echo number_format($total_pinjaman); ?></span>
                    </h3>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>