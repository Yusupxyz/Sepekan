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
            <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>Kode Kredit</th>
                        <th>Nama Pelanggan</th>
                        <th>No. WA</th>
                        <th>Nomor Faktur</th>
                        <th>Tanggal Kredit</th>
                        <th>Harga</th>
                        <th>Uang Muka</th>
                        <th>Sisa Lama Angsuran</th>
                        <th>Angsuran Perbulan</th>
                        <th>Sisa Angsuran </th>
                        <th>Jatuh Tempo</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $kode=$a['kk'];
                        $nm=$a['nama_pelanggan'];
                        $wa=$a['No_wa_hp'];
                        $faktur=$a['nofak_jual'];
                        $tgl_kredit=$a['jual_tanggal'];
                        $harga=$a['jual_total'];
                        $dp=$a['uang_muka'];
                        // $sum=$a['sum'];
                        $perbulan=$a['perbulan'];
                        $tempo=date('d F Y', strtotime($a['jatuh_tempo']));
                        $sisa=$a['sisa'];
                        $lama=$a['lama_angsuran']-$a['count'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $kode;?></td>
                        <td><?php echo $nm;?></td>
                        <td><?php echo $wa;?></td>
                        <td><?php echo $faktur;?></td>
                        <td><?php echo $tgl_kredit;?></td>
                        <td style="text-align:right;"><?php echo 'Rp '.number_format($harga);?></td>
                        <td style="text-align:right;"><?php echo 'Rp '.number_format($dp);?></td>
                        <td style="text-align:center;"><?php echo $lama;?></td>
                        <td style="text-align:right;"><?php echo 'Rp '.number_format($perbulan);?></td>
                        <td style="text-align:right;"><?php echo 'Rp '.number_format($sisa);?></td>
                        <td style="text-align:center;"><?php echo $tempo;?></td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.row -->
    
      

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
    </script>
    
</body>

</html>
