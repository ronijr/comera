<div class="layout-content-body">
		<div class="title-bar">
			<div class="title-bar-actions">
					<a href="<?php echo base_url('pinjaman'); ?>" class="btn btn-default">Kembali</a>
  		</div>
			<h1 class="title-bar-title">
				<span class="d-ib">Pembayaran Pinjaman</span>
			</h1>
		</div>

        <?php if(!empty($this->session->flashdata('success'))): ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <span class="icon icon-check icon-lg"></span>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
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
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="demo-form-wrapper">
              <br/><br/>
              <?php
                $attributes = array(
                  'class'       => 'form form-horizontal',
                  'enctype'     =>'multipart/form-data'
                );
                echo form_open('pinjaman/dopembayaran/'.$pinjaman[0]->txj_id.'', $attributes);
              ?>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="tanggal_pinjam" value="<?php echo $pinjaman[0]->txj_tanggal_pinjam; ?>">
                <input type="hidden" name="jatuh_tempo" value="<?php echo $pinjaman[0]->txj_jatuh_tempo; ?>">

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">User ID</label>
                    <div class="col-sm-3  <?php if(form_error('user_id') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" type="text" value="<?php echo $pinjaman[0]->kry_no; ?>" name="user_id" readonly>
                        <?php if(form_error('user_id') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('user_id','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Nama</label>
                    <div class="col-sm-6  <?php if(form_error('name') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" readonly type="text" value="<?php echo $pinjaman[0]->kry_nama; ?>" name="name">
                        <?php if(form_error('name') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('name','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Jabatan</label>
                    <div class="col-sm-6  <?php if(form_error('jabatan') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" readonly type="text" value="<?php echo $pinjaman[0]->kry_jabatan; ?>" name="jabatan">
                        <?php if(form_error('jabatan') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('jabatan','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Departemen</label>
                    <div class="col-sm-6  <?php if(form_error('departemen') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" readonly type="text" value="<?php echo $pinjaman[0]->kry_dept_nama; ?>" name="departemen">
                        <?php if(form_error('departemen') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('departemen','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
              
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Pinjaman</label>
                    <div class="col-sm-6  <?php if(form_error('nilai_pinjaman') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" readonly type="text" value="<?php echo (set_value('nilai_pinjaman') != "") ? set_value('nilai_pinjaman') : 'Rp'.number_format($pinjaman[0]->txj_nilai_pinjam); ?>" name="nilai_pinjaman">
                        <?php if(form_error('nilai_pinjaman') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('nilai_pinjaman','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Sisa Pinjaman</label>
                    <div class="col-sm-6  <?php if(form_error('sisa_pinjaman') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" readonly type="text" value="<?php echo (set_value('sisa') != "") ? set_value('sisa') : 'Rp'.number_format($pinjaman[0]->sisa_pinjaman); ?>" name="sisa">
                        <input id="form-control-1" class="form-control"  type="hidden" value="<?php echo (set_value('sisa_pinjaman') != "") ? set_value('sisa_pinjaman') : $pinjaman[0]->sisa_pinjaman; ?>" name="sisa_pinjaman">
                        <?php if(form_error('sisa_pinjaman') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('sisa_pinjaman','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Tanggal Bayar</label>
                    <div class="col-sm-6  <?php if(form_error('tanggal_bayar') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" type="date" value="<?php echo (set_value('tanggal_bayar') != "") ? set_value('tanggal_bayar') : (!empty($pembayaran)) ? $pembayaran[0]->txj_tanggal_bayar : ''; ?>" name="tanggal_bayar">
                        <?php if(form_error('tanggal_bayar') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('tanggal_bayar','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <?php $pemb =  (!empty($pembayaran)) ? $pembayaran[0]->txj_nilai_bayar : 0; ?>
                    <label class="col-sm-2 control-label" for="form-control-1">Nilai Bayar</label>
                    <div class="col-sm-6  <?php if(form_error('nilai') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" type="text" value="<?php echo (set_value('nilai') != "") ? set_value('nilai') : $pemb; ?>" name="nilai">
                        <?php if(form_error('nilai') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('nilai','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Keterangan</label>
                    <div class="col-sm-6  <?php if(form_error('deskripsi') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" type="text" value="<?php echo (set_value('deskripsi') != "") ? set_value('deskripsi') : (!empty($pembayaran)) ? $pembayaran[0]->txj_deskripsi : ''; ?>" name="deskripsi">
                        <?php if(form_error('name') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('deskripsi','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-6">&nbsp;</label>
                    <div class="col-sm-6">
                     <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
          </div> <!-- !. card body -->
        </div> <!-- !. card -->
      </div>
    </div>
    <h1 class="title-bar-title">
				<span class="d-ib">Riwayat Pembayaran</span>
			</h1><br>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
          <div class="table-responsive">
            <table id="demo-dynamic-tables-2" class="table table-middle nowrap">
                <thead>
                <tr>
                    <th>Kode Pembayaran</th>
                    <th>Nama</th>
                    <th>Tanggal Bayar</th>
                    <th>Sudah Dibayar</th>
                    <th>Keterangan</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                   <?php foreach($pembayarans as $row): ?>
                        <tr>
                            <td><?php echo $row->txj_code; ?></td>
                            <td><?php echo $row->kry_nama; ?></td>
                            <td><?php echo $row->txj_tanggal_bayar; ?></td>
                            <td>Rp<?php echo number_format($row->txj_nilai_bayar); ?></td>
                            <td><?php echo $row->txj_deskripsi; ?></td>
                            <td>
                                <div class="btn-group pull-left dropup">
                                    <button class="btn btn-link link-muted" aria-haspopup="true" data-toggle="dropdown" type="button">
                                    <span class="icon icon-ellipsis-h icon-lg icon-fw"></span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-left">
                                    <li><a onclick="delete_data('<?php echo $row->txj_id ?>', '<?php echo base_url('pinjaman/deleted'); ?>')">Hapus</a></li>
                                    <li><a href="<?php echo base_url('pinjaman/pembayaran/'.$row->txj_parent_id.'?id='.$row->txj_id.''); ?>">Edit</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                   <?php endforeach; ?>
                </tbody>
            </table>
            </div>
          </div>
        </div> <!-- !. card -->
      </div>
    </div>
</div>
