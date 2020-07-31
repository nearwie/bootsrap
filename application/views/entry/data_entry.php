<!-- Begin Page Content -->
        <div class="container-fluid">

          <?= $this->session->flashdata('message'); ?>
			

			<div class="card shadow-sm border-bottom-success">
			    <div class="card-header bg-white py-3">
			        <div class="row">
			            <div class="col">
			                <h1 class="h5 align-middle m-0 font-weight-bold text-success">
			                    Riwayat Entry Log-Book
			                </h1>
			            </div>
			            <div class="col-auto">
			                <a href="<?= base_url('entry/add_entry') ?>" class="btn btn-outline-success">
			                    <span class="icon">
			                        <i class="fa fa-plus"></i>
			                    </span>
			                    <span class="text">
			                        Tambah Entry Log-Book
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
			                    <th>Tanggal</th>
			                    <th>Waktu</th>
			                    <th>Petugas</th>
			                    <th>Jenis Pekerjaan</th>
			                    <th>Jadwal Dinas</th>
			                    <th>Keterangan</th>
			                    <th>Image</th>
			                </tr>
			            </thead>
			            <tbody>
			                <?php
			                $no = 1;
			                if ($entrydt) :
			                    foreach ($entrydt as $bm) :
			                        ?>
			                        <tr>
			                            <td><?= $no++; ?></td>
			                            <td><?= $bm['id_barang_masuk']; ?></td>
			                            <td><?= $bm['tanggal_masuk']; ?></td>
			                            <td><?= $bm['nama_brg']; ?></td>
			                            <td><?= $bm['nama_jenis']; ?></td>
			                            <td><?= $bm['jumlah_masuk'] . ' ' . $bm['nama_satuan']; ?></td>
			                            <td><?= $bm['name']; ?></td>
			                            <td>
			                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('barangmasuk/delete/') . $bm['id_barang_masuk'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
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
			
        
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     