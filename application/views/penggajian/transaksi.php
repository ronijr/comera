<div class="layout-content-body">
    <div class="title-bar">
        <h1 class="title-bar-title">
            <span class="d-ib">Transaksi Penggajian</span>
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
    <?php if(!empty($this->session->flashdata('success'))): ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button>
            <span class="icon icon-check icon-lg"></span>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
    <div class="row">
        <div class="col-xs-12">
            <div class="col-sm-9 col-sm-offset-3 col-md-8 col-md-offset-4">
                <div class="demo-form-wrapper">
                    <form class="form form-inline" method="GET" action="<?php echo base_url('penggajian/transaksi'); ?>">
                        <div class="form-group">
                            <select name="tahun" class="form-control">
                                <option value="">Pilih Tahun</option>
                                <?php foreach(get_tahun() as $key => $value): ?>
                                    <?php
                                        $val = (!empty($tahun)) ? $tahun : date('Y');
                                        $selected = ($key == $val) ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $key;?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="bulan" class="form-control">
                                <option value="">Pilih Bulan</option>
                                <?php foreach(get_bulan() as $key => $value): ?>
                                    <?php
                                          $val = (!empty($bulan)) ? $bulan : date('m');
                                          $selected = ($key == $val) ? 'selected' : '';
                                    ?>
                                    <option value="<?php echo $key;?>" <?php echo $selected; ?>><?php echo $value; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </form>
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
                            <th></th>
                            <th>Nama</th>
                            <th>Periode</th>
                            <th>Kehadiran</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan</th>
                            <th>Lemburan</th>
                            <th>Potongan</th>
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
                                            <span class="icon-child bg-warning circle sq-12"></span>
                                        </span>
                                    </td>
                                    <td>
                                        <strong><?php echo $row->kry_no; ?></strong>
                                        <br><?php echo $row->kry_nama;?> 
                                        <br><?php echo $row->kry_jabatan.'/'.$row->kry_dept_nama;?>
                                    </td>
                                    <td><?php echo date('F, Y',strtotime($tahun.'-'.$bulan.'-01')); ?> </td>
                                    <td>
                                        <span class="label  label-success">Hadir <?php echo $row->hadir; ?></span>
                                        <span class="label label-default">Sakit <?php echo $row->sakit; ?></span>
                                        <span class="label label-info">Ijin <?php echo $row->ijin; ?></span>
                                        <span class="label label-danger">Alpa <?php echo $row->alpa; ?></span>
                                        <span class="label label-warning">Cuti <?php echo $row->cuti; ?></span>
                                    </td>
                                    <td>Rp<?php echo number_format($row->gaji_pokok); ?></td>
                                    <td>Rp<?php echo number_format($row->tunjangan); ?></td>
                                    <td>Rp<?php echo number_format($this->md_penggajian->gaji_total($row->kry_no, $tahun.'-'.$bulan.'-01')->result()[0]->total_lemburan); ?></td>
                                    <td>Rp<?php echo number_format($row->potongan); ?></td>
                                    <td>Rp<?php echo number_format($this->md_penggajian->gaji_total($row->kry_no, $tahun.'-'.$bulan.'-01')->result()[0]->gaji_total )  ; ?></td>
                                    <td>
                                        <?php if($row->txp_status == 'Y'): ?>
                                         <span class="label label-success label-pill">Sudah Dibayar</span>
                                        <?php else: ?>
                                            <span class="label label-danger label-pill">Belum Dibayar</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                    <?php if($row->txp_status == 'Y'): ?>
                                        <a href="<?php echo base_url('penggajian/transaksi_create?userid='.$row->kry_no.'&txpid='.$row->txp_id.'&tahun='.$tahun.'&bulan='.$bulan.''); ?>"  class="btn btn-sm btn-labeled arrow-right arrow-success"><span class="btn-label">
                                        <span class="icon icon-money icon-lg icon-fw"></span>
                                        </span>Lihat</a>
                                    <?php else: ?>
                                        <a href="<?php echo base_url('penggajian/transaksi_create?userid='.$row->kry_no.'&txpid='.$row->txp_id.'&tahun='.$tahun.'&bulan='.$bulan.''); ?>"  class="btn btn-sm btn-labeled arrow-right arrow-success"><span class="btn-label">
                                        <span class="icon icon-money icon-lg icon-fw"></span>
                                        </span>
                                        <?php if($this->session->userdata('data_user')[0]->usr_type == 'karyawan'): ?>
                                            Lihat
                                        <?php else: ?>
                                            Bayar
                                        <?php endif; ?>
                                    </a>
                                    <?php endif; ?>
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