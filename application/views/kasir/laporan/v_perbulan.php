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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">
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
                <h1 class="page-header">Data Penjualan
                    <small>Perbulan <?= $bln; ?></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
            <table class="table table-bordered table-condensed" style="font-size:12px;" id="mydata">
                <thead>
                    <tr>
                        <th style="text-align:center;width:40px;">No</th>
                        <th>No Faktur</th>
                        <th>Tanggal</th>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Satuan</th>
                        <th>Harga Jual</th>
                        <th>Qty</th>
                        <th>SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                        foreach ($data->result_array() as $i) {
                            $no++;
                            $nofak=$i['jual_nofak'];
                            $tgl=$i['jual_tanggal'];
                            $kobar=$i['d_jual_barang_id'];
                            
                            $nabar=$i['d_jual_barang_nama'];
                            $satuan=$i['d_jual_barang_satuan'];
                            
                            $harjul=$i['d_jual_barang_harjul'];
                            $qty=$i['d_jual_qty'];
                            $total=$i['d_jual_total'];
                    ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no;?></td>
                            <td style="padding-left:5px;"><?php echo $nofak;?></td>
                            <td style="text-align:center;"><?php echo $tgl;?></td>
                            <td style="text-align:center;"><?php echo $kobar;?></td>
                            <td style="text-align:left;"><?php echo $nabar;?></td>
                            <td style="text-align:left;"><?php echo $satuan;?></td>
                            <td style="text-align:right;"><?php echo 'Rp '.number_format($harjul);?></td>
                            <td style="text-align:center;"><?php echo $qty;?></td>
                            <td style="text-align:right;"><?php echo 'Rp '.number_format($total);?></td>
                        </tr>
                    <?php }?>
              
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
    <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>
    <script type="text/javascript">
            $(function () {
                $('#datetimepicker').datetimepicker({
                    format: 'DD MMMM YYYY HH:mm',
                });
                
                $('#datepicker').datetimepicker({
                    format: 'YYYY-MM-DD',
                });
                $('#datepicker2').datetimepicker({
                    format: 'YYYY-MM-DD',
                });

                $('#timepicker').datetimepicker({
                    format: 'HH:mm'
                });
            });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    
</body>

</html>
