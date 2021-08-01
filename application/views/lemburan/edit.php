
<div class="layout-content-body">
		<div class="title-bar">
			<div class="title-bar-actions">
					<a href="<?php echo base_url('lemburan'); ?>" class="btn btn-default">Kembali</a>
  		</div>
			<h1 class="title-bar-title">
				<span class="d-ib">Edit Lemburan</span>
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
                echo form_open('lemburan/doupdate/'.$lemburan[0]->lbr_id.'', $attributes);
              ?>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">User ID</label>
                    <div class="col-sm-3  <?php if(form_error('user_id') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" readonly type="text" value="<?php echo (set_value('user_id') != "") ? set_value('user_id') : $lemburan[0]->kry_no; ?>" name="user_id">
                        <?php if(form_error('user_id') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('user_id','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <input type="hidden" name="kry_id" value="<?php echo (!empty($karyawan)) ? $lemburan[0]->kry_id : set_value('kry_id'); ?>">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Nama</label>
                    <div class="col-sm-6  <?php if(form_error('name') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" readonly type="text" value="<?php echo (!empty($lemburan)) ? $lemburan[0]->kry_nama : set_value('name'); ?>" name="name">
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
                        <input id="form-control-1" class="form-control" readonly type="text" value="<?php echo (!empty($lemburan)) ? $lemburan[0]->kry_jabatan : set_value('jabatan'); ?>" name="jabatan">
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
                        <input id="form-control-1" class="form-control" readonly type="text" value="<?php echo (!empty($lemburan)) ? $lemburan[0]->kry_dept_nama : set_value('departemen'); ?>" name="departemen">
                        <?php if(form_error('departemen') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('departemen','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Tanggal</label>
                    <div class="col-sm-6  <?php if(form_error('tanggal') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" type="date" value="<?php echo (set_value('tanggal') != "") ? set_value('tanggal') : date('Y-m-d',strtotime($lemburan[0]->lbr_tanggal)); ?>" name="tanggal">
                        <?php if(form_error('tanggal') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('tanggal','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Jam Mulai</label>
                    <div class="col-sm-6  <?php if(form_error('jam_mulai') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" type="time" value="<?php echo (set_value('jam_mulai') != "") ? set_value('jam_mulai') : date('H:i',strtotime($lemburan[0]->lbr_jam_mulai)); ?>" name="jam_mulai">
                        <?php if(form_error('jam_mulai') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('jam_mulai','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Jam Selesai</label>
                    <div class="col-sm-6  <?php if(form_error('jam_akhir') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" type="time" value="<?php echo (set_value('jam_akhir') != "") ? set_value('jam_akhir') : date('H:i',strtotime($lemburan[0]->lbr_jam_selesai)); ?>" name="jam_akhir">
                        <?php if(form_error('jam_akhir') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('jam_akhir','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-8">Keterangan</label>
                    <div class="col-sm-6">
                      <textarea id="form-control-8" class="form-control" rows="3" name="deskripsi"><?php echo (set_value('deskripsi') != "") ? set_value('deskripsi') : $lemburan[0]->lbr_deskripsi; ?></textarea>
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
</div>
