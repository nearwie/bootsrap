<!-- Begin Page Content -->
        <div class="container-fluid">

        	<?php echo form_open()?>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <p style="font-style: bold; color: black; font-size: 14px;"> <strong>Pililah tandaBerilah tanda checklist pada daftar peralatan berikut ini sesuai dengan kondisi peralatan yang sebenarnya. Kemudian pilih tombol "Submit" dibagian paling bawah untuk meyimpan.</strong></p>

          <h6>Nama Lengkap : (<strong><?php echo $this->session->userdata('name')?></strong>)</h6>
          <br>

          <div class="container">
          		<div class="table-responsive">
          		<table class="table table-striped table-bordered table-hover">
				  <thead>
				    <tr>
				      <th scope="col" style="text-align: center;">No</th>
				      <th scope="col" style="text-align: center;">Nama Alat</th>
				      <th scope="col" style="text-align: center;">Keterangan</th>
				      
				      
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1; ?>

				  	<?php $this->load->model(array('Alat_model'));
                    $listAlat = $this->Alat_model->get_alatt_by_id(); ?>
					<?php foreach($listAlat-> result() as $value2):?>
						
				    <tr>
				      <th scope="row" style="text-align: center;"><?= $i;?></th>
				      <td><?php echo $value2->nama_alat?></td>
				      <td><input type="checkbox" name="kondisi[]" value="Baik" >Baik
				      	<input type="checkbox" name="kondisi[]" value="Rusak" >Rusak

				      </td>
				     
				      
				  
				     
				    </tr>
				    <?php $i++; ?>
					<?php endforeach; ?>
				  </tbody>
				</table>
				
				</div>
				</div>

         
		<br>
		<div class="row d-flex justify-content-center">
			<div class="col-md-14" >
				<button id="btn-save" type="submit" class="btn btn-sm btn-success btn-flat pull-right">Submit</button>
			</div>
		</div>
          	
          <?php echo form_close()?>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->