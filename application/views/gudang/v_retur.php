<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Retur Barang</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/style.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/font-awesome.css'?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url().'assets/css/4-col-portfolio.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/dataTables.bootstrap.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/jquery.dataTables.min.css'?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/dist/css/bootstrap-select.css'?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap-datetimepicker.min.css'?>">
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
                <h1 class="page-header">Retur
                    <small>Barang</small>
                    <a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Data Barang Masuk</small></a>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
 
             <br/>
            <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;" id="mydata2">
                <thead>
                    <tr>
                    <th>No.</th>
                        <th>Faktur Pembelian</th>
                        <th>Tanggal Retur</th>
                        <th style="text-align:center;">Jumlah</th>
                        <th style="text-align:center;">Keterangan</th>
                        <th style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php $no=1;
                        foreach ($retur->result_array() as $items): ?>
                   
                    <tr>
                    <td><?php echo $no++;?></td>
                         <td><?php echo $items['faktur_pembelian'];?></td>
                         <td><?php echo $items['retur_tanggal'];?></td>
                        <td style="text-align:center;"><?php echo $items['retur_jumlah'];?></td>
                        <td style="text-align:center;"><?php echo $items['retur_keterangan'];?></td>
                        <td style="text-align:center;">
                                <a class="btn btn-xs btn-warning" href="#modalEditRetur<?php echo $items['retur_id']?>" data-toggle="modal" title="Ubah"><span class="fa fa-edit"></span> Ubah</a>
                                <a class="btn btn-xs btn-danger" href="#modalHapusRetur<?php echo $items['retur_id']?>" data-toggle="modal" title="Batal"><span class="fa fa-close"></span> Batal</a>
                        </td>
                    </tr>
                    
                    <?php endforeach; ?>
                </tbody>
            </table>
            
            <hr/>
        </div>
        <!-- /.row -->
         <!-- ============ MODAL DATA =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title" id="myModalLabel">Data Barang</h3>
            </div>
                <div class="modal-body" style="overflow:scroll;height:500px;">

                  <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:40px;">No</th>
                            <th style="width:120px;">Faktur Pembelian</th>
                            <th style="width:120px;">Tanggal Pembelian</th>
                            <th style="width:120px;">Kode Barang</th>
                            <th style="width:240px;">Nama Barang</th>
                            <th style="width:100px;">Harga Pokok</th>
                            <th>Jumlah Pembelian</th>
                            <th>Telah Retur</th>
                            <th style="width:100px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $no=0;
                        foreach ($data->result_array() as $a):
                            $no++;
                            $id=$a['id'];
                            $faktur=$a['faktur_pembelian'];
                            $tgl=$a['tanggal_input'];
                            $id_barang=$a['barang_id'];
                            $nm=$a['barang_nama'];
                            $harpok=$a['barang_harpok'];
                            $jumlah=$a['jumlah'];
                            $jmlretur=$a['retur'];
                    ?>
                        <tr>
                            <td style="text-align:center;"><?php echo $no;?></td>
                            <td><?php echo $faktur;?></td>
                            <td><?php echo $tgl;?></td>
                            <td><?php echo $id_barang;?></td>
                            <td><?php echo $nm;?></td>
                            <td style="text-align:right;"><?php echo 'Rp '.number_format($harpok);?></td>
                            <td style="text-align:center;"><?php echo $jumlah;?></td>
                            <td style="text-align:center;"><?php echo $jmlretur!=null? $jmlretur : '0';?></td>
                            <td style="text-align:center;">
                                <a class="btn btn-xs btn-info" href="#modalRetur<?php echo $id?>" data-toggle="modal" title="Retur"><span class="fa fa-refresh"></span> Retur</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>          

                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    
                </div>
            </div>
            </div>
        </div>

         <!-- ============ MODAL RETUR =============== -->
         <?php
                    foreach ($data->result_array() as $a) {
                        $id=$a['id'];
                        $faktur=$a['faktur_pembelian'];
                        $tgl=$a['tanggal_input'];
                        $id_barang=$a['barang_id'];
                        $nm=$a['barang_nama'];
                        $harpok=$a['barang_harpok'];
                        $jumlah=$a['jumlah'];
                        $jmlretur=$a['retur'];

                    ?>
                <div id="modalRetur<?php echo $id?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Retur Barang</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'gudang/retur/simpan_retur'?>">
                        <div class="modal-body">
                            <input name="kode" type="hidden" value="<?php echo $id;?>">

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Faktur Pembelian</label>
                        <div class="col-xs-9">
                            <input readonly name="faktur" class="form-control" type="text" value="<?php echo $faktur;?>" style="width:280px;" required>
                            <input readonly name="kobar" class="form-control" type="hidden" value="<?php echo $id_barang;?>" style="width:280px;" required>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah Pembelian</label>
                        <div class="col-xs-9">
                            <input readonly name="jml_pembelian" class="form-control" type="number" value="<?php echo $jumlah;?>" style="width:280px;" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Telah Retur</label>
                        <div class="col-xs-9">
                            <input readonly name="retur" class="form-control" type="number" value="<?php echo $jmlretur;?>" style="width:280px;" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah Retur</label>
                        <!-- *sisa bisa retur adalah <?php echo $jumlah-$jmlretur;?>. -->
                        <div class="col-xs-9">
                            <input name="jml_retur" class="form-control" type="number" min="1" max="<?php echo $jumlah-$jmlretur;?>" style="width:280px;" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Keterangan</label>
                        <div class="col-xs-9">
                        <select name="keterangan" class="form-control" style="width:280px;" required>
                            <option value="rusak">Rusak</option>
                            <option  value="tidak sesuai">Tidak Sesuai</option>
                            <option  value="lain-lain">Lain-lain</option>
                        </select>                        
                    </div>
                    </div>

                </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Batal</button>
                            <button type="submit" class="btn btn-info">Retur</button>
                        </div>
                    </form>
                </div>
                </div>
                </div>
            <?php
        }
        ?>

  <!-- ============ MODAL EDIT =============== -->
  <?php foreach ($retur->result_array() as $items): ?>
                    
                <div id="modalEditRetur<?php echo $items['retur_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Ubah Retur</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'gudang/retur/edit_retur'?>">
                        <div class="modal-body">
                            <input name="kode" type="hidden" value="<?php echo $items['retur_id'];?>">
                            <input name="kode_brg_msk" type="hidden" value="<?php echo $items['retur_barang_masuk_id'];?>">


                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah Retur</label>
                        <div class="col-xs-9">
                            <input name="jumlah" class="form-control" type="number" max="<?php echo $items['retur_jumlah'];?>" value="<?php echo $nm;?>" style="width:280px;" required>
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
                <?php endforeach; ?>


        <!-- ============ MODAL Batal =============== -->
        <?php foreach ($retur->result_array() as $items): ?>
            <div id="modalHapusRetur<?php echo $items['retur_id']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 class="modal-title" id="myModalLabel">Batal Retur</h3>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url().'gudang/retur/batal_retur'?>">
                    <div class="modal-body">
                        <p>Yakin mau membatalkan retur barang ..?</p>
                                <input name="kode" type="hidden" value="<?php echo $items['retur_id']?>">
                                <input name="jumlah" type="hidden" value="<?php echo $items['retur_jumlah']?>">
                                <input name="kode_brg_msk" type="hidden" value="<?php echo $items['retur_barang_masuk_id'];?>">

                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button type="submit" class="btn btn-primary">Batalkan</button>
                    </div>
                </form>
            </div>
            </div>
            </div>
        <?php endforeach; ?>

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
    <script src="<?php echo base_url().'assets/js/moment.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/bootstrap-datetimepicker.min.js'?>"></script>
    <script type="text/javascript">
        $(function(){
            $('#jml_uang').on("input",function(){
                var total=$('#total').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-total);
            })
            
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata2').DataTable();
        } );
    </script>
    <script type="text/javascript">
        $(function(){
            $('.jml_uang').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
            });
            $('#jml_uang2').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ''
            });
            $('#kembalian').priceFormat({
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
    <script type="text/javascript">
        $(document).ready(function(){
            //Ajax kabupaten/kota insert
            $("#kode_brg").focus();
            $("#kode_brg").on("input",function(){
                var kobar = {kode_brg:$(this).val()};
                   $.ajax({
               type: "POST",
               url : "<?php echo base_url().'admin/retur/get_barang';?>",
               data: kobar,
               success: function(msg){
               $('#detail_barang').html(msg);
               }
            });
            }); 

            $("#kode_brg").keypress(function(e){
                if(e.which==13){
                    $("#jumlah").focus();
                }
            });
        });
    </script>
    
    
</body>

</html>
