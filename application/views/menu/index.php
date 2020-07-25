
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
        



           <div class="row justify-content-center">
          	<div class="col-lg-8">

          		<?= form_error('menu', '<div class="alert alert-danger" role="alert">Kolom menu wajb diisi!</div>'); ?>



          		<?= $this->session->flashdata('message'); ?>


              <div class="card shadow-sm border-bottom-success">
          <div class="card-header bg-white py-3">
              <div class="row">
                  <div class="col">
                      <h1 class="h5 align-middle m-0 font-weight-bold text-success">
                         <?= $title; ?>
                      </h1>
                  </div>
                  <div class="col-auto">
                      <a href="" class="btn btn-outline-success"  data-toggle="modal" data-target="#newMenuModal">
                          <span class="icon">
                              <i class="fa fa-plus"></i>
                          </span>
                          <span class="text">
                              Tambah Menu Baru
                          </span>
                      </a>
                  </div>
              </div>
          </div>

          		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col" style="text-align: center;">#</th>
				      <th scope="col" style="text-align: center;">Menu</th>
				      <th scope="col" style="text-align: center;">Opsi</th>
				      
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($menu as $m) :?>
				    <tr>
				      <th scope="row" style="text-align: center;" ><?= $i;?></th>
				      <td style="text-align: center;"><?= $m['menu'];?></td>
				      <td style="text-align: center;">
				      	
				      	<a href="<?php echo base_url('menu/editsmenu/'.$m['id']) ?>" data-toggle="modal" data-target="#newEditMenuModal"class="badge badge-success" > Ubah <i class="fas fa-edit"></i></a>
                  

				      	

				      </td>
				    </tr>
				    <?php $i++; ?>
					<?php endforeach; ?>
				  </tbody>
				</table>
          	</div>
          </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- MODAL -->

<!-- Modal ADD -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newMenuModalLabel">Tambah Menu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  action="<?= base_url('menu/create');?>" method="post" >
	      <div class="modal-body">
		        <div class="form-group">
				    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu baru">
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
      	</div>
      </form>
    </div>
  </div>
</div>


<!-- Modal edit -->
<div class="modal fade" id="newEditMenuModal" tabindex="-1" role="dialog" aria-labelledby="newEditMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newEditMenuModalLabel">Edit Menu </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  action="<?= base_url('menu/edit/'.$m['id']);?>" method="post" >
	      <div class="modal-body">
		        <div class="form-group">
		        	<input type="hidden" name="id" value="<?php echo $m['id'] ?>">
				    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu" value="<?php echo $m['menu'] ?>">
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        <button type="submit" class="btn btn-primary">Simpan</button>
      	</div>
      </form>
    </div>
  </div>
</div>
