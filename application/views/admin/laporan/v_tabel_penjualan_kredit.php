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
                <h1 class="page-header">Laporan
                    <small>Data Penjualan Kredit <?= $bulan ?></small>
                    <div class="pull-right"><a href="lap_data_penjualan_kredit/<?= $bulan ?>" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Cetak</a></div>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>No Faktur</th>
                        <th>Tanggal</th>
                        <!-- <th>Kode Barang</th>
                        <th>Nama Barang</th> -->
                        <th>Nama Pelanggan</th>
                        <th>Nomor WA/HP</th>
                        <th>Uang Muka</th>
                        <th>Lama Angsuran</th>
                        <th>Sisa Angsuran</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $i):
                        $no++;
                        $nofak=$i['jual_nofak'];
                        $tgl=$i['jual_tanggal'];
                        // $barang_id=$i['d_jual_barang_id'];
                        // $barang_nama=$i['d_jual_barang_nama'];
                        $nama_pelanggan=$i['nama_pelanggan'];
                        $no_wa=$i['No_wa_hp'];
                        $dp=$i['uang_muka'];
                        $lama=$i['lama_angsuran'];
                        $sisa=$i['sisa'];
                        $status=$i['status'];
                ?>
                    <tr>
                    <td style="text-align:center;"><?php echo $no;?></td>
        <td style="padding-left:5px;"><?php echo $nofak;?></td>
        <td style="text-align:center;"><?php echo $tgl;?></td>
        <td style="text-align:left;"><?php echo $nama_pelanggan;?></td>
        <td style="text-align:left;"><?php echo $no_wa;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($dp);?></td>
        <td style="text-align:center;"><?php echo $lama;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($sisa);?></td>
        <td style="text-align:center;"><?php echo $status=='0' ? 'Belum Lunas' : 'Lunas';?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.row -->


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
    </script>
    
</body>

</html>
