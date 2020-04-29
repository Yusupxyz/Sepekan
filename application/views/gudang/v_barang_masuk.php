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
            <center><?php echo $this->session->flashdata('msg');?></center>
                <h1 class="page-header">Data
                    <small>Barang Masuk</small>
                    <div class="pull-right"><a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Barang Masuk</a></div>
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
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Tanggal Masuk</th>
                        <th>No. Faktur Pembelian</th>
                        <th>Stok Terkini</th>
                        <th>Jumlah Masuk</th>
                        <th>Admin</th>
                        <th style="width:100px;text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $kode=$a['id'];
                        $id=$a['barang_id'];
                        $nm=$a['barang_nama'];
                        $tgl=$a['tanggal_input'];
                        $fak=$a['faktur_pembelian'];
                        $stok=$a['stok_terkini'];
                        $jml=$a['jumlah'];
                        $adm=$a['user_nama'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $id;?></td>
                        <td><?php echo $nm;?></td>
                        <td><?php echo $tgl;?></td>
                        <td><?php echo $fak;?></td>
                        <td style="text-align:center;"><?php echo $stok;?></td>
                        <td style="text-align:center;"><?php echo $jml;?></td>
                        <td><?php echo $adm;?></td>
                        <td style="text-align:center;">
                            <a class="btn btn-xs btn-warning" href="#modalEdit<?php echo $kode?>" data-toggle="modal" title="Ubah Faktur"><span class="fa fa-edit"></span> Ubah Faktur</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Tambah Barang Masuk</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'gudang/barang_masuk/tambah_barang'?>">
                <div class="modal-body">

                     <div class="form-group">
                            <label class="control-label col-xs-3" >Pilih Barang</label>
                            <div class="col-xs-9">
                                <select name="id_barang" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Barang" data-width="80%" placeholder="Pilih Barang" required>
                                <?php foreach ($bar->result_array() as $b2) {
                                    $id_bar=$b2['barang_id'];
                                    $nm_bar=$b2['barang_nama'];
                                    ?>
                                        <option value="<?php echo $id_bar;?>"><?php echo $nm_bar;?></option>
                                <?php }?>
                                    
                                </select>
                            </div>
                        </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah</label>
                        <div class="col-xs-9">
                            <input name="jumlah" class="harpok form-control" type="text" placeholder="Jumlah Barang..." style="width:335px;" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >No. Faktur Pembelian Barang</label>
                        <div class="col-xs-9">
                            <input name="faktur" class="harpok form-control" type="text" placeholder="No. Faktur Pembelian Barang..." style="width:335px;" required>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>

        <!-- ============ MODAL EDIT =============== -->
        <?php
                    foreach ($data->result_array() as $a) {
                        $no++;
                        $kode=$a['id'];
                        $id=$a['barang_id'];
                        $nm=$a['barang_nama'];
                        $tgl=$a['tanggal_input'];
                        $fak=$a['faktur_pembelian'];
                        $stok=$a['stok_terkini'];
                        $jml=$a['jumlah'];
                        $adm=$a['user_nama'];
                    ?>
                <div id="modalEdit<?php echo $kode?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Ubah No. Faktur</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'gudang/barang_masuk/ubah_faktur'?>">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >No. Faktur Pembelian</label>
                            <div class="col-xs-9">
                                <input name="kobar" class="form-control" type="hidden" value="<?php echo $kode;?>" placeholder="Kode Barang..." style="width:335px;" readonly>
                                <input name="faktur" class="form-control" type="text" value="<?php echo $fak;?>" placeholder="Faktur Pembelian..." style="width:335px;" >

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
        // $(function(){
        //     $('.harpok').priceFormat({
        //             prefix: '',
        //             //centsSeparator: '',
        //             centsLimit: 0,
        //             thousandsSeparator: ','
        //     });
        //     $('.harjul').priceFormat({
        //             prefix: '',
        //             //centsSeparator: '',
        //             centsLimit: 0,
        //             thousandsSeparator: ','
        //     });
        // });
    </script>
    
</body>

</html>
