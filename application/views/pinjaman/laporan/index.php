<div class="layout-content-body">
    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="d-ib">Laporan Pinjaman</span>
        </h1>
    </div>

    <?php if(!empty($this->session->flashdata('warning'))): ?>
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <span class="icon icon-info icon-lg"></span>&nbsp;
                <?php echo $this->session->flashdata('warning'); ?>
        </div>
    <?php endif; ?>
    <div class="demo-form-wrapper">
        <form class="form form-horizontal" type="GET" action="<?php echo base_url('pinjaman/laporan_view'); ?>">
            <div class="form-group">
                <label for="password-2" class="col-sm-3 col-md-4 control-label">User ID (Optional)</label>
                <div class="col-sm-6 col-md-4">
                    <input id="password-2" class="form-control" type="text" name="userid">
                </div>
            </div>
            <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4">
                <button class="btn btn-primary pull-right" type="submit">Lihat</button>
            </div>
            </div>
        </form>
    </div>
</div>