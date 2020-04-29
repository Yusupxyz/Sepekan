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

      <style type="text/css">
      .bg {
           width: 100%;
           height: 100%;
           position: fixed;
           z-index: -1;
           float: left;
           left: 0;
           margin-top: -20px;
      }
      </style>
</head>

<body>
<img src="<?php echo base_url().'assets/img/anthony-delanoix-aRaY_Cuq3lk-unsplash.jpg'?>" alt="gambar" class="bg" />
    <!-- Navigation -->
   <?php 
        $this->load->view('admin/menu');
   ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="color:#8a0740;">SELAMAT DATANG
                    <small style="color:#2c5861;"><b><?php echo $this->session->userdata('nama');?> (<?php echo $this->session->userdata('username');?>) </b> di CV. ENAM BERSAUDARA</small>
                    <img src="<?php echo base_url().'assets/img/logo3.png'?>" alt="Logo" height="42" width="42">

                </h1>
            </div>
        </div>

<?php if ($this->session->userdata('akses')!='3'){ 
      if ($jatuh_tempo->result()!=null) { ?>
        <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          NOTIFIKASI ANGSURAN<i class="fa fa-chevron-circle-down" aria-hidden="true"></i>

        </button>
      </h2>
    </div>
    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
    <?php foreach ($jatuh_tempo->result() as $key => $value) { 
          $now = time(); // or your date as well
          $your_date = strtotime($value->jatuh_tempo);
          $datediff = $now - $your_date;
          $datediff =  round($datediff / (60 * 60 * 24));
          
          ?>
                  <div class="card-body">
                  <div  class="alert alert-warning " role="alert">
            <strong>Jatuh Tempo!</strong> Pelanggan dengan nama <b> <?= $value->nama_pelanggan; ?> </b> telah jatuh tempo selama <?= $datediff ?> hari. Terhitung dari<b> <?= $value->jatuh_tempo; ?> </b> dengan besar sisa kredit yaitu Rp <b> <?= number_format($value->sisa); ?> </b>,-.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
      </div>
    <?php } ?>
    </div>

  </div>
</div>
<?php } }?>


