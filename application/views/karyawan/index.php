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
                            <a href="<?php echo base_url('karyawan/create'); ?>">
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
            <span class="d-ib">Data Karyawan</span>
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
            <div class="table-responsive">
            <table id="demo-dynamic-tables-2" class="table table-middle nowrap">
                <thead>
                <tr>
                    <th>
                    <label class="custom-control custom-control-primary custom-checkbox">
                        <input class="custom-control-input" type="checkbox">
                        <span class="custom-control-indicator"></span>
                    </label>
                    </th>
                    <th>User ID</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Departemen</th>
                    <th>Alamat</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($karyawan as $row): ?>
                <tr>
                    <td>
                        <label class="custom-control custom-control-primary custom-checkbox">
                            <input class="custom-control-input" type="checkbox">
                            <span class="custom-control-indicator"></span>
                        </label>
                    </td>
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
                    <td class="maw-320">
                        <span class="truncate"><?php echo $row->kry_alamat; ?></span>
                    </td>
                    <td>
                        <div class="btn-group pull-right dropdown">
                            <button class="btn btn-link link-muted" aria-haspopup="true" data-toggle="dropdown" type="button">
                            <span class="icon icon-ellipsis-h icon-lg icon-fw"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="<?php echo base_url('karyawan/update/'.$row->kry_id.''); ?>">Edit</a></li>
                            <?php if($row->kry_no != $this->session->userdata('data_user')[0]->kry_no): ?>
                              <li><a href="#" onclick="delete_data('<?php echo $row->kry_id ?>', '<?php echo base_url('karyawan/deleted/'.$row->kry_no.''); ?>')">Hapus</a></li>
                            <?php endif; ?>
                            </ul>
                        </div>
                    </td>
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