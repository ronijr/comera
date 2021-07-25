<div class="layout-content-body">
		<div class="title-bar">
			<div class="title-bar-actions">
					<a href="<?php echo base_url('karyawan'); ?>" class="btn btn-default">Kembali</a>
  		</div>
			<h1 class="title-bar-title">
				<span class="d-ib">Tambah Data Karyawan</span>
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
            <span class="icon icon-close icon-lg"></span>
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
                echo form_open('karyawan/docreate', $attributes);
              ?>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">User ID</label>
                    <div class="col-sm-2 <?php if(form_error('code') != ""): ?> has-error has-feedback <?php endif; ?>">
                        <input id="form-control-1" class="form-control" type="text" name="code" readonly value="<?php if(!empty(set_value('code'))): ?><?php echo set_value('code'); ?><?php else: ?><?php echo $code[0]->code; ?><?php endif; ?>">
                            <?php if(form_error('code') != ""): ?>
                            <span class="form-control-feedback" aria-hidden="true">
                                <span class="icon icon-times"></span>
                            </span>
                            <?php echo form_error('code','<p class="help-block">','</p>'); ?>
                            <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Nama</label>
                    <div class="col-sm-6 <?php if(form_error('name') != ""): ?> has-error has-feedback <?php endif; ?>">
                        <input id="form-control-1" class="form-control" type="text" name="name" value="<?php echo set_value('name'); ?> ">
                        <?php if(form_error('name') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('name','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Tempat Lahir</label>
                    <div class="col-sm-4 <?php if(form_error('tempat_lahir') != ""): ?> has-error has-feedback <?php endif; ?>">
                        <input id="form-control-1" class="form-control" type="text" name="tempat_lahir" value="<?php echo set_value('tempat_lahir'); ?>">
                        <?php if(form_error('tempat_lahir') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('tempat_lahir','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Tanggal Lahir</label>
                    <div class="col-sm-4 <?php if(form_error('tanggal_lahir') != ""): ?> has-error has-feedback <?php endif; ?>">
                        <input id="form-control-1" class="form-control" type="date" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>">
                        <?php if(form_error('tanggal_lahir') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('tanggal_lahir','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-8">Alamat</label>
                    <div class="col-sm-6">
                      <textarea id="form-control-8" name="alamat" class="form-control" rows="3"><?php echo set_value('alamat'); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-6">Jenis Kelamin</label>
                    <div class="col-sm-6 <?php if(form_error('jk') != ""): ?> has-error has-feedback <?php endif; ?>">
                      <select id="form-control-6" class="form-control" name="jk">
                      <option value="">Pilih Jenis Kelamin</option>
                       <?php
                            foreach(get_jk() as $key => $value)
                            {
                              $selected = (set_value('jk') == $key) ? 'selected' : '';
                              echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                            }
                        ?>
                      </select>
                      <?php if(form_error('jk') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('jk','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-6">Status Perkawinan</label>
                    <div class="col-sm-6 <?php if(form_error('status_perkawinan') != ""): ?> has-error has-feedback <?php endif; ?>">
                      <select id="form-control-6" class="form-control" name="status_perkawinan">
                        <option value="">Pilih Status Perkawinan</option>
                        <?php
                            foreach(get_status_perkawinan() as $key => $value)
                            {
                              $selected = (set_value('status_perkawinan') == $key) ? 'selected' : '';
                              echo '<option value='.$key.' '.$selected.'>'.$value.'</option>';
                            }
                        ?>
                      </select>
                      <?php if(form_error('status_perkawinan') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('status_perkawinan','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-6">Agama</label>
                    <div class="col-sm-6 <?php if(form_error('agama') != ""): ?> has-error has-feedback <?php endif; ?>">
                      <select id="form-control-6" class="form-control" name="agama">
                        <option value="">Pilih Agama</option>
                        <?php
                            foreach(get_agama() as $key => $value)
                            {
                              $selected = (set_value('agama') == $key) ? 'selected' : '';
                              echo '<option value='.$key.' '.$selected.'>'.$value.'</option>';
                            }
                        ?>
                      </select>
                      <?php if(form_error('agama') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('agama','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Email</label>
                    <div class="col-sm-4 <?php if(form_error('email') != ""): ?> has-error has-feedback <?php endif; ?>">
                        <input id="form-control-1" class="form-control" type="email" name="email" value="<?php echo set_value('email'); ?>">
                        <?php if(form_error('email') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('email','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">No Telepon</label>
                    <div class="col-sm-4 <?php if(form_error('telepon') != ""): ?> has-error has-feedback <?php endif; ?>">
                        <input id="form-control-1" class="form-control" type="text" name="telepon" value="<?php echo set_value('telepon'); ?>"> 
                        <?php if(form_error('telepon') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('telepon','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Tanggal Gabung</label>
                    <div class="col-sm-4 <?php if(form_error('tanggal_gabung') != ""): ?> has-error has-feedback <?php endif; ?>">
                        <input id="form-control-1" class="form-control" type="date" name="tanggal_gabung" value="<?php echo set_value('tanggal_lahir'); ?>">
                        <?php if(form_error('tanggal_gabung') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('tanggal_gabung','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-6">Jabatan</label>
                    <div class="col-sm-6 <?php if(form_error('jabatan') != ""): ?> has-error has-feedback <?php endif; ?>">
                      <select id="form-control-6" class="form-control" name="jabatan">
                        <option value="">Pilih Jabatan</option>
                        <?php
                            foreach(get_jabatan() as $key => $value)
                            {
                              $selected = (set_value('jabatan') == $key) ? 'selected' : '';
                              echo '<option value='.$key.' '.$selected.'>'.$value.'</option>';
                            }
                        ?>
                      </select>
                      <?php if(form_error('jabatan') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('jabatan','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-6">Departemen</label>
                    <div class="col-sm-6 <?php if(form_error('departemen') != ""): ?> has-error has-feedback <?php endif; ?>">
                      <select id="form-control-6" class="form-control" name="departemen">
                        <option value="">Pilih Departemen</option>
                        <?php
                            foreach(get_departemen() as $key => $value)
                            {
                              $selected = (set_value('departemen') == $key) ? 'selected' : '';
                              echo '<option value='.$key.' '.$selected.'>'.$value.'</option>';
                            }
                        ?>
                      </select>
                      <?php if(form_error('departemen') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('departemen','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-6">Pendidikan Terakhir</label>
                    <div class="col-sm-6 <?php if(form_error('pendidikan_terakhir') != ""): ?> has-error has-feedback <?php endif; ?>">
                      <select id="form-control-6" class="form-control" name="pendidikan_terakhir">
                        <option value="">Pilih Pendidikan Terakhir</option>
                        <?php
                            foreach(get_pendidikan() as $key => $value)
                            {
                              $selected = (set_value('pendidikan_terakhir') == $key) ? 'selected' : '';
                              echo '<option value='.$key.' '.$selected.'>'.$value.'</option>';
                            }
                        ?>
                      </select>
                      <?php if(form_error('pendidikan_terakhir') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('pendidikan_terakhir','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">No Rekening</label>
                    <div class="col-sm-6 <?php if(form_error('no_rek') != ""): ?> has-error has-feedback <?php endif; ?>">
                        <input id="form-control-1" class="form-control" type="text" name="no_rek" value="<?php echo set_value('no_rek'); ?> ">
                        <?php if(form_error('no_rek') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('no_rek','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Bank</label>
                    <div class="col-sm-6 <?php if(form_error('bank') != ""): ?> has-error has-feedback <?php endif; ?>">
                        <input id="form-control-1" class="form-control" type="text" name="bank" value="<?php echo set_value('bank'); ?> ">
                        <?php if(form_error('bank') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('bank','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Nama Rekening</label>
                    <div class="col-sm-6 <?php if(form_error('nama_rekening') != ""): ?> has-error has-feedback <?php endif; ?>">
                        <input id="form-control-1" class="form-control" type="text" name="nama_rekening" value="<?php echo set_value('nama_rekening'); ?> ">
                        <?php if(form_error('nama_rekening') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('nama_rekening','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-9">Foto</label>
                    <div class="col-sm-9">
                      <input id="form-control-9" type="file" accept="image/*" name="foto">
                      <p class="help-block">
                        <small>Type: png gif jpg jpeg, max size: 2mb</small>
                      </p>
                      <?php if($error_foto != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo '<p class="help-block">'.$error_foto.'</p>'; ?>
                        <?php endif; ?>
                    </div>

                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-6">Hak Akses</label>
                    <div class="col-sm-6 <?php if(form_error('hak_akses') != ""): ?> has-error has-feedback <?php endif; ?>">
                      <select id="form-control-6" class="form-control" name="hak_akses">
                        <option value="">Pilih Hak Akses</option>
                        <?php
                            foreach(get_type_user() as $key => $value)
                            {
                              $selected = (set_value('hak_akses') == $key) ? 'selected' : '';
                              echo '<option value='.$key.' '.$selected.'>'.$value.'</option>';
                            }
                        ?>
                      </select>
                      <?php if(form_error('hak_akses') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('hak_akses','<p class="help-block">','</p>'); ?>
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
</div>
