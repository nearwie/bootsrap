
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
        



          <div class="row ">
          	<div class="col-lg">

          		<?= form_error('menu', '<div class="alert alert-danger" role="alert">Kolom menu wajb diisi!</div>'); ?>
          		<?php if (validation_errors()) :?>
          			<div class="alert alert-danger" role="alert">
          				<?= validation_errors(); ?>
          			</div>
          		<?php endif; ?>



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
			                <a href="" data-toggle="modal" data-target="#newSubMenuModal" class="btn btn-outline-success" >
			                    <span class="icon">
			                        <i class="fa fa-plus"></i>
			                    </span>
			                    <span class="text">
			                        Tambah Submenu Baru
			                    </span>
			                </a>
			            </div>
			        </div>
			    </div>

          		 <div class="card-body">	
          		<table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
				  <thead>
				    <tr>
				      <th scope="col" style="text-align: center;">#</th>
				      <th scope="col" style="text-align: center;">Opsi</th>
				      <th scope="col" style="text-align: center;">Sub Menu</th>
				      <th scope="col" style="text-align: center;">Menu</th>
				      <th scope="col" style="text-align: center;">Url</th>
				      <th scope="col" style="text-align: center;">Ikon</th>
				      <th scope="col" style="text-align: center;">Aktif</th>
				      
				      
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1 + $this->uri->segment(3);  ?>
				  	<?php foreach ($subMenu as $sm) :?>

				    <tr>
				      <th scope="row"><?= $i++;?></th>
				      <td nowrap>
				      	
				      	<a href="<?php echo base_url('submenu/edit/'.$sm['id']) ?>" class="badge badge-success" > Ubah <i class="fas fa-edit"></i></a>

				     


				      	<a href="<?php echo base_url('submenu/delete/'.$sm['id']) ?>" onclick="javascript: return confirm('Apakah yakin menghapus')" class="badge badge-danger"><i class="fas fa-trash-alt"></i> Hapus</a>

				      </td>
				      <td><?= $sm['title'];?></td>
				      <td><?= $sm['menu'];?></td>
				      <td><?= $sm['url'];?></td>
				      <td><?= $sm['icon'];?></td>
				      <td style="text-align: center;"><?= $sm['is_active'];?></td>
				      
				    </tr>
				    
					<?php endforeach; ?>
				  </tbody>
				</table>
			

				</div>
				
				</div>
				</div>
				</div>
          	</div>
          </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- MODAL -->

<!-- Modal ADD-->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Menu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"> </span>
        </button>
      </div>
      <form  action="<?= base_url('submenu');?>" method="post" >
	      <div class="modal-body">
		        <div class="form-group">
				    <input type="text" class="form-control" id="title" name="title" placeholder="Nama submenu baru" >
				</div>
				<div class="form-group">
				    <select name="menu_id" id="menu_id" class="form-control">
				    	<option value="">Select menu</option>
				    	<?php foreach ($menu as $m) :?>
				    		<option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
				    	<?php endforeach; ?>
				    </select>
				</div>
				<div class="form-group">
				    <input type="text" class="form-control" id="url" name="url" placeholder="Url submenu baru">
				</div>
				<div class="form-group">
				    <input type="text" class="form-control" id="icon" name="icon" placeholder="Ikon submenu baru">
				</div>
				<div class="form-group">
				    <div class="form-check">
					  <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
					  <label class="form-check-label" for="is_active">
					    Aktif
					  </label>
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


