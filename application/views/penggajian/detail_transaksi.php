<div class="layout-content-body">
		<div class="title-bar">
			<div class="title-bar-actions">
					<a href="<?php echo base_url('penggajian/transaksi'); ?>" class="btn btn-default">Kembali</a>
  		</div>
			<h1 class="title-bar-title">
				<span class="d-ib">Pembayaran Gaji Karyawan/Periode <?php echo date('F, Y',strtotime($tahun.'-'.$bulan.'-01')); ?></span>
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
      <div class="col-md-3">
        <div class="card">
            <div class="card-body">
            <img class="circle" width="200" height="200" src="<?php echo ($karyawan[0]->kry_image != "") ?  base_url(''.$karyawan[0]->kry_image.'') : base_url('assets/img/noimage-user.jpeg'); ?>" >
            </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-body">
          <div class="demo-form-wrapper">
              <br/><br/>
              <?php
                $attributes = array(
                  'class'       => 'form form-horizontal',
                  'enctype'     =>'multipart/form-data'
                );
                echo form_open('penggajian/doupdate', $attributes);
              ?>
                <input type="hidden" value="<?php echo $karyawan[0]->pg_id; ?>" name="pg_id">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">User ID</label>
                    <div class="col-sm-3  <?php if(form_error('user_id') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input readonly id="form-control-1" class="form-control" type="text" value="<?php echo $karyawan[0]->kry_no; ?>" name="userid">
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
                        <input id="form-control-1" class="form-control" readonly type="text" value="<?php echo (!empty($karyawan)) ? $karyawan[0]->kry_nama : set_value('name'); ?>" name="name">
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
                        <input id="form-control-1" class="form-control" readonly type="text" value="<?php echo (!empty($karyawan)) ? $karyawan[0]->kry_jabatan : set_value('jabatan'); ?>" name="jabatan">
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
                        <input id="form-control-1" class="form-control" readonly type="text" value="<?php echo (!empty($karyawan)) ? $karyawan[0]->kry_dept_nama : set_value('departemen'); ?>" name="departemen">
                        <?php if(form_error('departemen') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('departemen','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Gaji Pokok</label>
                    <div class="col-sm-6  <?php if(form_error('gaji_pokok') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control"   readonly type="text" value="<?php echo (set_value('gaji_pokok') == "") ? $karyawan[0]->pg_gaji_pokok : set_value('gaji_pokok'); ?>" name="gaji_pokok">
                        <?php if(form_error('gaji_pokok') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('gaji_pokok','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-6">Tunjangan</label>
                    <div class="col-sm-7">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th style="width:180px;">Nama</th>
                                    <th>Nilai</th>
                                </tr>
                             </thead>
                             <tbody id="tunjangan_list">
                                <?php foreach($tunjangans as $row): ?>
                                    <tr class="row-<?php echo $row->txt_id; ?>">
                                        <td><?php echo $row->tj_nama; ?> </td>
                                        <td>Rp<?php echo number_format($row->tj_nilai);?> </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-6">Lemburan</label>
                    <div class="col-sm-7">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th style="width:180px;">Nama</th>
                                    <th>Nilai</th>
                                </tr>
                             </thead>
                             <tbody id="tunjangan_list">
                                <?php foreach($tunjangans as $row): ?>
                                    <tr class="row-<?php echo $row->txt_id; ?>">
                                        <td><?php echo $row->tj_nama; ?> </td>
                                        <td>Rp<?php echo number_format($row->tj_nilai);?> </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-6">Potongan</label>
                    <div class="col-sm-7">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <th style="width:180px;">Nama</th>
                                    <th>Nilai</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th style="width:50px;">Action</th>
                                </tr>
                             </thead>
                             <tbody id="tunjangan_list">
                                <?php foreach($potongans as $row): ?>
                                    <tr class="row-<?php echo $row->txt_id; ?>">
                                        <td><?php echo $row->tp_nama; ?> </td>
                                        <td>Rp<?php echo number_format($row->tp_nilai);?> </td>
                                        <td><?php echo $row->tp_qty; ?></td>
                                        <td><?php echo $row->tp_qty; ?></td>
                                        <td><a href="#" class="btn btn-sm btn-danger" onclick="delete_data('<?php echo $row->txt_id ?>', '<?php echo base_url('penggajian/potongan_delete'); ?>')">Hapus</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-2">
                        <button  type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal">Tambah Potongan</button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Gaji Total</label>
                    <div class="col-sm-6  <?php if(form_error('gaji_total') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control"  type="text" readonly value="Rp<?php echo number_format($gaji_total[0]->gaji_total); ?>" name="gaji_total">
                        <?php if(form_error('gaji_total') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('gaji_total','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Tanggal Bayar</label>
                    <div class="col-sm-4 <?php if(form_error('tanggal_bayar') != ""): ?> has-error has-feedback <?php endif; ?>">
                        <input id="form-control-1" class="form-control" type="date" name="tanggal_bayar" value="<?php echo set_value('tanggal_bayar'); ?>">
                        <?php if(form_error('tanggal_bayar') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('tanggal_bayar','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-6">Periode</label>
                    <div class="col-sm-3 <?php if(form_error('tahun') != ""): ?> has-error has-feedback <?php endif; ?>">
                      <select id="form-control-6" class="form-control" name="tahun">
                        <option value="">Pilih Tahun</option>
                        <?php
                            foreach(get_tahun() as $key => $value)
                            {
                              $val = (set_value('tahun') == '' ) ? $karyawan[0]->pg_status : set_value('tahun'); 
                              $selected = ($val == $key) ? 'selected' : '';
                              echo '<option value='.$key.' '.$selected.'>'.$value.'</option>';
                            }
                        ?>
                      </select>
                      <?php if(form_error('tahun') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('tahun','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-3 <?php if(form_error('bulan') != ""): ?> has-error has-feedback <?php endif; ?>">
                      <select id="form-control-6" class="form-control" name="bulan">
                        <option value="">Pilih Bulan</option>
                        <?php
                            foreach(get_bulan() as $key => $value)
                            {
                              $val = (set_value('bulan') == '' ) ? $karyawan[0]->pg_status : set_value('bulan'); 
                              $selected = ($val == $key) ? 'selected' : '';
                              echo '<option value='.$key.' '.$selected.'>'.$value.'</option>';
                            }
                        ?>
                      </select>
                      <?php if(form_error('bulan') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('bulan','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-6">Status</label>
                    <div class="col-sm-6 <?php if(form_error('status') != ""): ?> has-error has-feedback <?php endif; ?>">
                      <select id="form-control-6" class="form-control" name="status">
                        <option value="">Pilih Status</option>
                        <?php
                            foreach(get_type_status_bayar() as $key => $value)
                            {
                              $val = (set_value('status') == '' ) ? $karyawan[0]->pg_status : set_value('status'); 
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
                    <label class="col-sm-2 control-label" for="form-control-6">&nbsp;</label>
                    <div class="col-sm-4">
                                 <button class="btn btn-primary" type="submit" style="margin-right:10px;">Simpan</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
          </div> <!-- !. card body -->
        </div> <!-- !. card -->
      </div>
    </div>
</div>

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tunjangan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <?php
                $attributes = array(
                  'class'       => 'form form-horizontal',
                  'enctype'     =>'multipart/form-data'
                );
                echo form_open('penggajian/transaksi_docreate', $attributes);
              ?>
               <div class="form-group">
                    <input type="hidden" value="<?php echo $karyawan[0]->kry_no;?>"  name="kry_no">
                    <input type="hidden" value="<?php echo $karyawan[0]->kry_nama;?>"  name="kry_nama">
                    <label class="col-sm-2 control-label" for="form-control-6">Nama</label>
                    <div class="col-sm-6 <?php if(form_error('potongan') != ""): ?> has-error has-feedback <?php endif; ?>">
                      <select id="form-control-6" class="form-control potongan-change" name="potongan" required>
                        <option value="">Pilih Potongan</option>
                        <?php
                            foreach($potongan as $row)
                            {
                              $selected = (set_value('potongan') == $row->tp_id) ? 'selected' : '';
                              echo '<option value="'.$row->tp_id.'|'.$row->tp_nilai.'" '.$selected.'>'.$row->tp_nama.'</option>';
                            }
                        ?>
                      </select>
                      <?php if(form_error('potongan') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('potongan','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Nilai</label>
                    <div class="col-sm-6  <?php if(form_error('nilai') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" readonly type="text" value="0" name="nilai">
                        <?php if(form_error('nilai') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('nilai','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="form-control-1">Jumlah</label>
                    <div class="col-sm-6  <?php if(form_error('jumlah') != ""): ?> has-error has-feedback <?php endif; ?>" >
                        <input id="form-control-1" class="form-control" required type="number" value="1" name="jumlah">
                        <?php if(form_error('jumlah') != ""): ?>
                        <span class="form-control-feedback" aria-hidden="true">
                            <span class="icon icon-times"></span>
                        </span>
                        <?php echo form_error('jumlah','<p class="help-block">','</p>'); ?>
                        <?php endif; ?>
                    </div>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
