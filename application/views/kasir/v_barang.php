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
                    <small>Barang</small>
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
                        <th>Satuan</th>
                        <th>Harga Pokok</th>
                        <th>Harga (Eceran)</th>
                        <th>Stok</th>
                        <th>Kategori</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $no=0;
                    foreach ($data->result_array() as $a):
                        $no++;
                        $id=$a['barang_id'];
                        $nm=$a['barang_nama'];
                        $satuan=$a['nama'];
                        $harpok=$a['barang_harpok'];
                        $harjul=$a['barang_harjul'];
                        $stok=$a['barang_stok'];
                        $kat_id=$a['barang_kategori_id'];
                        $kat_nama=$a['kategori_nama'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $id;?></td>
                        <td><?php echo $nm;?></td>
                        <td style="text-align:center;"><?php echo $satuan;?></td>
                        <td style="text-align:right;"><?php echo 'Rp '.number_format($harpok);?></td>
                        <td style="text-align:right;"><?php echo 'Rp '.number_format($harjul);?></td>
                        <td style="text-align:center;"><?php echo $stok;?></td>
                        <td><?php echo $kat_nama;?></td>
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
                <h3 class="modal-title" id="myModalLabel">Tambah Barang</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/barang/tambah_barang'?>">
                <div class="modal-body">

                    <!--<div class="form-group">
                        <label class="control-label col-xs-3" >Kode Barang</label>
                        <div class="col-xs-9">
                            <input name="kobar" class="form-control" type="text" placeholder="Kode Barang..." style="width:335px;" required>
                        </div>
                    </div>-->

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Barang</label>
                        <div class="col-xs-9">
                            <input name="nabar" class="form-control" type="text" placeholder="Nama Barang..." style="width:335px;" required>
                        </div>
                    </div>

                     <div class="form-group">
                            <label class="control-label col-xs-3" >Kategori</label>
                            <div class="col-xs-9">
                                <select name="kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                <?php foreach ($kat2->result_array() as $k2) {
                                    $id_kat=$k2['kategori_id'];
                                    $nm_kat=$k2['kategori_nama'];
                                    ?>
                                        <option value="<?php echo $id_kat;?>"><?php echo $nm_kat;?></option>
                                <?php }?>
                                    
                                </select>
                            </div>
                        </div>

                 

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Satuan</label>
                        <div class="col-xs-9">
                             <select name="satuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>
                                <option>Unit</option>
                                <option>Kotak</option>
                                <option>Botol</option>
                                <option>Butir</option>
                                <option>Buah</option>
                                <option>Biji</option>
                                <option>Sachet</option>
                                <option>Bks</option>
                                <option>Roll</option>
                                <option>PCS</option>
                                <option>Box</option>
                                <option>Meter</option>
                                <option>Centimeter</option>
                                <option>Liter</option>
                                <option>CC</option>
                                <option>Mililiter</option>
                                <option>Lusin</option>
                                <option>Gross</option>
                                <option>Kodi</option>
                                <option>Rim</option>
                                <option>Dozen</option>
                                <option>Kaleng</option>
                                <option>Lembar</option>
                                <option>Helai</option>
                                <option>Gram</option>
                                <option>Kilogram</option>
                             </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga Pokok</label>
                        <div class="col-xs-9">
                            <input name="harpok" class="harpok form-control" type="text" placeholder="Harga Pokok..." style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga (Eceran)</label>
                        <div class="col-xs-9">
                            <input name="harjul" class="harjul form-control" type="text" placeholder="Harga Jual Eceran..." style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Harga (Grosir)</label>
                        <div class="col-xs-9">
                            <input name="harjul_grosir" class="harjul form-control" type="text" placeholder="Harga Jual Grosir..." style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Stok</label>
                        <div class="col-xs-9">
                            <input name="stok" class="form-control" type="number" placeholder="Stok..." style="width:335px;">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Minimal Stok</label>
                        <div class="col-xs-9">
                            <input name="min_stok" class="form-control" type="number" placeholder="Minimal Stok..." style="width:335px;">
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
                        $id=$a['barang_id'];
                        $nm=$a['barang_nama'];
                        $satuan=$a['barang_satuan'];
                        $harpok=$a['barang_harpok'];
                        $harjul=$a['barang_harjul'];
                        $harjul_grosir=$a['barang_harjul_grosir'];
                        $stok=$a['barang_stok'];
                        $min_stok=$a['barang_min_stok'];
                        $kat_id=$a['barang_kategori_id'];
                        $kat_nama=$a['kategori_nama'];
                    ?>
                <div id="modalEditPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/barang/edit_barang'?>">
                        <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kode Barang</label>
                            <div class="col-xs-9">
                                <input name="kobar" class="form-control" type="text" value="<?php echo $id;?>" placeholder="Kode Barang..." style="width:335px;" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Barang</label>
                            <div class="col-xs-9">
                                <input name="nabar" class="form-control" type="text" value="<?php echo $nm;?>" placeholder="Nama Barang..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Kategori</label>
                            <div class="col-xs-9">
                                <select name="kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                <?php foreach ($kat2->result_array() as $k2) {
                                    $id_kat=$k2['kategori_id'];
                                    $nm_kat=$k2['kategori_nama'];
                                    if($id_kat==$kat_id)
                                        echo "<option value='$id_kat' selected>$nm_kat</option>";
                                    else
                                        echo "<option value='$id_kat'>$nm_kat</option>";
                                }
                                ?>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Satuan</label>
                            <div class="col-xs-9">
                                 <select name="satuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>
                                    <?php if($satuan=='Unit'):?>
                                        <option selected>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Kotak'):?>
                                        <option>Unit</option>
                                        <option selected>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Botol'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option selected>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Butir'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option selected>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Buah'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option selected>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Biji'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option selected>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Sachet'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option selected>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Bks'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option selected>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Roll'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option selected>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='PCS'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option selected>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Box'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option selected>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Meter'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option selected>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Centimeter'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option selected>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Liter'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option selected>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='CC'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option selected>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Mililiter'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option selected>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Lusin'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option selected>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Gross'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option selected>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Kodi'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option selected>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Rim'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option selected>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Dozen'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option selected>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Kaleng'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option selected>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Lembar'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option selected>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Helai'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option selected>Helai</option>
                                        <option>Gram</option>
                                        <option>Kilogram</option>
                                    <?php elseif($satuan=='Gram'):?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option selected>Gram</option>
                                        <option>Kilogram</option>
                                    <?php else:?>
                                        <option>Unit</option>
                                        <option>Kotak</option>
                                        <option>Botol</option>
                                        <option>Butir</option>
                                        <option>Buah</option>
                                        <option>Biji</option>
                                        <option>Sachet</option>
                                        <option>Bks</option>
                                        <option>Roll</option>
                                        <option>PCS</option>
                                        <option>Box</option>
                                        <option>Meter</option>
                                        <option>Centimeter</option>
                                        <option>Liter</option>
                                        <option>CC</option>
                                        <option>Mililiter</option>
                                        <option>Lusin</option>
                                        <option>Gross</option>
                                        <option>Kodi</option>
                                        <option>Rim</option>
                                        <option>Dozen</option>
                                        <option>Kaleng</option>
                                        <option>Lembar</option>
                                        <option>Helai</option>
                                        <option>Gram</option>
                                        <option selected>Kilogram</option>
                                    <?php endif;?>
                                 </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga Pokok</label>
                            <div class="col-xs-9">
                                <input name="harpok" class="harpok form-control" type="text" value="<?php echo $harpok;?>" placeholder="Harga Pokok..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga (Eceran)</label>
                            <div class="col-xs-9">
                                <input name="harjul" class="harjul form-control" type="text" value="<?php echo $harjul;?>" placeholder="Harga Jual..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Harga (Grosir)</label>
                            <div class="col-xs-9">
                                <input name="harjul_grosir" class="harjul form-control" type="text" value="<?php echo $harjul_grosir;?>" placeholder="Harga Jual Grosir..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Stok</label>
                            <div class="col-xs-9">
                                <input name="stok" class="form-control" type="number" value="<?php echo $stok;?>" placeholder="Stok..." style="width:335px;" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Minimal Stok</label>
                            <div class="col-xs-9">
                                <input name="min_stok" class="form-control" type="number" value="<?php echo $min_stok;?>" placeholder="Minimal Stok..." style="width:335px;" required>
                            </div>
                        </div>

                    </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-info">Update</button>
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
                        $id=$a['barang_id'];
                        $nm=$a['barang_nama'];
                        $harpok=$a['barang_harpok'];
                        $harjul=$a['barang_harjul'];
                        $stok=$a['barang_stok'];
                        $min_stok=$a['barang_min_stok'];
                        $kat_id=$a['barang_kategori_id'];
                        $kat_nama=$a['kategori_nama'];
                    ?>
                <div id="modalHapusPelanggan<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Hapus Barang</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'admin/barang/hapus_barang'?>">
                        <div class="modal-body">
                            <p>Yakin mau menghapus data barang ini..?</p>
                                    <input name="kode" type="hidden" value="<?php echo $id; ?>">
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-primary">Hapus</button>
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
