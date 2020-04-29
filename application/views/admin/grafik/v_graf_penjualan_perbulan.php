<!DOCTYPE html>
<html>
<head>
    <title>Grafik Stok Barang</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- load library jquery dan highcharts -->
    
    <!-- end load library -->
</head>
<body>

<?php
    /* Mengambil query report*/
    foreach($report as $result){
        $bulan[] = $result->tanggal; //ambil bulan
        $value[] = (float) $result->total; //ambil nilai
    }
    /* end mengambil query*/
     
?>
 
<!-- Load chart dengan menggunakan ID -->
<div id="report"></div>
<!-- END load chart -->
 

<script src="<?php echo base_url().'assets/js/grafik/jquery.js'?>"></script>
<script src="<?php echo base_url().'assets/js/grafik/highcharts.js'?>"></script>
<!-- Script untuk memanggil library Highcharts -->
<script type="text/javascript">
$(function () {
    $('#report').highcharts({
        chart: {
            type: 'line',
            margin: 75,
            options3d: {
                enabled: false,
                alpha: 10,
                beta: 25,
                depth: 70
            }
        },
        title: {
            text: 'Grafik Penjualan Bulan <?php echo $bln?>',
            style: {
                    fontSize: '18px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        subtitle: {
           text: '',
           style: {
                    fontSize: '15px',
                    fontFamily: 'Verdana, sans-serif'
            }
        },
        plotOptions: {
            column: {
                depth: 25
            }
        },
        credits: {
            enabled: false
        },
        xAxis: {
            categories:  <?php echo json_encode($bulan);?>
        },
        exporting: { 
            enabled: false 
        },
        yAxis: {
            title: {
                text: 'Penjualan'
            },
        },
        tooltip: {
             formatter: function() {
                 return 'Total Penjualan Tanggal <b>' + this.x + '</b> Adalah Rp <b>' + Highcharts.numberFormat(this.y,0) + '</b>';
             }
          },
        series: [{
            name: 'Tanggal',
            data: <?php echo json_encode($value);?>,
            shadow : true,
            dataLabels: {
                enabled: true,
                color: '#045396',
                align: 'center',
                formatter: function() {
                     return Highcharts.numberFormat(this.y, 0);
                }, // one decimal
                y: 0, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});
</script>
</body>
</html>

 
