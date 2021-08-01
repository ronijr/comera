<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#2c3e50">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/vendor.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/elephant.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/application.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/demo.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert/sweetalert.css">

  </head>
  <body class="layout">
    <div class="layout-header">
        {header}
    </div>
    <div class="layout-main">
        {sidebar}
      <div class="layout-content">
        {content}
      </div>
      <div class="layout-footer">
       {footer}
      </div>
    </div>

   
    <script src="<?php echo base_url(); ?>/assets/js/vendor.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/elephant.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/application.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/demo.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/plugins/sweetalert/sweetalert-dev.js"></script>
    <script>
        function delete_data(id, url)
        {
          swal({
            title: "Konfirmasi Hapus",
            text: "Yakin akan menghapus data ini?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#27ae60',
            // cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            showLoaderOnConfirm: true,
            allowOutsideClick: false,
            closeOnConfirm: false
          },
          function(isConfirm){
            if (isConfirm) {
              $.ajax({
                url: url,
                data: {id: id},
                type: 'POST',
                dataType: 'json',
                beforeSend: function(){
                  swal('Loading', 'Sedang menghapus data . . .', 'info');
                },
                success: function(res){
                  if (res.result == 'success') {
                    swal({
                      title: "Sukses!",
                      text: res.msg,
                      type: 'success',
                      confirmButtonColor: '#27ae60',
                      allowOutsideClick: false,
                    },
                    function(result){
                      $('.row-'+id).fadeOut('slow');
                    });
                  } else if(res.result == "success_load") {
                    swal({
                      title: "Sukses!",
                      text: res.msg,
                      type: 'success',
                      confirmButtonColor: '#27ae60',
                      allowOutsideClick: false,
                    },
                    function(result){
                       location.reload();
                    });
                  } else  {
                    swal('Error!', res.msg, 'error');
                  }
                },
                error: function(){
                  swal("Oops", "We couldn't connect to the server!", "error");
                }
              });
            }
          });
        }
      
        function approve()
        {
          swal({
            title: "Konfirmasi",
            text: "Apakah anda yakin untuk menyetujui gaji karyawan ini ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#27ae60',
            // cancelButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak',
            showLoaderOnConfirm: true,
            allowOutsideClick: false,
            closeOnConfirm: false
          },
          function(isConfirm){
            if (isConfirm) {
              $.ajax({
                url: url,
                data: {id: id},
                type: 'POST',
                dataType: 'json',
                beforeSend: function(){
                  swal('Loading', 'Sedang menghapus data . . .', 'info');
                },
                success: function(res){
                  if (res.result == 'success') {
                    swal({
                      title: "Sukses!",
                      text: res.msg,
                      type: 'success',
                      confirmButtonColor: '#27ae60',
                      allowOutsideClick: false,
                    },
                    function(result){
                      $('.row-'+id).fadeOut('slow');
                    });
                  } else if(res.result == "success_load") {
                    swal({
                      title: "Sukses!",
                      text: res.msg,
                      type: 'success',
                      confirmButtonColor: '#27ae60',
                      allowOutsideClick: false,
                    },
                    function(result){
                       location.reload();
                    });
                  } else  {
                    swal('Error!', res.msg, 'error');
                  }
                },
                error: function(){
                  swal("Oops", "We couldn't connect to the server!", "error");
                }
              });
            }
          });
        }
    </script>
    <script>
      $(".btn-find").click(function(){
          var type = $(this).attr('key');
          if(type == "pinjaman")
          {
            location.href =" <?php echo base_url('pinjaman/create?userid=') ?>"+$("input[name='user_id']").val();
          } else if(type == "lemburan"){
            location.href =" <?php echo base_url('lemburan/create?userid=') ?>"+$("input[name='user_id']").val();
          } else 
          {
            location.href =" <?php echo base_url('absensi/create?userid=') ?>"+$("input[name='user_id']").val();
          }
      });

      $("input[name='nilai_lembur']").keyup(function(){
          var qty = $(this).attr('key');
          var jumlah = parseInt($(this).val()) * parseInt(qty);
          if(isNaN(jumlah))
          {
            jumlah = 0;
          }
          $("input[name='nilai_total_lembur']").val(jumlah);

      });
    </script>

    <script>
        function add_tunjangan()
        {
            $.ajax({
              url:"<?php echo base_url('penggajian/tunjangan/admin'); ?>",
              type:"POST",
              success:function(res)
              {
                  var row = '<tr>';
                  row +='<td>';
                  row += '<select name="tunjangan[]" class="form-control" onchange="get_nilai_tunjangan($(this))">';
                  row += '<option value="">Pilih Tunjangan</option>';
                  res.data.forEach(function(value, index){
                    row += '<option value="'+value.tj_code+'|'+value.tj_harga+'" >'+value.tj_nama+'</option>';
                  });
                  row += '</select>';
                  row += '</td>';
                  row +='<td id="tunjangan-nilai-'+value.tj_code+'">Rp0</td>';
                  row +='<td><button class="btn btn-sm btn-danger">Hapus</button></td>';
                  row += '</tr>';

                  $("#tunjangan_list").append(row);
                 
                }
            });

           
        }
        $(".tunjangan-change").change(function(){
            var data = $(this).val().split('|');
            $("input[name='nilai']").val(data[1]);
        });
        $(".potongan-change").change(function(){
            var data = $(this).val().split('|');
            $("input[name='nilai']").val(data[1]);
        });
        
        
    </script>
  </body>
</html>