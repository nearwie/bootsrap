
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          



          <div class="row ">
          	<div class="col-lg">

          		<?= form_error('user', '<div class="alert alert-danger" role="alert">Kolom menu wajb diisi!</div>'); ?>
          		<?php if (validation_errors()) :?>
          			<div class="alert alert-danger" role="alert">
          				<?= validation_errors(); ?>
          			</div>
          		<?php endif; ?>



          		<?= $this->session->flashdata('message'); ?>

          		<div class="container">
          			<div class="card shadow mb-4">
		            	<div class="card-header py-3">
		              <h6 class="m-0 font-weight-bold text-success"><?= $title; ?></h6>
		            </div>
		         <div class="card-body">
          		<div class="table-responsive">
          		<table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
				  <thead>
				    <tr>
				      <th scope="col" style="text-align: center;">#</th>
				      <th scope="col" style="text-align: center;">Nama</th>
				      <th scope="col" style="text-align: center;">Email</th>
				      <th scope="col" style="text-align: center;">Last Login</th>
				      <th scope="col" style="text-align: center;">Nomor HP</th>
				      <th scope="col" style="text-align: center;">Akses</th>
				      <th scope="col" style="text-align: center;">Password</th>
				      <th scope="col" style="text-align: center;">Aktif</th>
				      <th scope="col" style="text-align: center;">Member</th>
				      <th scope="col" style="text-align: center;">Opsi</th>
				      
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>
				  	<?php foreach ($users as $u) :?>
				    <tr>
				      <th scope="row" style="text-align: center;"><?= $i;?></th>
				      <td><?= $u['name'];?></td>
				      <td><?= $u['email'];?></td>
				      <td><?= $u['last_login'];?></td>
				      <td><?= $u['nomor'];?></td>
				      <td style="text-align: center;"><?= $u['role_id'] == 1 ? "admin" : "user";?></td>
				      <td><?= $u['password'];?></td>
				      <td style="text-align: center;"><?= $u['is_active'];?></td>
				      <td style="text-align: center;"><?php date_default_timezone_set('Asia/Jakarta'); ?><?= date ('d F Y, H:i:s', $u['date_created']); ?></td>
				      <td style="text-align: center;">
				      	
				      	<a href="<?php echo base_url('pengguna/edit/'.$u['id']) ?>" class="badge badge-success" > Ubah <i class="fas fa-edit"></i></a>

				      		<?php echo '|' ?>

				      	<a href="<?php echo base_url('pengguna/delete/'.$u['id']) ?>" onclick="javascript: return confirm('Apakah yakin menghapus')" class="badge badge-danger"><i class="fas fa-trash-alt"></i> Hapus</a>

				      </td>
				    </tr>
				    <?php $i++; ?>
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

