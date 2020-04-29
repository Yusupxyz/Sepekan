<!DOCTYPE html>
<html>
  <head>
    <title>Silahkan Masuk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="Yusup H">
    <!-- Bootstrap -->
    <link href="<?php echo base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url().'assets/css/stylesl.css'?>" rel="stylesheet">
	<link rel="icon" 
      type="image/png" 
      href="<?php echo base_url().'assets/img/logo2.png'?>">
  </head>
  <body class="login-bg" style="background-image: url('<?php echo base_url().'assets/img/bg4.jpg'?>'); background-size: cover; ">
  	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
							<h1>SEPEKAN</h1>
							<b>S</b>ist<b>E</b>m informasi <b>PE</b>ngelolaan to<b>K</b>o bangun<b>AN</b>
							<h3><img width="60px" src="<?php echo base_url().'assets/img/logo2.png'?>"/>CV. ENAM SAUDARA</h3>
			                <p><?php echo $this->session->flashdata('msg');?></p>
	                        <hr/>
	                        <form action="<?php echo base_url().'administrator/cekuser'?>" method="post">
	                        	<input class="form-control" type="text" name="username" placeholder="Username" required>
				                <input class="form-control" type="password" name="password" placeholder="Password" style="margin-bottom:1px;" required>
				                <div class="action">
				                    <button type="submit" class="btn btn-info" style="width:100%; bg-color:#083029;">Masuk</button>
				                </div>
	                        </form>
			                                
			            </div>
			        </div>
			        <div class="already">			            
			        </div>
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url().'assets/js/bootstrap.min.js'?>"></script>
    
  </body>
</html>