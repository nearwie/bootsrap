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
  <img src="assets/img/logo.jpg" style="position: absolute; width: 60px; height: auto;">
  <table style="width: 100%;">
    <tr>
      <td align="center">
        <span style="line-height: 1.6; font-weight: bold;">
          SEKOLAH TINGGI ILMU KOMPUTER DAN INFORMATIKA
          <br>MAKASSAR INDONESIA
        </span>
      </td>
    </tr>
        
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Hasil Analisis</h1>
          <div class="box-header with-border">
              <h6 class="box-title">Gejala yang dipilih</h6>
          </div><!-- /.box-header -->

          <div class="box-body table-responsive">
            <table id="tbl-list" class="table table-bordered">
                <tr>
                    <th width="50px" style="background: #67CDFF; color: white">No</th>
                    <th style="background: #67CDFF; color: white">Gejala</th>
                </tr>
                <tr>
                    <?php $i = 1; foreach($listGejala->result() as $value){?>
                        <tr>
                            <td width="30px"><?php echo $i++?></td>
                            <td><?php echo $value->kode_gejala." - ".$value->nama_gejala?></td>
                        </tr>
                    <?php }?>
                </tr>
            </table>
        </div><!--box body-->


        <div class="box box-success">
          <div class="box-header with-border">
              <h6 class="box-title">Hasil Diagnosa</h6>
          </div><!-- /.box-header -->
          <div class="box-body">
              <table id="tbl-list" class="table table-bordered">
                  <tr>
                      <th width="50px" style="background: #67CDFF; color: white">No</th>
                      <th style="background: #67CDFF; color: white">Kerusakan</th>
                      <th style="background: #67CDFF; color: white">Tingkat Kepercayaan</th>
                  </tr>
                  <tr>
                      <?php $i = 1; foreach($listKerusakan as $value){?>
                          <tr>
                              <td width="30px"><?php echo $i++?></td>
                              <td><?php echo $value['kode_kerusakan']." - ".$value['nama_kerusakan']?></td>
                              <td><?php echo $value['kepercayaan']?> %</td>
                          </tr>
                      <?php }?>
                  </tr>
              </table>
          </div><!--box body-->
      </div><!--box-->

      <div class="box box-success">
        <div class="box-header with-border">
            <h6 class="box-title">Kesimpulan</h6>
        </div><!-- /.box-header -->
        <div class="box-body">
            <?php if(sizeof($listKerusakan)>0) { ?>
                <p>
                    Berdasarkan gejalanya, Peralatan Ground Satellite Receiver di prediksi mengalami kerusakan/masalah <b><?php echo $listKerusakan[0]['nama_kerusakan'];?></b> dengan tingkat kepercayaan <b><?php echo $listKerusakan[0]['kepercayaan'];?> %</b><br/>
                    <?php echo $listKerusakan[0]['keterangan'];?>. <p style="font-style: bold; color: red; font-size: 13px;">*Hasil diagnosa ini membutuhkan pemeriksaan lebih lanjut dengan melakukan perbaikan untuk mengembalikan fungsinya.</p>
                </p>
            <?php }else{?>
                <p>
                    Penyakit tidak dapat diprediksi karena tingkat kepercayaan gejala terlalu rendah
                </p>
            <?php }?>
        </div><!--box body-->
    </div><!--box-->



        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

</body>
</html>