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
<br>
<br>
<div class="container">
<form class="well form-horizontal" action="<?php echo base_url().'kasir/angsuran/simpan_angsuran/'?>" method="post" id="contact_form">
<fieldset>

<legend><center><h2><b>Bayar Angsuran</b></h2></center></legend>
<?php if ($data->lama_angsuran==$angsuran){ ?>
  <div class="alert alert-primary text-danger" role="alert">
   <b> *Ini adalah lama pembayaran terakhir. Harap dilunasi dan bayar sesuai sisa angsuran, sebesar Rp <?= number_format($data->sisa) ?> !</b>
  </div>
<?php } ?>
<div class="form-group">
<label class="col-md-4 control-label">Kode Kredit</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
<input name="kode_kredit" placeholder="Kode Angsuran" class="form-control" type="text" readonly value="<?= $data->kode_kredit ?>">
<input name="jatuh_tempo" placeholder="Kode Angsuran" class="form-control" type="hidden" readonly value="<?= $data->jatuh_tempo ?>">
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Nomor Faktur Penjualan Kredit</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
<input name="kode_faktur" placeholder="Kode Angsuran" class="form-control" type="text" readonly value="<?= $data->nofak_jual ?>">
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Nama Pelanggan</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="nama" placeholder="Nama Lengkap" class="form-control" type="text" readonly value="<?= $data->nama_pelanggan ?>">
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">NIK</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="nama" placeholder="Nama Lengkap" class="form-control" type="text" readonly value="<?= $data->nik ?>">
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Sisa Angsuran</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon">Rp</span>
<input name="sisa" placeholder="Sisa Angsuran" class="form-control" type="number" readonly value="<?= $data->sisa ?>" id="sisa_bayar">
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Banyak Angsuran</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
<input name="dp" placeholder="Uang Muka" class="form-control" type="text" readonly value="<?= $data->lama_angsuran.' bulan' ?>" id="lama">
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Angsuran Ke-</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-random"></i></span>
<input name="angke" placeholder="Uang Muka" class="form-control" type="text" readonly value="<?= $angsuran ?>" id="sisa">
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Pembayaran Angsuran</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon">Rp</span>
<input placeholder="Pembayaran Angsuran" class="form-control" type="text" name="pembayaran" id="pembayaran" value="<?= $data->perbulan ?>" readonly>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Terima Uang</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon">Rp</span>
<input name="terima" placeholder="Terima Uang" class="form-control" type="text" id="terima" required>
<input name="terima2" placeholder="Pembayaran Uang Muka" class="form-control" type="hidden" id="terima2" required>
</div>
</div>
</div>

<div class="form-group">
<label class="col-md-4 control-label">Kembalian</label>
<div class="col-md-4 inputGroupContainer">
<div class="input-group">
<span class="input-group-addon">Rp</span>
<input name="kembalian" placeholder="Kembalian Pembayaran" class="form-control" type="text" readonly required>
<input name="kembalian2" placeholder="Kembalian Pembayaran Uang Muka" class="form-control" type="hidden" readonly>
</div>
</div>
</div>


<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Success!.</div>

<div class="form-group">
<label class="col-md-4 control-label"></label>
<div class="col-md-4"><br>
<button type="submit" class="btn btn-warning">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspTRANSAKSI DAN SIMPAN DATA <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
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
      
     jml_uang: {
          validators: {
            stringLength: {
            min: 2 },
            notEmpty: {
              message: 'Masukkan Jumlah Pembayaran Uang Muka' } } } }}).


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
  $('#terima').change(function(){
    var pembayaran=document.getElementById("pembayaran").value; 
    var terima=document.getElementById("terima").value;   
    $('input[name=terima2]').val(terima);
    var kembalian=terima-pembayaran;
    var lama=document.getElementById("lama").value; 
    var sisa=document.getElementById("sisa").value; 
    var sisa_bayar=document.getElementById("sisa_bayar").value; 
    var ss=lama-sisa;
    if (ss==1 && pembayaran!=sisa_bayar){
      alert ("Ini adalah angsuran terkahir, mohon dibayar lunas!");
    }else{
      if (parseInt(terima) < parseInt(pembayaran)){
        alert ("Uang kurang!");
        $('input[name=terima]').val('');
        $('input[name=kembalian]').val('');
      }else{
        var terima=terima-0;
        $('input[name=kembalian2]').val(kembalian);
        kembalian=(kembalian).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        terima=(terima).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        $('input[name=terima]').val(terima);
        $('input[name=kembalian]').val(kembalian);
      }
    }
  });
});
    </script>
</body>
</html>