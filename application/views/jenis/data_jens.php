<!-- Begin Page Content -->
 <div class="container-fluid">
       <div class="row justify-content-center">

        
			<div class="col-md-8">
				  <?= $this->session->flashdata('pesan'); ?>
				  <?= $this->session->flashdata('message'); ?>

			<div class="card shadow-sm border-bottom-success">
			    <div class="card-header bg-white py-3">
			        <div class="row">
			            <div class="col">
			                <h1 class="h5 align-middle m-0 font-weight-bold text-success">
			                    Data Jenis
			                </h1>
			            </div>
			            <div class="col-auto">
			                <a href="<?= base_url('jenis/add_jenis') ?>" class="btn btn-outline-primary">
			                    <span class="icon">
			                        <i class="fa fa-plus"></i>
			                    </span>
			                    <span class="text">
			                        Tambah Jenis Barang
			                    </span>
			                </a>
			            </div>
			        </div>
			    </div>
			    
			    <div class="card-body">
			    <div class="table-responsive">
			        <table class="table table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
			            <thead>
			                <tr>
			                    <th>No. </th>
			                    <th>Nama Jenis</th>
			                    <th>Opsi</th>		
			                </tr>
			            </thead>
			            <tbody>
			                <?php
			                $no = 1;
			                if ($jeniss) :
			                    foreach ($jeniss as $j) :
			                        ?>
			                        <tr>
			                            <td><?= $no++; ?></td>
			                            <td><?= $j['nama_jenis']; ?></td>
			                            <td>
			                                <a href="<?= base_url('jenis/edit/') . $j['id_jenis'] ?>" class="btn btn-warning btn-circle btn-sm">
			                                	<i class="fa fa-edit"></i></a>
                                			<a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('jenis/delete/') . $j['id_jenis'] ?>" class="btn btn-danger btn-circle btn-sm">
                                				<i class="fa fa-trash"></i></a>
			                            </td>
			                        </tr>
			                    <?php endforeach; ?>
			                <?php else : ?>
			                    <tr>
			                        <td colspan="8" class="text-center">
			                            Data Kosong
			                        </td>
			                    </tr>
			                <?php endif; ?>
			            </tbody>
			        </table>
			    </div>
			  </div>
			</div>
			</div>
			
        
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     