<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="apple-touch-icon" type="image/png" href="https://static.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
<meta name="apple-mobile-web-app-title" content="CodePen">
<link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico" />
<link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111" />
<title>Sepekan</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>
<style>
#success_message{ display: none;}
</style>
<script>
  window.console = window.console || function(t) {};
</script>
<script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
</head>
<body translate="no">
<div class="container">
<form class="well form-horizontal" action="<?php echo base_url().'sales/detail_kredit/simpan_detail_kredit'?>" method="post" id="contact_form" enctype="multipart/form-data">
<fieldset>

<legend><center><h2><b>Detail Angsuran</b></h2></center></legend>

<div class="alert alert-warning" role="alert">
    INFO : Maksimal lama angsuran ialah <a href="#" class="alert-link"><?= $maks; ?> bulan.</a>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Nomor Faktur Penjualan Kredit</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
<input name="kode_faktur" placeholder="Kode Angsuran" class="form-control" type="text" readonly value="<?= $nofak ?>">
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Nama Pelanggan</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="nama" placeholder="Nama Lengkap" class="form-control" type="text" required>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">NIK</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="nik" placeholder="NIK" class="form-control" type="number" required>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Alamat</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
<input name="alamat" placeholder="Alamat Tinggal" class="form-control" type="text" required>
</div>
</div>
</div>


<div class="form-group">
<label class="col-md-4 control-label">No. HP Whatsapp</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="no_wa" placeholder="Nomor Handphone & Whatsapp" class="form-control" type="number" required>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Foto KTP (.jpg/.png)</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
<input name="ktp" placeholder="Foto KTP" class="form-control" type="file" accept="image/jpg/png" required>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Total Pembelian</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon">Rp</span>
<input name="total" placeholder="Total Pembelian" class="form-control" type="text" readonly value="<?= $total ?>" id='total'>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Uang Muka</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon">Rp</span>
<input name="dp" placeholder="Uang Muka" class="form-control" type="text" id="dp" value='<?= $dp ?>' min="1" readonly>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Lama Angsuran (bulan)</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
<input name="lama_angsuran" placeholder="Lama Angsuran dalam Bulan" class="form-control" type="number" id='lama_angsuran' value='0' min="1" max="<?= $maks+1; ?>">
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Angsuran Perbulan</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon">Rp</span>
<input name="perbulan" placeholder="Angsuran Perbulan" class="form-control" type="text" id='perbulan' value='0' readonly>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Sisa Angsuran</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon">Rp</span>
<input name="angsuran" placeholder="Sisa Angsuran" class="form-control" type="text" readonly value="<?= $sisa_angsuran ?>" id='angsuran'>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Keterangan</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
<textarea name="keterangan" placeholder="Keterangan" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"></textarea>
</div>
</div>
</div>


<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

<div class="form-group">
<label class="col-md-4 control-label"></label>
<div  >
<button type="button" class="btn btn-danger" id="batal">BATAL <span class="glyphicon glyphicon-remove"></span></button>

<button type="submit" class="btn btn-warning">TRANSAKSI DAN SIMPAN DATA <span class="glyphicon glyphicon-send"></span></button>
</div>
</div>
</fieldset>
</form>
</div>
</div>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-30d18ea41045577cdb11c797602d08e0b9c2fa407c8b81058b1c422053ad8041.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
<script src="<?php echo base_url().'assets/js/jquery.price_format.min.js'?>"></script>

<script id="rendered-js">
$(document).ready(function () {
  $('#contact_form').bootstrapValidator({
    // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
    feedbackIcons: {
      valid: 'glyphicon glyphicon-ok',
      invalid: 'glyphicon glyphicon-remove',
      validating: 'glyphicon glyphicon-refresh' },

    fields: {
        
      nama: {
        validators: {
          stringLength: {
            min: 2 },

          notEmpty: {
            message: 'Masukan nama lengkap' } } },

      nik: {
        validators: {
          stringLength: {
            min: 16 },

          notEmpty: {
            message: 'Masukan NIK lengkap' } } },
    
      dp: {
          validators: {
            stringLength: {
              min: 2 },
            notEmpty: {
              message: 'Masukkan Uang Muka' } } },

    lama_angsuran: {
          validators: {
            stringLength: {
              max: 2 },
            notEmpty: {
              message: 'Masukkan Lama Angsuran' } } },

      alamat: {
          validators: {
            stringLength: {
            min: 2 },
            notEmpty: {
              message: 'Masukkan Alamat Tinggal' } } },

        no_wa: {
          validators: {
            notEmpty: {
              message: 'Masukkan Nomor HP Whatsapp' } } } } }).


  on('success.form.bv', function (e) {
    $('#success_message').slideDown({ opacity: "show" }, "slow"); // Do something ...
    $('#contact_form').data('bootstrapValidator').resetForm();

    // Prevent form submission
    e.preventDefault();

    // Get the form instance
    var $form = $(e.target);

    // Get the BootstrapValidator instance
    var bv = $form.data('bootstrapValidator');

    // Use Ajax to submit form data
    $.post($form.attr('action'), $form.serialize(), function (result) {
      console.log(result);
    }, 'json');
  });
});
//# sourceURL=pen.js

$(document).ready(function(){
  var number=document.getElementById("angsuran").value;  
  var number1=document.getElementById("dp").value;  
  var number2=document.getElementById("total").value;  
  angsuran=parseInt(number).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
  dp=parseInt(number1).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
  total=parseInt(number2).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
  $('input[name=angsuran]').val(angsuran);
  $('input[name=dp]').val(dp);
  $('input[name=total]').val(total);

});

$(document).ready(function(){
  $('#lama_angsuran').change(function(){
    var sisa=<?= $sisa_angsuran ?>;
    var lama=document.getElementById("lama_angsuran").value;   
    var perbulan=sisa/lama;
    perbulan=(perbulan).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    $('input[name=perbulan]').val(perbulan);
  });
});


$("#batal").click(function () {
    var nofak='<?= $nofak; ?>';
                $.ajax({
                url: "<?php echo base_url().'sales/penjualan_kredit/delete/'.$nofak ?>",
                type: "get",
                success: function (response) {
                    console.log(response);
                    $("#message").html(response);
                    $('#cartmessage').show();
                    location.href='<?php echo base_url().'sales/penjualan_kredit'?>';

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });  
            });        
    </script>
</body>
</html>