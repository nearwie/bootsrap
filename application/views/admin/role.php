
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
			                <a href="" class="btn btn-outline-success"  data-toggle="modal" data-target="#newRoleModal">
			                    <span class="icon">
			                        <i class="fa fa-plus"></i>
			                    </span>
			                    <span class="text">
			                        Tambah Level Akses Baru
			                    </span>
			                </a>
			            </div>
			        </div>
			    </div>
			    

          		<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Level Akses</th>
				      <th scope="col">Opsi</th>
				      
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($role as $r) :?>
				    <tr>
				      <th scope="row"><?= $i;?></th>
				      <td><?= $r['role'];?></td>
				      <td>
				      	<a href="<?= base_url('admin/roleaccess/'). $r['id'];?>" class="badge badge-warning"><i class="fas fa-vote-yea"></i> Akses</a>
				      

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

<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModalLabel">Tambah Role Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  action="<?= base_url('admin/role');?>" method="post" >
	      <div class="modal-body">
		        <div class="form-group">
				    <input type="text" class="form-control" id="role" name="role" placeholder="Role baru">
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
	        <button type="submit" class="btn btn-success">Simpan</button>
      	</div>
      </form>
    </div>
  </div>
</div>
