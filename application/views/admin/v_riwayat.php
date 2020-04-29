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

</head>

<body>

    <!-- Navigation -->
   <?php 
        $this->load->view('admin/menu');
   ?>

    <!-- Page Content -->
    <div class="container">
    <?php $h=$this->session->userdata('akses'); ?>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
            <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Data
                    <small>Riwayat Perpesan</small>
                    <?php if($h=='1'){ ?> 
                    <div class="pull-right"><a href="https://panel.rapiwha.com/page_addons_my_messages.php?channels%5B%5D=6281254738486&messagetype=BOTH&number=&limit=100&button=1" class="btn btn-sm btn-success" target="_blank"><span class="fa fa-check"></span> Cek Status</a></div>
                    <?php } ?> 

                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <?php if($h=='1'){ ?> 
            <div class="alert alert-warning" role="alert">
              <b>  Info : </b> Untuk pesan yang gagal terkirim, silahkan cek nomor tujuan dan lakukan kirim pesan secara manual.
            </div>
            <?php } ?> 
            <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Kode Kredit</th>
                        <th>Nama</th>
                        <th>No. WA HP</th>
                        <th>Tanggal Jatuh Tempo</th>
                        <th>Sisa Angsuran</th>
                        <th>Waktu Pengiriman Pesan</th>
                        <th>Status</th>
                        <?php if($h=='1'){ ?>  <th>Aksi</th> <?php } ?> 
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id=$a['id'];
                        $kode=$a['kode_kredit'];
                        $nm=$a['nama_pelanggan'];
                        $wa=$a['No_wa_hp'];
                        $tgl=$a['jatuh_tempo'];
                        $sisa=$a['sisa'];
                        $waktu=$a['tanggal_terkirim'];
                        $status=$a['status_pesan'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $kode;?></td>
                        <td><?php echo $nm;?></td>
                        <td><?php echo $wa;?></td>
                        <td><?php echo $tgl;?></td>
                        <td><?php echo 'Rp '.number_format($sisa);?></td>
                        <td><?php echo $waktu;?></td>
                        <td><?php echo $status;?></td>
                        <?php if($h=='1'){ ?> <td>
                            <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $id?>" data-toggle="modal" title="Ubah Status"><span class="fa fa-edit"></span> Ubah Status</a>
                            </td>
                        <?php } ?> 
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============ MODAL EDIT =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['id'];
                        $kode=$a['kode_kredit'];
                        $status=$a['status_pesan'];
                    ?>
                <div id="modalEdit<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Status</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/riwayat/edit_status'?>">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Kredit</label>
                            <div class="col-xs-9">
                                <input name="kobar" class="form-control" type="text" value="<?php echo $kode;?>" readonly>                              
                                <input type="hidden" name="id" class="form-control" type="text" value="<?php echo $id;?>" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Status</label>
                            <div class="col-xs-9">
                                <select name="status" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Status" data-width="80%" placeholder="Pilih Kategori" required>
                                    <option value='diproses' <?= $status=='diproses'? 'selected' : '' ?>>Diproses</option>
                                    <option value='terkirim' <?= $status=='terkirim'? 'selected' : '' ?>>Terkirim</option>
                                    <option value='gagal' <?= $status=='gagal'? 'selected' : '' ?>>Gagal</option>
                                </select>
                            </div>
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
        }
        ?>

        <hr>

        <?php 
        $this->load->view('template/footer');
   ?> 

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/dataTables.bootstrap.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/jquery.dataTables.min.js'?>"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    
</body>

</html>
