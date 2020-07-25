<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .line-title{
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }
  </style>
</head>
<body>
  <img src="assets/img/profile/logo bmkg.jpg" style="position: absolute; width: 60px; height: auto;">
  <table style="width: 100%;">
    <tr>
      <td align="center">
        <span style="line-height: 1.6; font-weight: bold;">
          BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA
          <br>STASIUN KLIMATOLOGI LOMBOK BARAT
          <br><h1 style="font-size: 12px">Jl. TGH. Ibrahim Khalidy, Telp : (0370)674134, Fax : (0370) 674135, Kediri - Lombok Barat, NTB 83362</h1>
          
        </span>
      </td>
    </tr>
    </table>
    <hr class="line-title">
<!--<div class="container-fluid"> -->
    <center><h5>LAPORAN PERSEDIAAN PIAS DAN TINTA</h5>
        <h5>Bulan <?= date ('m Y'); ?></h5>
       
    <table class="table table-bordered" width="100%">
        <thead>
            <tr>
                    <th width="10%" scope="col" style="text-align: center; font-size: 14px" >No</th>
                    
                      <th width="20%0%" scope="col" style="text-align: center; font-size: 14px">Kode Barang</th>
                      <th width="30%%" scope="col" style="text-align: center; font-size: 14px">Nama Barang</th>
                        <th  width="40%" scope="col" style="text-align: center; font-size: 14px">Jenis</th>
                      <th width="20%" scope="col" style="text-align: center; font-size: 14px">Jumlah Tersedia</th>
                      
                      <th width="30%"  style="text-align: center; font-size: 14px">S/N</th>
                   
                      
                
            </tr>
        </thead>
        <tbody>
            <?php $i = 1;  ?>
                        <?php foreach ($getbarang as $a) :?>
                    <tr>
                      <th scope="row" style="text-align: center;font-size: 12px"><?= $i;?></th>
                     
                      
                      <td style="font-size: 12px"><?= $a['kode_brg'];?></td>
                      <td style="font-size: 12px"><?= $a['nama_brg'];?></td>
                      <td style="text-align: center; font-size: 12px" ><?= $a['nama_jenis'];?></td>
                      <td style="text-align: center; font-size: 12px"><?= $a['stok'];?></td>
                 
                     <td style="font-size: 12px"><?= $a['no_seri'];?></td>
                  
                      
                     
                      
                    </tr>
                    <?php $i++; ?>
                    <?php endforeach; ?>
        </tbody>
    </table>


    <br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td align="center" scope="col" width="40%">Mengetahui,</td>
                        <td align="center" scope="col" width="10%">&nbsp;</td>
                        <td align="center" scope="col" width="50%">Kediri, <?= date("d, m, Y")?></td>
                    </tr>
                    <tr>
                        <td align="center">Kepala Seksi Observasi </td>
                        <td align="center">&nbsp;</td>
                        <td align="center">Pembuat Laporan</td>
                    </tr>
                    <tr>
                        <td align="center">Stasiun Klimatologi Lombok Barat</td>
                        <td align="center" Height="20">&nbsp;</td>
                        <td align="center">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center" Height="50">Made Dwi Jendra Putra, M.Si</td>
                        <td align="center">&nbsp;</td>
                        <td align="center"><b>Yanu Arizal, S.Tr</b></td>
                    </tr>
                </table>
</body>
</html>