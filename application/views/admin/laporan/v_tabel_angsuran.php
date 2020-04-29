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
                    <small>Data Angsuran <?= $bulan ?></small>
                    <div class="pull-right"><a href="lap_angsuran/<?= $bulan?>" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Cetak</a></div>
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
                        <th>Kode Kredit</th>
                        <th>Tanggal Kredit</th>
                        <th>Nama Pelanggan</th>
                        <th>No WA/HP</th>
                        <th>Harga</th>
                        <th>Uang Muka</th>
                        <th>Tanggal Angsuran</th>
                        <th>Angsuran Ke-</th>
                        <th>Pembayaran Angsuran</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $i):
                        $no++;
                        $nofak=$i['nofak_jual'];
                        $kode=$i['kode_kredit'];
                        $tgl=$i['jual_tanggal'];
                        $nama_pelanggan=$i['nama_pelanggan'];
                        $no_wa_hp=$i['No_wa_hp'];
                        $tanggal_angsuran=$i['tanggal_angsuran'];
                        $angsuran_ke=$i['angsuran_ke'];
                        $pembayaran=$i['perbulan'];
                        $harga=$i['jual_total'];
                        $dp=$i['uang_muka'];
                ?>
                    <tr>
                    <td style="text-align:center;"><?php echo $no;?></td>
                    <td style="padding-left:5px;"><?php echo $nofak;?></td>
                    <td style="padding-left:5px;"><?php echo $kode;?></td>
                    <td style="text-align:center;"><?php echo $tgl;?></td>
                    <td style="text-align:left;"><?php echo $nama_pelanggan;?></td>
                    <td style="text-align:left;"><?php echo $no_wa_hp;?></td>
                    <td style="text-align:right;"><?php echo 'Rp '.number_format($harga);?></td>
                    <td style="text-align:right;"><?php echo 'Rp '.number_format($dp);?></td>
                    <td style="text-align:left;"><?php echo $tanggal_angsuran;?></td>
                    <td style="text-align:left;"><?php echo $angsuran_ke;?></td>
                    <td style="text-align:right;"><?php echo 'Rp '.number_format($pembayaran);?></td>
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
