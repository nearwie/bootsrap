
        <!-- Begin Page Content -->
        <div class="container-fluid">
        	<div class="card mb-4 py-3 border-left-success">
                <div class="card-body">
         <div class="alert alert-dark"> <strong>Identitas Stasiun</strong> 
			 
			</div>


          <!-- Page Heading -->
          <form  action="<?= base_url('submenu');?>" method="post" >
          <div class="row">
				<div class='col-sm-4'>
					<div class='form-group'>
						<label for="id_stasiun">ID Stasiun</label>
						<input id="id_stasiun"  name="id_stasiun" class="form-control input-sm required nik" type="text" placeholder="ID Stasiun" value=""></input>
						<input name="nik_lama" type="hidden" value=""/>
					</div>
				</div>
				<div class='col-sm-8'>
					<div class='form-group'>
						<label for="nama">Nama Stasiun <code> (Tanpa Nama Alat) </code> </label>
						<input id="nama" name="nama" class="form-control input-sm required" type="text" placeholder="Nama Lengkap" value=""></input>
					</div>
				</div>
				<div class='col-sm-12'>
					<div class='form-group'>
						<label for="nama">Status Stasiun </label>
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead class="bg-gray disabled color-palette">
									<tr>
										<th width='25%'>Tipe Stasiun</th>
										<th>Tahun Pasang</th>
										<th>Kondisi Alat</th>
										<th>Kirim Data</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td width='25%'>
											<select name="ktp_el" class="form-control input-sm">
											<option value="">Pilih Tipe Stasiun</option>
											
											  <option value=""><?= strtoupper($nama)?></option>
								
										  </select>
										</td>
										<td>
										  <select name="ktp_el" class="form-control input-sm">
											<option value="">Pilih Tahun</option>
											
											  <option value=""><?= strtoupper($nama)?></option>
								
										  </select>
										</td>
										<td width='25%'>
										  <select name="status_rekam" class="form-control input-sm">
											<option value="">Pilih Kondisi Alat</option>
											
											  <option value="" ></option>
											
										  </select>
										</td>
										<td width='25%'>
										  <select name="status_rekam" class="form-control input-sm">
											<option value="">Pilih Kirim Data</option>
											
											  <option value="" ></option>
											
										  </select>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="alert alert-dark"> <strong>Data Geografis</strong> 
			</div>
			<div class='col-sm-4'>
					<div class='form-group'>
						<label for="prov">Provinsi</label>
						<select  name="prov" id="prov" class="form-control select2 input-sm required">
							<option value="">Pilih Provinsi</option>
								<?php foreach ($list_provinsi as $m) :?>
				    		<option value="<?= $m['id']; ?>"><?= $m['prov']; ?></option>
				    	<?php endforeach; ?>
						</select>
					</div>
				</div>

				<div class='col-sm-4'>
					<div class='form-group'>
						<label for="prov">Kabupaten/Kota</label>
						<select  name="kab" id="kab" class="form-control select2 input-sm required">
							<option value="">Pilih Kab/Kota</option>
								<?php foreach ($list_kab as $k) :?>
				    		<option value="<?= $k['id']; ?>"><?= $k['kab']; ?></option>
				    	<?php endforeach; ?>
						</select>
					</div>
				</div>
				
				

			




		 </div>
       </div>
       </form>
				
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


