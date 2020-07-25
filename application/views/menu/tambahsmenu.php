<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    
      <form action="<?= base_url('alat/tambah');?>" method="post">
      
        <div class="form-group row">
          
            <label for="title" class="col-sm-2 col-form-label">Nama Submenu</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="title" name="title" placeholder="Nama submenu baru" value="<?= set_value('title')?>" >
            <?= form_error('title', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="menu_id" class="col-sm-2 col-form-label">Menu</label>
          <div class="col-sm-10">
            <select name="menu_id" id="menu_id" class="form-control">
              <option value="">Select menu</option>
              <?php foreach ($menu as $m) :?>
                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
           <div class="form-group row">
            <label for="url" class="col-sm-2 col-form-label">URL</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="url" name="url" placeholder="Url submenu baru" value="<?= set_value('url')?>"> <?= form_error('url', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="icon" class="col-sm-2 col-form-label">Icon</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="Ikon submenu baru" value="<?= set_value('icon')?>"> <?= form_error('icon', '<small class="text-danger pl-3">', '</small>');?>
          </div>
        </div>
           <div class="form-group row">
            <label for="is_active" class="col-sm-2 col-form-label">Aktif</label>
             <div class="form-check-10">
                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
            </div>
         </div>
           
        
        <div class="form-group row">
          <div class="col-sm-10">
            <button href="" type="submit" name="submit" value="edit" class="btn btn-success">Simpan </button>
          </div>
        </div>
      </form>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

      