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

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
            <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Antrian
                    <small>Penjualan Barang (Cash)</small>
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
                        <th style="text-align:center;width:40px;">No. Antrian</th>
                        <th>No. Faktur</th>                        
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th style="width:140px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $id=$a['id'];
                        $no=$a['no_antrian'];
                        $faktur=$a['no_faktur'];
                        $status=$a['status'];
                        if ($status=='0'){
                            $status='Belum dibayar';
                        }else{
                            $status='Dibayar';
                        }
                        $tgl=$a['tanggal'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $faktur;?></td>
                        <td><?php echo $tgl;?></td>
                        <td><?php echo $status;?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-warning" href="#modalDetail<?php echo $no?>"  data-toggle="modal" title="Detail"><span class="fa fa-info"></span> Detail</a>
                            <?php if($status=='Belum dibayar'){ ?>
                            <a class="btn btn-xs btn-danger" href="#modalHapus<?php echo $id?>" data-toggle="modal" title="Batal"><span class="fa fa-close"></span> Batal</a>
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
        <?php $i=0; 
            foreach ($data->result_array() as $a){
                $no=$a['no_antrian'];
                $j=1;
                    ?>
                <div id="modalDetail<?php echo $no?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Detail Barang</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'gudang/satuan/edit_satuan'?>">
                        <div class="modal-body">
                        
                        <table class="table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <?php
                        foreach ($detail_barang[$i++] as $key => $b) {
                        $nama=$b['d_jual_barang_nama'];
                        $harga=$b['d_jual_barang_harjul'];
                        $jml=$b['d_jual_qty'];
                        $total=$b['d_jual_total'];
                        $totalsemua=$b['jual_total'];
                    ?>
                            <tbody>
                           
                            <tr>
                                <td><?= $j++ ?></td>
                                <td><?= $nama ?></td>
                                <td><?= $harga ?></td>
                                <td><?= $jml ?></td>
                                <td><?= $total ?></td>
                            </tr>
                            </tbody>
                                            <?php
                    }
                        ?>
                        </table>
                        Subtotal = Rp <?= $totalsemua ?> ,-
                </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

        <!-- ============ MODAL HAPUS =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['id'];
                        $no=$a['no_antrian'];
                        $faktur=$a['no_faktur'];
                        $status=$a['status'];
                        if ($status=='0'){
                            $status='Belum dibayar';
                        }else{
                            $status='Dibayar';
                        }
                        $tgl=$a['tanggal'];
                    ?>
                <div id="modalHapus<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Batal Pembelian</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'sales/antrian/batal'?>">
                        <div class="modal-body">
                            <p>Yakin mau membatalkan proses pembelian no. antrian <?= $no ?>?</p>
                            <input name="kode" type="hidden" value="<?php echo $id; ?>">
                                    <input name="nofak" type="hidden" value="<?php echo $faktur; ?>">
                                    <input name="jenis" type="hidden" value="cash">

                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-primary">Batalkan</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
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
