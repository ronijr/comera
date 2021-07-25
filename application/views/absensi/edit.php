<div class="layout-content-body">
		<div class="title-bar">
			<div class="title-bar-actions">
					<a href="<?php echo base_url('absensi'); ?>" class="btn btn-default">Kembali</a>
  		</div>
			<h1 class="title-bar-title">
				<span class="d-ib">Edit Data Absensi</span>
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
                echo form_open('absensi/doupdate/'.$absensi[0]->abs_id.'', $attributes);
              ?>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">User ID</label>
                    <div class="col-sm-3  <?php if(form_error('user_id') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" type="text" value="<?php echo $absensi[0]->kry_no; ?>" name="user_id" readonly>
                        <?php if(form_error('user_id') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('user_id','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <input type="hidden" name="kry_id" value="<?php echo $absensi[0]->kry_id; ?>">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Nama</label>
                    <div class="col-sm-6  <?php if(form_error('name') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" readonly type="text" value="<?php echo $absensi[0]->kry_nama; ?>" name="name">
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
                        <input id="form-control-1" class="form-control" readonly type="text" value="<?php echo $absensi[0]->kry_jabatan; ?>" name="jabatan">
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
                        <input id="form-control-1" class="form-control" readonly type="text" value="<?php echo $absensi[0]->kry_dept_nama; ?>" name="departemen">
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
                        <input id="form-control-1" class="form-control" type="date" value="<?php echo (set_value('tanggal') != "") ? set_value('tanggal') : $absensi[0]->abs_tanggal; ?>" name="tanggal">
                        <?php if(form_error('tanggal') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('tanggal','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Jam</label>
                    <div class="col-sm-6  <?php if(form_error('jam') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" type="time" value="<?php echo (set_value('jam') != "") ? set_value('jam') :  $absensi[0]->abs_in; ?>" name="jam">
                        <?php if(form_error('jam') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('jam','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-6">Status</label>
                    <div class="col-sm-6 <?php if(form_error('status') != ""): ?> has-error has-feedback <?php endif; ?>">
                      <select id="form-control-6" class="form-control" name="status">
                        <option value="">Pilih Status</option>
                        <?php
                            foreach(get_type_status_absen() as $key => $value)
                            {
                              $val = (set_value('status') == '') ? $absensi[0]->abs_status : set_value('status');
                              $selected = ($val == $key) ? 'selected' : '';
                              echo '<option value='.$key.' '.$selected.'>'.$value.'</option>';
                            }
                        ?>
                      </select>
                      <?php if(form_error('status') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('status','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-9">Lampiran</label>
                    <div class="col-sm-9">
                      <?php if(!empty($absensi[0]->abs_dokumen)): ?>
                       <a href="<?php echo base_url($absensi[0]->abs_dokumen); ?>" target="_blank"><img src="<?php echo base_url($absensi[0]->abs_dokumen); ?>" class="img-responsive" style="margin-bottom:10px; width:150px; height:150px;"/></a> 
                      <?php endif; ?>

                      <input id="form-control-9" type="file" accept="image/*" name="file_doc">
                      <input type="hidden" name="file_exists" value="<?php echo $absensi[0]->abs_dokumen; ?>"
                      <p class="help-block">
                        <small>Type: png gif jpg jpeg, max size: 2mb</small>
                      </p>
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
