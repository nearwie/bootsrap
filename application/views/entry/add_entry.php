
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


		  <form  action="<?= base_url('entry/add_entry');?>" method="post" enctype="multipart/form-data">
          <div class="row">
				<div class='col-sm-3'>

					 <label for="tanggal" >Tanggal<code> *</code> </label>
				      <div class="input-group">
				        <div class="input-group-prepend" id="tggl" >
				          <div class="input-group-text"><span><i class="fa fa-fw fa-calendar"></i></span></div>
				        </div>
				        <input type="text" class="form-control" id="tggl" placeholder="DD/MM/YYYY">
				      </div>
				</div>




				<div class='col-sm-3'>
					<div class='form-group'>
						<label for="jenis_pkj">Jenis Pekerjaan<code> *</code> </label>
						<select name="jenis_pkj" class="form-control input-sm">
							<option value="">Pilih Jenis Pekerjaan</option>
							<option value="pengecekan">Pengecekan</option>
							<option value="pemeliharaan">Pemeliharaan</option>
							<option value="perbaikan">Perbaikan</option>
							<option value="laporan kerusakan">Laporan Kerusakan</option>
						</select>
					</div>
				</div> 

				<div class='col-sm-3'>
					<div class='form-group'>
						<label for="barang_id">Alat / Barang <code> *</code> </label>
						 <select name="barang_id" id="barang_id" class="custom-select">
		                        <option value="" selected disabled>Pilih Barang</option>
		                            <?php foreach ($barangs as $b) : ?> 
		                                 <option value="<?= $b['kode_brg'] ?>"><?=  $b['nama_brg'] ?></option>
		                            <?php endforeach; ?>
		                   </select>
					</div>
				</div> 

				<div class='col-sm-3'>
					<div class='form-group'>
						<label for="petugas">Petugas</label>
						<input id="petugas"  name="petugas" class="form-control input-sm " type="text" placeholder="" value="<?= $user['id']; ?> " hidden></input>
					
						<input id="petugas"  name="petugas" class="form-control input-sm " type="text" placeholder="" value="<?= $user['name']; ?> " readonly="readonly" disabled></input>
					</div>
				</div>

				

				<div class='col-sm-8'>
					<div class='form-group'>
						<label for="jadwal_dns">Jadwal Dinas<code> *</code> </label>
						 <div class="col-sm-10">
						<div class="form-check form-check-inline ">
						  <input class="form-check-input" type="radio" name="regular" id="regular" value="regular">
						  <label class="form-check-label" for="regular">Regular</label>
						</div>
						<div class="form-check form-check-inline ">
						  <input class="form-check-input" type="radio" name="pd" id="pd" value="pengolahan data">
						  <label class="form-check-label" for="pd">Pengolahan Data</label>
						</div>
						<div class="form-check form-check-inline ">
						  <input class="form-check-input" type="radio" name="pagi" id="pagi" value="pagi">
						  <label class="form-check-label" for="pagi">Pagi</label>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="radio" name="siang" id="siang" value="siang">
						  <label class="form-check-label" for="pagi">Siang</label>
						</div>
					</div>
				</div> 


					<div class="form-group">
					    <label for="keterangan">Uraian Kegiatan / Keterangan<code> *</code></label>
					    <textarea class="form-control" id="keterangan" rows="3"></textarea>
					 </div>
				
					<div class='form-group'>
						<label for="image">Upload Gambar / Media</label>
					
						 <input type="file" name="image" class="dropify">

					</div>


					<div class="form-group row">
			          <div class="col-sm-10">
			            <button type="submit"  class="btn btn-outline-success">Simpan </button>
			          </div>
			        </div>
				
					 
					  	
		               
		               

		               </div>
		               
		            </div>




				</div> 




				
			</div>

			




		 </div>
       </div>
       </form>
          	
				
				
				</div>
          	</div>
          </div>
          </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

