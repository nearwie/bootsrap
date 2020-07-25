<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    
      <form action="<?= base_url('aturan/edit/'.$ru['id']);?>" method="post">
        <div class="form-group row">
          <input type="hidden" name="id" value="<?php echo $ru['id'] ?>">
          <label for="kode_rule" class="col-sm-2 col-form-label">Kode</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="kode_rule" name="kode_rule" placeholder="kode" value="<?php echo $ru['kode_rule'] ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <input type="hidden" name="id" value="<?php echo $ru['id'] ?>">
          <label for="gejala_id" class="col-sm-2 col-form-label">Gejala</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="gejala_id" name="gejala_id" placeholder="gejala" value="<?php echo $ru['gejala_id'] ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
            <label for="kerusakan_id" class="col-sm-2 col-form-label">Kerusakan</label>
          <div class="col-sm-10">
            <input type="textarea" class="form-control" id="kerusakan_id" name="kerusakan_id" placeholder="kerusakan" value="<?php echo $ru['kerusakan_id'] ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="mb" class="col-sm-2 col-form-label">Mb</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="mb" name="mb" placeholder="mb" value="<?php echo $ru['mb'] ?>">
          </div>
        </div>
         <div class="form-group row">
          <label for="md" class="col-sm-2 col-form-label">md</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="md" name="md" placeholder="md" value="<?php echo $ru['md'] ?>" >
          </div>
        </div>
        
        <div class="form-group row">
          <div class="col-sm-10">
            <button href="" type="submit" name="submit" value="Edit" class="btn btn-primary">Simpan</button>
            
          </div>
        </div>
      </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      