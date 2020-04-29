 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url().'beranda'?>">SEPEKAN</a>
                <img src="<?php echo base_url().'assets/img/logo3.png'?>" alt="Logo" height="42" width="42">

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   <?php  $h=$this->session->userdata('akses'); ?>
                    <?php $u=$this->session->userdata('user'); ?>
                    <?php if($h=='1' || $h=='4'){ ?> 
                    <!--dropdown-->
                    <li>
                        <a href="<?php echo base_url().'admin/grafik'?>"><span class="fa fa-line-chart"></span> Grafik</a>
                        <li><a href="<?php echo base_url().'admin/riwayat'?>"><span class="fa fa-history" aria-hidden="true"></span> Riwayat Pesan Jatuh Tempo</a></li> 
                    </li>
                    <?php }?>
                    <?php if($h=='2'){ ?> 
                      <!--dropdown-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Transaksi"><span class="fa fa-shopping-cart" aria-hidden="true"></span> Transaksi</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url().'kasir/penjualan'?>"><span class="fa fa-shopping-bag" aria-hidden="true"></span> Pembayaran (Cash)</a></li> 
                            <li><a href="<?php echo base_url().'kasir/penjualan_kredit'?>"><span class="fa fa-cubes" aria-hidden="true"></span> Pembayaran (Kredit)</a></li> 
                        </ul>
                        <li><a href="<?php echo base_url().'admin/riwayat'?>"><span class="fa fa-history" aria-hidden="true"></span> Riwayat Pesan Jatuh Tempo</a></li> 

                    </li>
                    <!--ending dropdown-->
                    <?php }?>
                    <?php if($h=='5'){ ?> 
                      <!--dropdown-->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Transaksi"><span class="fa fa-shopping-cart" aria-hidden="true"></span> Transaksi</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url().'sales/penjualan'?>"><span class="fa fa-shopping-bag" aria-hidden="true"></span> Penjualan (Cash)</a></li> 
                            <li><a href="<?php echo base_url().'sales/penjualan_kredit'?>"><span class="fa fa-cubes" aria-hidden="true"></span> Penjualan (Kredit)</a></li> 
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" title="Transaksi"><span class="fa fa-database" aria-hidden="true"></span> Data Penjualan</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url().'sales/antrian'?>"><span class="fa fa-shopping-bag" aria-hidden="true"></span> Antrian Penjualan (Cash)</a></li> 
                            <li><a href="<?php echo base_url().'sales/antrian/kredit'?>"><span class="fa fa-cubes" aria-hidden="true"></span> Antrian Penjualan (Kredit)</a></li> 
                        </ul>
                    </li>
                    <!--ending dropdown-->
                    <?php }?>
                    <?php if($h=='3'){ ?> 
                      <!--dropdown-->
                    <li class="dropdown">
                        <li>
                        <a href="<?php echo base_url().'gudang/retur'?>"><span class="fa fa-refresh"></span> Retur</a>
                    </li>

                    </li>
                    <!--ending dropdown-->
                    <?php }?>
                     <li>
                        <a href="<?php echo base_url().'administrator/logout'?>"><span class="fa fa-sign-out"></span> Keluar</a>
                    </li>
                </ul>


            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>