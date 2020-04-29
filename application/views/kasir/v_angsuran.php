<!DOCTYPE html>
<html lang="en">

<head>

<?php 
        $this->load->view('template/header');
   ?> 

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
	<link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
   <?php 
        $this->load->view('admin/menu');
   ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data
                    <small>Angsuran</small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">

            <div class="col-lg-12">
            <div class="form-group">
  <select id="status" class="form-control" onchange="myFunction()">
    <option>-- Pilih Status Kredit --</option>
    <option>Lunas</option>
    <option>Belum Lunas</option>
  </select>
</div>
            <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <!-- <th>Foto KTP</th> -->
                        <th>NIK</th>
                        <th>Nama Pelanggan</th>
                        <th>No. WA</th>
                        <th>Nomor Faktur</th>
                        <th>Tanggal Kredit</th>
                        <th>Harga</th>
                        <th>Uang Muka</th>
                        <th>Sisa Lama Angsuran</th>
                        <th>Angsuran Perbulan</th>
                        <!-- <th>Total Angsuran</th> -->
                        <th>Sisa Angsuran </th>
                        <th>Jatuh Tempo</th>
                        <th>Aksi </th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $kode=$a['kk'];
                        $nik=$a['nik'];
                        $nm=$a['nama_pelanggan'];
                        $foto=$a['foto_ktp'];
                        $wa=$a['No_wa_hp'];
                        $faktur=$a['nofak_jual'];
                        $harga=$a['jual_total'];
                        $tgl_kredit=$a['jual_tanggal'];
                        $dp=$a['uang_muka'];
                        // $sum=$a['sum'];
                        $tempo=date('d F Y', strtotime($a['jatuh_tempo']));
                        $sisa=$a['sisa'];
                        $perbulan=$a['perbulan'];
                        $lama=$a['lama_angsuran']-$a['count'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <!-- <td><img src="<?php echo base_url().'assets/foto_ktp/'.$foto?>" alt="foto_ktp" height=55 width=100></img></td> -->
                        <td><?php echo $nik;?></td>
                        <td><?php echo $nm;?></td>
                        <td><?php echo $wa;?></td>
                        <td><?php echo $faktur;?></td>
                        <td><?php echo $tgl_kredit;?></td>
                        <td style="text-align:right;"><?php echo 'Rp '.number_format($harga);?></td>
                        <td style="text-align:right;"><?php echo 'Rp '.number_format($dp);?></td>
                        <td style="text-align:center;"><?php echo $lama;?></td>
                        <td style="text-align:right;"><?php echo 'Rp '.number_format($perbulan);?></td>
                        <!-- <td style="text-align:right;"><?php echo 'Rp '.number_format($sum);?></td> -->
                        <td style="text-align:right;"><?php echo 'Rp '.number_format($sisa);?></td>
                        <td style="text-align:center;"><?php echo $tempo;?></td>
                        <td style="text-align:center;">
                        <a class="btn btn-xs btn-success" href="#modalEdit<?php echo $kode?>" data-toggle="modal" title="LUNAS"><span class="fa fa-edit"></span> Ubah No. WA</a>
                        <br><br>
                        <a class="btn btn-xs btn-danger" href="<?php echo base_url().'assets/foto_ktp/'.$foto?>" data-toggle="modal" title="Lihat" target="_blank"><span class="fa fa-image" ></span> Lihat Foto KTP</a>
                        <br><br><?php if ( $sisa==0){?>
                            <a class="btn btn-xs btn-success" href="<?php echo base_url().'kasir/angsuran/cetak_lunas/'.$kode; ?>" data-toggle="modal" title="LUNAS" ><span class="fa fa-check"></span> LUNAS</a>
                        <?php }else{ ?>
                            <a class="btn btn-xs btn-warning" href="<?php echo base_url().'kasir/angsuran/bayar_angsuran/'.$kode; ?>" data-toggle="modal" title="Ubah"><span class="fa fa-google-wallet"></span> Bayar Angsuran</a>
                        <?php } ?>

                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.row -->
      <!-- ============ MODAL EDIT =============== -->
      <?php
                     foreach ($data->result_array() as $a):
                        $no++;
                        $kode=$a['kk'];
                        $nm=$a['nama_pelanggan'];
                        $wa=$a['No_wa_hp'];
                    ?>
                <div id="modalEdit<?php echo $kode?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Ubah Setting</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'kasir/angsuran/edit_data'?>">
                        <div class="modal-body">
                            <input name="kode" type="hidden" value="<?php echo $kode;?>">
                        </div>
                    

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Pelanggan</label>
                        <div class="col-xs-9"><br>
                        <input readonly name="wa" class="form-control" type="text" value="<?php echo $nm;?>" placeholder="Nomor Whatsapp Pelanggan..." style="width:280px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nomor WA</label>
                        <div class="col-xs-9">
                            <input name="wa" class="form-control" type="text" value="<?php echo $wa;?>" placeholder="Nomor Whatsapp Pelanggan..." style="width:280px;" required>
                        </div>
                    </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-info">Ubah</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        endforeach;
        ?>
      

        <!--END MODAL-->

        <hr>

        <?php 
        $this->load->view('template/footer');
   ?> 

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/dist/js/bootstrap-select.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.harpok').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('.harjul').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
        });

        $('select').on('change', function() {
            if (this.value=="Lunas"){
                window.location.href = "<?php echo base_url().'kasir/angsuran?status=1'?>";
            }else if (this.value=="Belum Lunas"){
                window.location.href = "<?php echo base_url().'kasir/angsuran?status=2'?>";
            }else{
                window.location.href = "<?php echo base_url().'kasir/angsuran'?>";
            }
});
    </script>
    
</body>

</html>
