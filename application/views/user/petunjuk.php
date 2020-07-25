
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <div class="alert alert-info">
			<h3>Selamat Datang <?php echo $this->session->userdata('name')?></h3>
			<p align="justify"> Sistem pakar ini dibangun untuk membantu pengguna ataupun teknisi dalam mengidentifikasi permasalahan atau gangguan kerusakan pada peralatan Ground Satellite Receiver.</p>
			</div>

			<div class="alert alert-warning">
				<h3>Cara Menggunakan Sistem Pakar Troubleshooting GSR</h3>
				<p align="justify">
				  1. Pilih Submenu "Konsultasi" untuk memulai proses diagnosa <br>	
				  2. Pilih gejala dengan mencentang option button pada sisi kiri sesuai dengan kondisi peralatan GSR yang ada dilapangan. <br>
				  3. Setelah Inputkan data gejala dengan benar, kemudian klik tombol "Submit" untuk melanjutkan ke tahap berikutnya. <br>
				  4. Maka, Hasil diagnosa kerusakan beserta solusi dan kepercayaan (CF)akan ditampilkan. <br>
				  5. Pada tahapan akhir diagnosa terdapat tombol"Cetak" untuk mencetak hasil diagnosa dalam bentuk pdf dan tombol "Kosultasi ulang" untuk kembali ke halaman konsultasi.
				  </p>
			</div>

			<div class="alert alert-success">
				<h3>Kebijakan Pengguna Aplikasi</h3>
				<p align="justify">
				  1. Jaga Keamanan Username dan Password <br>	
				  2. Isi data dengan kebenaran <br>
				  3. Lakukan Logout sebelum keluar 
				  </p>
			</div>


			 <p class="text-center"><a class="btn btn-warning btn-md" href="<?php echo site_url('konsul')?>" role="button">Mulai Konsultasi</a></p>
          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      