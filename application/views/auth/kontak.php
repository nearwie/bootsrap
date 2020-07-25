
    <!-- Outer Row -->
    <div class="row">
    <div class="col"> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
      <a class="navbar-brand" href="#">Sistem Pakar GSR HimawariCast</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav" class="align ">
         
          <a class="nav-item nav-link" href="<?= base_url('auth/petunjuk');?>">Petunjuk</a>
          <a class="nav-item nav-link" href="<?= base_url('auth/registration');?>">Daftar</a>
          <a class="nav-item nav-link" href="<?= base_url('auth/kontak');?>">Kontak</a>
        </div>
      </div>
      </div>
    </nav>
    </div>
    </div>
  <div class="container">
   <div class="row justify-content-center">
    

      <div class="col-lg-10">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            
              <div class="container">
                <div class="row mb-4 pt-4">
                  <div class="col text-center">
                    <h1 class="text-center font-weight-bold text-primary">Contact</h1>
                  </div>
                </div>

                <div class="row justify-content-center">
                  <div class="col-lg-4">
                    <div class="card text-white bg-info mb-3">
                      <div class="card-body">
                        <h5 class="card-title text-center">Profile</h5>
                        <div class="container text-center">
                         
                           <img class="card-img-top" src="<?= base_url('assets/img/profile/dwirizky.jpeg');?>" alt="Card image cap">


                          <p class="lead">Dwi Rizky Aprillia - Jurusan Instrumentasi MKG.</p>
                        </div>
                      </div>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item "><h5 class="text-center text-primary">Location</h5></li>
                      <li class="list-group-item">Jl. Perhubungan I No.05, Pondok Betung, Pondok Aren, Tangerang Selatan</li>
                      <li class="list-group-item">Banten, Indonesia</li>
                    </ul>
                  </div>
                  <div class="col-lg-6">
                    <hr class="bg-light">
                     <h5 class="card-title text-center text-primary">Send Via Email</h5>
                      <hr class="bg-light">
                      <?= $this->session->flashdata('msg'); ?>
                      <form action="<?= base_url('auth/kontak') ?>" method="post" id="form-box" class="p-2">
                        <div class="form-group input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                          </div>
                          <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                          </div>
                          <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-at"></i></span>
                          </div>
                          <input type="text" name="subject" class="form-control" placeholder="Enter subject" required>
                        </div>
                        <div class="form-group input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-comment-alt"></i></span>
                          </div>
                          <textarea name="message" id="message" class="form-control" placeholder="Write your message" cols="30" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                          <input type="submit" name="submit" id="submit" class="btn btn-primary btn-block" value="Send">
                        </div>
                      </form>
                    
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  
