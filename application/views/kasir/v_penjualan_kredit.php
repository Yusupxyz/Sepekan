<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="M Fikri Setiadi">

    <title>Transaksi Penjualan</title>

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
                <h1 class="page-header">Transaksi
                    <small>Pembayaran (Kredit)</small>
                    <button type="button" class="btn btn-danger btn-lg pull-right" data-toggle="modal" data-target="#largeModal" >Cari No. Antrian!</button>
                </h1> 
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        
        <div class="row">
        
            <div class="col-lg-12">

        
            <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th style="text-align:center;">Satuan</th>
                        <th style="text-align:center;">Harga(Rp)</th>
                        <th style="text-align:center;">Qty</th>
                        <th style="text-align:center;">Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($data as $items): ?>
                    <tr>
                         <td><?=$items->d_jual_barang_id;?></td>
                         <td><?=$items->d_jual_barang_nama;?></td>
                         <td style="text-align:center;"><?=$items->d_jual_barang_satuan;?></td>
                         <td style="text-align:right;"><?php echo number_format($items->d_jual_barang_harjul);?></td>
                         <td style="text-align:center;"><?php echo number_format($items->d_jual_qty);?></td>
                         <td style="text-align:right;"><?php echo number_format($items->d_jual_total);?></td>
                        
                    </tr>
                    
                    <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <form action="<?php echo base_url().'kasir/penjualan_kredit/simpan_penjualan/kredit'?>" method="post">
            <table>
                <tr>
                    <td style="width:760px;" rowspan="2"><button type="submit" class="btn btn-info btn-lg"> Bayar</button></td>
                    <th style="width:140px;">Uang Muka (Rp)</th>
                    <th style="text-align:right;width:140px;"><input type="text" name="total2" value="<?php echo number_format($uang_muka);?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                    <input type="hidden" id="uang_muka" name="uang_muka" value="<?php echo $uang_muka;?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                    <input type="hidden"  name="nofak" value="<?php echo $nofak;?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
    
                </tr>
                <tr>
                    <th>Tunai(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                    <input type="hidden" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required>
                </tr>
                <tr>
                    <td></td>
                    <th>Kembalian(Rp)</th>
                    <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                </tr>
              

            </table>
            </form>
            <hr/>
        </div>
        <!-- /.row -->
        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
        <form action="<?php echo base_url().'kasir/penjualan_kredit/'?>" method="post">

            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Masukkan No. Antrian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <input type="number" name="antrian" class="form-control input-sm" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Bayar</button>
            </div>
            </div>
            </form>
        </div>
        </div>
<!-- ============ MODAL WARNING =============== -->
<div class="modal fade" id="largeModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
        <form action="<?php echo base_url().'kasir/penjualan_kredit/'?>" method="post">

            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Maaf no. antrian tidak ada!
</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            </div>
            </form>
        </div>
        </div>
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
                var dp=$('#uang_muka').val();
                var jumuang=$('#jml_uang').val();
                var hsl=jumuang.replace(/[^\d]/g,"");
                $('#jml_uang2').val(hsl);
                $('#kembalian').val(hsl-dp);
            })
            
        });
          $(document).ready(function(){
            <?php if (isset($antrian) && $antrian==0){ ?>
                $('#largeModal2').modal('show');
            <?php } ?>
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#mydata').DataTable();
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
               url : "<?php echo base_url().'kasir/penjualan_kredit/get_barang';?>",
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

        
        $(".use-this").click(function() {
            var id=[], stok=[], harjul=[];

            var row = $(this).closest("tr")[0];
                    id.push(row.cells[1].innerHTML);
                    stok.push(document.getElementById("qty"+row.cells[1].innerHTML).value);
                    harjul.push(document.getElementById("harjul"+row.cells[1].innerHTML).value);
            if (stok==0){
                alert("Jumlah barang tidak boleh kosong!");
            }else{
                add(id,stok,harjul);
            }
        });        

        function add(id,stok,harga) {
            $.ajax({
                url: "<?php echo base_url().'kasir/penjualan_kredit/add_to_cart' ?>",
                type: "post",
                data: {kode_brg:id, qty: stok, harjul:harga} ,
                success: function (response) {
                    console.log(response);
                    $("#message").html(response);
                    $('#cartmessage').show();
                    <?php
                        if (isset($_GET['openmodal'])){
                        echo 'window.location = window.location.href;';
                        }else{
                            echo 'window.location = window.location.href + "?openmodal=1";';
                        }
                      ?>      
                    $('#largeModal').modal('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });  
        }
    </script>
        <?php
    if (isset($_GET['openmodal'])){
    if($_GET['openmodal'] == 1){ ?>
        <script>
                 $(function(){
                    $('#largeModal').modal('show');
                 });
        </script>
<?php         
    } }
?>
    
</body>

</html>
