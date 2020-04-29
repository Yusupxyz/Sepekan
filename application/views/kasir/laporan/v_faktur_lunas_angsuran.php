<html lang="en" moznomarginboxes mozdisallowselectionprint>
<head>
    <title>Faktur Pembayaran Angsuran</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css')?>"/>
</head>
<body onload="window.print()">
<div id="laporan">
<table align="center" style="width:700px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">
<!--<tr>
    <td><img src="<?php// echo base_url().'assets/img/kop_surat.png'?>"/></td>
</tr>-->
</table>

<table border="0" align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:0px;">
<tr>

</tr>
                       
</table>
<?php 
    $b=$data->row_array();
?>
<table border="0" align="center" style="width:700px;border:none;">
<h1 align="center"><font face="Courier New" size="5">CV. Enam Bersaudara</font></h1>
<h1 align="center"><font face="Courier New" size="4">Faktur Lunas Kredit</font></h1>

<td colspan="4">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
        <tr>
            <th style="text-align:left;">No Faktur Pembelian</th>
            <th style="text-align:left;">: <?php echo $b['nofak_jual'];?></th>
            <th style="text-align:left;">Nama Pelanggan</th>
            <th style="text-align:left;">:<?php echo $b['nama_pelanggan'];?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Kode Kredit</th>
            <th style="text-align:left;">: <?php echo $b['kode_kredit'];?></th>
            <th style="text-align:left;">NIK</th>
            <th style="text-align:left;">: <?php echo $b['nik'];?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Lama Angsuran</th>
            <th style="text-align:left;">: <?php echo $b['lama_angsuran'];?> bulan</th>
            <th style="text-align:left;">Pembelian</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['jual_total']).',-';?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Keterangan</th>
            <th style="text-align:left;">: LUNAS</th>
            <th style="text-align:left;">Uang Muka</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['uang_muka']).',-';?></th>
           
        </tr>
        <td colspan="4">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>

</table>

<!-- 
<table border="1" align="center" style="width:700px;margin-bottom:20px;">
<thead>

    <tr>
        <th style="width:50px;">No</th>
        <th>Nama Barang</th>
        <th>Satuan</th>
        <th>Harga Jual</th>
        <th>Qty</th>
        <th>SubTotal</th>
    </tr>
</thead>
<tbody>
<?php 
$no=0;
    foreach ($data->result_array() as $i) {
        $no++;
        
        $nabar=$i['d_jual_barang_nama'];
        $satuan=$i['d_jual_barang_satuan'];
        
        $harjul=$i['d_jual_barang_harjul'];
        $qty=$i['d_jual_qty'];
        $total=$i['d_jual_total'];
?>
    <tr>
        <td style="text-align:center;"><?php echo $no;?></td>
        <td style="text-align:left;"><?php echo $nabar;?></td>
        <td style="text-align:center;"><?php echo $satuan;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($harjul);?></td>
        <td style="text-align:center;"><?php echo $qty;?></td>
        <td style="text-align:right;"><?php echo 'Rp '.number_format($total);?></td>
    </tr>
<?php }?>
</tbody>
<tfoot>

    <tr>
        <td colspan="5" style="text-align:center;"><b>Total</b></td>
        <td style="text-align:right;"><b><?php echo 'Rp '.number_format($b['jual_total']);?></b></td>
    </tr>
</tfoot>
</table> -->
<table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <td></td>
</table>
<table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
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
<table align="center" style="width:700px; border:none;margin-top:5px;margin-bottom:20px;">
    <tr>
        <th><br/><br/></th>
    </tr>
    <tr>
        <th align="left"></th>
    </tr>
</table>
</div>
</body>
</html>