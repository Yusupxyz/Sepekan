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
    $b=$data;
?>
<table border="0" align="center" style="width:700px;border:none;">
<h1 align="center"><font face="Courier New" size="5">CV. Enam Bersaudara</font></h1>
<td colspan="4">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
        <tr>
            <th style="text-align:left;">No Faktur</th>
            <th style="text-align:left;">: <?php echo $b['nofak_jual'];?></th>
            <th style="text-align:left;">Angsuran</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['perbulan']).',-';?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Total Pembelian</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['jual_total']).',-';?></th>
            <th style="text-align:left;">Angsuran Ke-</th>
            <th style="text-align:left;">: <?php echo $b['angsuran_ke'];?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Tgl Jatuh Tempo</th>
            <th style="text-align:left;">: <?php echo $b['jatuh_tempo'];?></th>
            <th style="text-align:left;">Pembayaran Angsuran</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['terima']).',-';?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Nama Pelanggan</th>
            <th style="text-align:left;">: <?php echo $b['nama_pelanggan'];?></th>
            <th style="text-align:left;">Kembalian</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['kembalian']).',-';?></th>
        </tr>
        <tr>
            <th style="text-align:left;">Lama Angsuran</th>
            <th style="text-align:left;">: <?php echo $b['lama_angsuran'];?> bulan</th>
            <th style="text-align:left;">Sisa Angsuran</th>
            <th style="text-align:left;">: <?php echo 'Rp '.number_format($b['sisa']).',-';?></th>
           
        </tr>
        <?php if ($b['sisa']==0){ ?>
        <tr>
            <th style="text-align:left;">Status Kredit</th>
            <th style="text-align:left;color:red;">: LUNAS</th>
           
        </tr>
        <?php } ?>
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