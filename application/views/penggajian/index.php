<div class="layout-content-body">
    <div class="title-bar">
       
        <div class="title-bar-actions">
            <div class="btn-group dropdown">
                  <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown" type="button">
		            Actions
		            <span class="icon icon-ellipsis-h icon-lg icon-fw"></span>
		          </button>
                  <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="<?php echo base_url('absensi/create'); ?>">
                                <div class="media">
                                <div class="media-left">
                                    <span class="icon icon-plus icon-lg icon-fw"></span>
                                </div>
                                <div class="media-body">
                                    <span class="d-b">Tambah Data</span>
                                </div>
                                </div>
                            </a>
                        </li>
                    </ul>
            </div>
        </div>
        <h1 class="title-bar-title">
            <span class="d-ib">Gaji Karyawan</span>
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
    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-body">
                    
                 </div>
             </div>
        </div>
    </div>
    <div class="row">
    <div class="col-xs-12">
        <div class="panel">
        <div class="panel-body">
            <div class="table-responsive">
            <table id="demo-dynamic-tables-2" class="table table-middle nowrap">
                <thead>
                <tr>
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Depatemen</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan</th>
                    <th>Gaji Total</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($karyawan as $row): ?>
                        <tr>
                            <td data-order="<?php echo $row->kry_no; ?>">
                                <span class="icon-with-child m-r">
                                    <img class="circle" width="36" height="36" src="<?php echo ($row->kry_image != "") ?  base_url(''.$row->kry_image.'') : base_url('assets/img/noimage-user.jpeg'); ?>" >
                                    <span class="icon-child bg-warning circle sq-8"></span>
                                </span>
                                <strong><?php echo $row->kry_no; ?></strong>
                            </td>
                            <td><?php echo $row->kry_nama; ?></td>
                            <td><?php echo $row->kry_jabatan; ?></td>
                            <td><?php echo $row->kry_dept_nama; ?></td>
                            <td>Rp<?php echo number_format($row->pg_gaji_pokok); ?></td>
                            <td>Rp<?php echo number_format($row->tunjangan); ?></td>
                            <td>Rp<?php echo number_format($row->gaji_pokok); ?></td>
                            <td><?php echo get_status_gaji($row->pg_status); ?></td>
                            <td><a href="<?php echo base_url('penggajian/detail/'.$row->kry_no.''); ?>">Lihat Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>