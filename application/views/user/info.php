  <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <hr>
          <h5 align="center">Daftar Istilah</h5>
          <br>
          <br>

          <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <td scope="col">Citra satelit</td>
                <td scope="col">gambar kenampakan permukaan bumi atau fenomena di atmosfer yang
diperoleh dengan oleh alat pemindai / sensor pada satelit yang mengorbit di atas bumi</td>
              </tr>
            </thead>
            <tbody>
              <tr>
               
                <td>CSV </td>
                <td>CSV (Comma-Separated Values)format file yang menyimpan data dalam format
tabular/tabel (angka dan teks) dalam bentuk teks datar (plain-text). Sehingga file akan
mudah dibacaa (misalnya dengan editor teks). CSV adalah format file sederhana yang
banyak didukung oleh aplikasi konsumen, bisnis, dan ilmiah. Diantara kegunaannya yang
umum adalah untuk memindahkan data tabular antar program-program yang secara
alami beroperasi pada format proprietary yang lebih efisien / lengkap. Sebagai contoh:
sebuah file CSV dapat digunakan untuk mentransfer informasi dari sebuah program
database untuk spreadsheet.</td>
                
              </tr>
            
            </tbody>
                        <thead>
              <tr>
                <td scope="col">SATAID</td>
                <td scope="col">SATAID (Satellite Animation and Interactive Diagnosis) satu set perangkat lunak CAL
(Computer-Aided Learning) untuk MS-Windows yang memungkinkan penggunaan
berbagai data meteorologi dengan fokus pada citra satelit. Bagian inti dari sistem
SATAID adalah GMSLPW (program display) dan LRITAPL (program menu). Ada beberapa
varian program SATAID seperti GMSLPD, yang khusus untuk analisis siklon tropis.</td>
              </tr>
            </thead>
            <tbody>
              <tr>
               
                <td>FTP</td>
                <td>FTP (File Transfer Protocol) protokol jaringan standar yang digunakan untuk
mentransfer file dari satu host ke host lain melalui jaringan berbasis TCP, seperti
Internet. FTP dibangun di atas arsitektur server-client dan menggunakan kontrol koneksi
data yang terpisah antara klien dan server. Pengguna FTP dapat mengotentikasi sendiri
menggunakan protokol teks -sign-in yang jelas tetapi dapat juga terhubung secara
anonim jika server dikonfigurasi untuk itu</td>
                
              </tr>
            
            </tbody>
            <thead>
              <tr>
                <td scope="col">Certainty Factor</td>
                <td scope="col">gambar kenampakan permukaan bumi aFaktor kepastian (certainty factor) merupakan ukuran kepastian terhadap suatu fakta atau aturan. Ada dua macam faktor kepastian yang digunakan, yaitu faktor kepastian yang diisikan oleh pakar bersama dengan aturan dan faktor kepastian yang diberikan pengguna.  </td>
              </tr>
            </thead>
            <tbody>
              <tr>
               
                <td>CSV </td>
                <td>CSV (Comma-Separated Values)format file yang menyimpan data dalam format
tabular/tabel (angka dan teks) dalam bentuk teks datar (plain-text). Sehingga file akan
mudah dibacaa (misalnya dengan editor teks). CSV adalah format file sederhana yang
banyak didukung oleh aplikasi konsumen, bisnis, dan ilmiah. Diantara kegunaannya yang
umum adalah untuk memindahkan data tabular antar program-program yang secara
alami beroperasi pada format proprietary yang lebih efisien / lengkap. Sebagai contoh:
sebuah file CSV dapat digunakan untuk mentransfer informasi dari sebuah program
database untuk spreadsheet.</td>
                
              </tr>
            
            </tbody>
            <thead>
              <tr>
                <td scope="col">MB</td>
                <td scope="col">Ukuran kepercayaan (measure of belief) terhadap hipotesis H yang dipengaruhi oleh gejala E. </td>
              </tr>
            </thead>
            <tbody>
              <tr>
               
                <td>MD </td>
                <td>Ukuran ketidakpercayaan (measure of disbelief) terhadap hipotesis H yang dipengaruhi oleh gejala E.</td>
                
              </tr>
            
            </tbody>
            <thead>
              <tr>
                <td scope="col">H</td>
                <td scope="col">Hipotesis (konklusi) </td>
              </tr>
            </thead>
            <tbody>
              <tr>
               
                <td>E </td>
                <td>Evidence (Peristiwa atau fakta)</td>
                
              </tr>
            
            </tbody>
          </table>
        </div>

          <hr>
          <h5 align="center">Komponen-Komponen GSR HimawariCast</h5>
          <br>
          <br>
          <div class="row mb-4">
            <div class="col-md">
              <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/img/thumbs/cb.jpg');?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Antena</h5>
                  <p class="card-text">Antena berfungsi   sebagai penerima gelombang radio elektromagnetik.</p>
                </div>
              </div>
            </div>
            <div class="col-md">
              <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/img/thumbs/2.jpg');?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">LNB</h5>
                  <p class="card-text">LNB berfungsi mengubah energi transmisi menjadi sinyal elektrik.</p>
                </div>
              </div>
            </div>
            <div class="col-md">
              <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/img/thumbs/3.jpg');?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">DVB-S2</h5>
                  <p class="card-text">sebagai receiver untuk mengetahui parameter C/N dan BER.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md">
              <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/img/thumbs/pc.jpg');?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">PC Server </h5>
                  <p class="card-text">berfungsi mengambil, mengumpulkan, menyiapkan data dan pengontrolan data. </p>
                </div>
              </div>
            </div>
            <div class="col-md">
              <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/img/thumbs/csc.jpg');?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Cisco 800 series</h5>
                  <p class="card-text">Cisco berfungsi untuk menghubungkan dan mengijinkan komunikasi antara dua jaringan.</p>
                </div>
              </div>
            </div>
            <div class="col-md">
              <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/img/thumbs/kabel.jpg');?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Media transmisi</h5>
                  <p class="card-text">sebagai media melakukan pengiriman data dari salah satu sumber data ke penerima data.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md">
              <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/img/thumbs/hb.jpg');?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Hub</h5>
                  <p class="card-text">Hub berfungsi menghubungkan kabel-kabel network antar tiap workstation atau server.  </p>
                </div>
              </div>
            </div>
            <div class="col-md">
              <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/img/thumbs/pc.jpg');?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">PC Data dan Citra Satelit</h5>
                  <p class="card-text">sebagai komputer yang digunakan untuk mengolah data yang diambil dari server.</p>
                </div>
              </div>
            </div>
            <div class="col-md">
              <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/img/thumbs/apc.jpg');?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">UPS</h5>
                  <p class="card-text">sebagai penyuplai tenaga listrik ketika sumber tenaga listrik utama lepas dari system.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-md">
              <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/img/thumbs/ovp.jpg');?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">OVP</h5>
                  <p class="card-text">berfungsi mengatur voltase otomatis untuk melindungi peralatan elektronik terhadap gangguan listrik dan tegangan berlebih.  </p>
                </div>
              </div>
            </div>
             <div class="col-md">
              <div class="card">
                <img class="card-img-top" src="<?= base_url('assets/img/thumbs/sata.jpg');?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">SATAID</h5>
                  <p class="card-text">Software yang digunakan menganalisis dan memantau parameter cuaca dan fenomena untuk layanan meteorologi .</p>
                </div>
              </div>
            </div>
            


      </div>



        </div>