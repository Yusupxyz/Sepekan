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
    <td colspan="2" style="width:800px;paddin-left:20px;"><center><h4>LAPORAN BARANG MASUK</h4></center></td>
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
        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Faktur Pembelian</th>
                        <th>Stok Awal</th>
                        <th>Jumlah Masuk</th>
                        <th>Tanggal Masuk</th>
    </tr>
</thead>
<tbody>
<?php 
$no=0;
    foreach ($data->result_array() as $i) {
        $no++;
                        $id=$i['barang_id'];
                        $nm=$i['barang_nama'];
                        $faktur=$i['faktur_pembelian'];
                        $stok=$i['stok_terkini'];
                        $jml=$i['jumlah'];
                        $tgl=$i['tanggal_input'];
?>
    <tr>
    <td style="text-align:center;"><?php echo $no;?></td>
                        <td><?php echo $id;?></td>
                        <td><?php echo $nm;?></td>
                        <td style="text-align:center;"><?php echo $faktur;?></td>
                        <td style="text-align:center;"><?php echo $stok;?></td>
                        <td style="text-align:center;"><?php echo $jml;?></td>
                        <td style="text-align:center;"><?php echo $tgl;?></td>
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