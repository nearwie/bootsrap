<!-- Begin Page Content -->
        <div class="container-fluid">

          <?= $this->session->flashdata('message'); ?>
			<?= $this->session->flashdata('pesan'); ?>

			<div class="card shadow-sm border-bottom-success">
			    <div class="card-header bg-white py-3">
			        <div class="row">
			            <div class="col">
			                <h1 class="h5 align-middle m-0 font-weight-bold text-success">
			                    Riwayat Data Barang Keluar
			                </h1>
			            </div>
			            <div class="col-auto">
			                <a href="<?= base_url('barangkeluar/add') ?>" class="btn btn-outline-success">
			                    <span class="icon">
			                        <i class="fa fa-plus"></i>
			                    </span>
			                    <span class="text">
			                        Input Barang Keluar
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
			                    <th>No Transaksi</th>
			                    <th>Tanggal Masuk</th>
			                    <th>Nama Barang</th>
			                    <th>Jenis Barang</th>
			                    <th>Jumlah Keluar</th>
			                    <th>Petugas</th>
			                    <th>Hapus</th>
			                </tr>
			            </thead>
			            <tbody>
			                <?php
			                $no = 1;
			                if ($barangkeluar) :
			                    foreach ($barangkeluar as $bk) :
			                        ?>
			                        <tr>
			                            <td><?= $no++; ?></td>
			                            <td><?= $bk['id_barang_keluar']; ?></td>
			                            <td><?= $bk['tanggal_keluar']; ?></td>
			                            <td><?= $bk['nama_brg']; ?></td>
			                            <td><?= $bk['nama_jenis']; ?></td>
			                            <td><?= $bk['jumlah_keluar'] . ' ' . $bk['nama_satuan']; ?></td>
			                            <td><?= $bk['name']; ?></td>
			                            <td>
			                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('barangkeluar/delete/') . $bk['id_barang_keluar'] ?>" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
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

     