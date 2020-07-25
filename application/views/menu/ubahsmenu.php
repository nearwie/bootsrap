<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
<form action="<?= base_url('menu/submenu');?>" method="post">
  
<?php   foreach ($menu as $m ) :?>
  
  <div class="form-group row">
    <label for="title" class="col-sm-2 col-form-label">Menu</label>
    <div class="col-sm-10">
      <input type="hidden" class="form-control" value= "<?= $m->id ?>" name="id" >
      <input type="text" class="form-control" id="menu" name="title" placeholder="menu" value= "<?= $m->menu ?>" >
    </div>
  
  <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
  </div>

</form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      