<?php if (($this->session->userdata('akses')=='3' || $this->session->userdata('akses')=='4') && isset($stok)) { 
      if (count($stok)!=null ) { ?>
        <div class="accordion" id="accordionExample2">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne2" aria-expanded="true" aria-controls="collapseOne">
          NOTIFIKASI BARANG <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>

        </button>
      </h2>
    </div>

            <div id="collapseOne2" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample2">
            <?php
    for ($i=0; $i < count($stok); $i++) { 
     foreach ($stok[$i] as $key => $value) {  
          ?>
                  <div class="card-body">
                  <div  class="alert alert-warning " role="alert">
            <?php if ($value->barang_stok==0){ ?>
                  <strong>Stok Barang Habis!</strong> Barang dengan kode <b> <?= $value->barang_id; ?> </b> dan  nama <b> <?= $value->barang_nama; ?> </b> telah <b> habis </b>.
            <?php } else { ?>
                  <strong>Stok Barang Sedikit!</strong> Barang dengan nama <b> <?= $value->barang_nama; ?> </b> hanya tersisa <b> <?= $value->barang_stok; ?> </b> <?= $value->nama; ?>.
            <?php } ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>
      </div>
      <?php } } ?>

    </div>
  </div>
</div>
<?php } } ?>
      

        <!-- /.row -->
	<div class="mainbody-section text-center">
     <?php $h=$this->session->userdata('akses'); ?>
     <?php $u=$this->session->userdata('user'); ?>

        <!-- Projects Row -->
        <div class="row">
            <?php if($h=='3'){ ?> 
                  <div class="col-md-3 portfolio-item">
                <div class="menu-item light-red" style="height:150px;">
                     <a href="<?php echo base_url().'gudang/suplier'?>" data-toggle="modal">
                           <i class="fa fa-users"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Suplier</p>
                      </a>
                </div> 
            </div> 
                  <div class="col-md-3 portfolio-item">
                <div class="menu-item color" style="height:150px;">
                     <a href="<?php echo base_url().'gudang/kategori'?>" data-toggle="modal">
                           <i class="fa fa-sitemap"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Kategori</p>
                      </a>
                </div> 
            </div> 
            <div class="col-md-3 portfolio-item">
                <div class="menu-item blue" style="height:150px;">
                     <a href="<?php echo base_url().'gudang/satuan'?>" data-toggle="modal">
                           <i class="fa fa-sitemap"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Satuan Barang</p>
                      </a>
                </div> 
            </div> 
               <div class="col-md-3 portfolio-item">
                <div class="menu-item purple" style="height:150px;">
                     <a href="<?php echo base_url().'gudang/barang'?>" data-toggle="modal">
                           <i class="fa fa-shopping-cart"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Stok Barang</p>
                      </a>
                </div> 
            </div>
            <div class="col-md-3 portfolio-item">
                <div class="menu-item red" style="height:150px;">
                     <a href="<?php echo base_url().'gudang/barang_masuk'?>" data-toggle="modal">
                           <i class="fa fa-cart-plus"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Barang Masuk</p>
                      </a>
                </div> 
            </div>
            <div class="col-md-3 portfolio-item">
                <div class="menu-item blue" style="height:150px;">
                     <a href="<?php echo base_url().'gudang/barang_keluar'?>" data-toggle="modal">
                           <i class="fa fa-cart-arrow-down"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Barang Keluar</p>
                      </a>
                </div> 
            </div>
                  <?php }?>

                  <?php if($h=='4'){ ?> 
                  <div class="col-md-3 portfolio-item">
                <div class="menu-item color" style="height:150px;">
                     <a href="<?php echo base_url().'admin/laporan/data_barang'?>" data-toggle="modal">
                           <i class="fa fa-sitemap"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Laporan Data Barang</p>
                      </a>
                </div> 
            </div> 

               <div class="col-md-3 portfolio-item">
                <div class="menu-item purple" style="height:150px;">
                     <a href="<?php echo base_url().'admin/laporan/data_penjualan'?>" data-toggle="modal">
                           <i class="fa fa-shopping-cart"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Laporan Penjualan Cash</p>
                      </a>
                </div> 
            </div>

            <div class="col-md-3 portfolio-item">
                <div class="menu-item red" style="height:150px;">
                     <a href="<?php echo base_url().'admin/laporan/data_penjualan_kredit'?>" data-toggle="modal">
                           <i class="fa fa-shopping-cart"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Laporan Penjualan Kredit</p>
                      </a>
                </div> 
            </div>

            <div class="col-md-3 portfolio-item">
                <div class="menu-item green" style="height:150px;">
                     <a href="<?php echo base_url().'admin/laporan/data_angsuran'?>" data-toggle="modal">
                           <i class="fa fa-shopping-cart"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Laporan Angsuran</p>
                      </a>
                </div> 
            </div>
                  <?php }?>
        </div>
        
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
        <?php if($h=='1'){ ?> 

            <div class="col-md-3 portfolio-item">
                <div class="menu-item red" style="height:150px;">
                     <a href="<?php echo base_url().'admin/pengguna'?>" data-toggle="modal">
                           <i class="fa fa-users"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Pengguna</p>
                      </a>
                </div> 
            </div>
            <div class="col-md-3 portfolio-item">
                <div class="menu-item purple" style="height:150px;">
                     <a href="<?php echo base_url().'admin/angsuran'?>" data-toggle="modal">
                           <i class="fa fa-money"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Data Angsuran</p>
                      </a>
                </div> 
            </div>
            <div class="col-md-3 portfolio-item">
                <div class="menu-item green" style="height:150px;">
                     <a href="<?php echo base_url().'admin/setting'?>" data-toggle="modal">
                           <i class="fa fa-wrench"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Setting</p>
                      </a>
                </div> 
            </div>
            <div class="col-md-3 portfolio-item">
                <div class="menu-item blue" style="height:150px;">
                     <a href="<?php echo base_url().'admin/laporan'?>" data-toggle="modal">
                           <i class="fa fa-bar-chart"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Laporan</p>
                      </a>
                </div> 
            </div>
            <?php }?>
            <?php if($h=='2'){ ?> 
                        <div class="col-md-3 portfolio-item">
                <div class="menu-item purple" style="height:150px;">
                     <a href="<?php echo base_url().'kasir/barang'?>" data-toggle="modal">
                           <i class="fa fa-shopping-cart"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Barang</p>
                      </a>
                </div> 
            </div>
            <div class="col-md-3 portfolio-item">
                <div class="menu-item blue" style="height:150px;">
                     <a href="<?php echo base_url().'kasir/data_penjualan'?>" data-toggle="modal">
                           <i class="fa fa-bar-chart"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Data Penjualan</p>
                      </a>
                </div> 
            </div>
            <div class="col-md-3 portfolio-item">
                <div class="menu-item purple" style="height:150px;">
                     <a href="<?php echo base_url().'kasir/angsuran'?>" data-toggle="modal">
                           <i class="fa fa-money"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Angsuran</p>
                      </a>
                </div> 
            </div>
            <?php }?>
            <?php if($h=='5'){ ?> 
                        <div class="col-md-3 portfolio-item">
                <div class="menu-item purple" style="height:150px;">
                     <a href="<?php echo base_url().'sales/barang'?>" data-toggle="modal">
                           <i class="fa fa-shopping-cart"></i>
                            <p style="text-align:left;font-size:14px;padding-left:5px;">Barang</p>
                      </a>
                </div> 
            </div>
            <?php }?>
        </div>
        
		
        <!-- /.row -->
	
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url().'assets/js/jquery.js'?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>

</body>

</html>
