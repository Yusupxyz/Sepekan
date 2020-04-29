<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Laporan data penjualan</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>

<table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN ANGSURAN</h4></center></td>
</tr>
<tr>            
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4><?= $bulan ?></h4></center><br/></td>     
</tr>                        
</table>
 
<table border="0" align="center" style="width:900px;border:none;">
        <tr>
            <th style="text-align:left"></th>
        </tr>
</table>

<table border="1" align="center" style="width:900px;margin-bottom:20px;">
<thead>
    <tr>
        <th style="width:50px;">No</th>
        <th>No Faktur</th>
        <th>Kode Kredit</th>
        <th>Nama Pelanggan</th>
        <th>No WA/HP</th>
        <th>Harga</th>
        <th>Uang Muka</th>
        <th>Tanggal Angsuran</th>
        <th>Angsuran Ke-</th>
        <th>Pembayaran Angsuran</th>
    </tr>
</thead>
<tbody>
<?php 
$no=0;
    foreach ($data->result_array() as $i) {
        $no++;
        $nofak=$i['nofak_jual'];
        $tgl=$i['jual_tanggal'];
        $nama_pelanggan=$i['nama_pelanggan'];
        $no_wa_hp=$i['No_wa_hp'];
        $tanggal_angsuran=$i['tanggal_angsuran'];
        $angsuran_ke=$i['angsuran_ke'];
        $harga=$i['jual_total'];
        $dp=$i['uang_muka'];
        $pembayaran=$i['perbulan'];
?>
    <tr>
    <td style="text-align:center;"><?php echo $no;?></td>
    <td style="padding-left:5px;"><?php echo $nofak;?></td>
    <td style="text-align:center;"><?php echo $tgl;?></td>
    <td style="text-align:left;"><?php echo $nama_pelanggan;?></td>
    <td style="text-align:left;"><?php echo $no_wa_hp;?></td>
    <td style="text-align:right;"><?php echo 'Rp '.number_format($harga);?></td>
    <td style="text-align:right;"><?php echo 'Rp '.number_format($dp);?></td>
    <td style="text-align:left;"><?php echo $tanggal_angsuran;?></td>
    <td style="text-align:left;"><?php echo $angsuran_ke;?></td>
    <td style="text-align:right;"><?php echo 'Rp '.number_format($pembayaran);?></td>
    </tr>
<?php }?>
</tbody>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td align="right">Cirebon, <?php echo date('d-M-Y')?></td>
    </tr>
    <tr>
        <td align="right"></td>
    </tr>
   
    <tr>
    <td><br/><br/><br/><br/></td>
    </tr>    
    <tr>
        <td align="right">( <?php echo $this->session->userdata('nama');?> )</td>
    </tr>
    <tr>
        <td align="center"></td>
    </tr>
</table>
<table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
</div>
</body>
</html>_