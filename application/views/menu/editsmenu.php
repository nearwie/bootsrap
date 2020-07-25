<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    
      <form action="<?= base_url('submenu/edit/'.$sm['id']);?>" method="post">
        <div class="form-group row">
          <input type="hidden" name="id" value="<?php echo $sm['id'] ?>">
          <label for="title" class="col-sm-2 col-form-label">Sub Menu</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" placeholder="submenu" value="<?php echo $sm['title'] ?>" >
          </div>
        </div>
        <div class="form-group row">
            <label for="menu_id" class="col-sm-2 col-form-label">Menu</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="menu_id" name="menu_id" placeholder="menuid" value="<?php echo $sm['menu_id'] ?>" >
          </div>
        </div>
        <div class="form-group row">
          <label for="url" class="col-sm-2 col-form-label">Url</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="url" name="url" placeholder="url" value="<?php echo $sm['url'] ?>">
          </div>
        </div>
         <div class="form-group row">
          <label for="icon" class="col-sm-2 col-form-label">Icon</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="icon" value="<?php echo $sm['icon'] ?>" >
          </div>
        </div>
        
        <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                  <label class="form-check-label" for="is_active" readonly>
                    Aktif
                  </label>
              </div>
        </div>
        
        
        <div class="form-group row">
          <div class="col-sm-10">
            <button href="" type="submit" name="submit" value="Edit sm" class="btn btn-primary">Simpan</button>
            <button href="<?= base_url('submenu/index') ?>" type="submit" class="btn btn-primary">Kembali</button>
          </div>
        </div>
      </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      