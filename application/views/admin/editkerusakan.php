<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    
      <form action="<?= base_url('kerusakan/edit/'.$k['id']);?>" method="post">
        <div class="form-group row">
          <input type="hidden" name="id" value="<?php echo $k['id'] ?>">
          <label for="kode_kerusakan" class="col-sm-2 col-form-label">Kode</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="kode_kerusakan" name="kode_kerusakan" placeholder="Kode" value="<?php echo $k['kode_kerusakan'] ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
            <label for="nama_gejala" class="col-sm-2 col-form-label">Kerusakan</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="nama_kerusakan" name="nama_kerusakan" placeholder="Kerusakan" value="<?php echo $k['nama_kerusakan'] ?>" >
          </div>
        </div>
        <div class="form-group row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
          <div class="col-sm-10">
            <textarea rows="13" cols="20" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan" > "<?php echo $k['keterangan'] ?>" </textarea> 
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'keterangan' );
            </script>
          </div>
        </div>
        
        
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" name="submit" value="edit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      