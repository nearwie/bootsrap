
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
          <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
          <div class="row">
            <div class="col-lg-6">

              <?= form_error('name', '<div class="alert alert-danger" role="alert">Kolom nama wajib diisi!</div>'); ?>

              <?= $this->session->flashdata('message'); ?>

                           
            </div>
          </div>
          <div class="card mb-3 col-lg-8" >
            <div class="row no-gutters">
              <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/'). $user['image']; ?>" class="card-img">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $user['name']; ?></h5>
                  <p class="card-text"><?= $user['email']; ?></p>
                  <p class="card-text"><small class="text-muted">Member since <?= date ('d F Y', $user['date_created']); ?></small>
                    <br>
                    <br>
                     <a href="" class="btn btn-primary mb-3"  data-toggle="modal" data-target="#newEditProfile"> Edit Profile <i class="fas fa-edit"></i></a>


                     
                  </p>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<!-- Modal -->
<div class="modal fade" id="newEditProfile" tabindex="-1" role="dialog" aria-labelledby="newEditProfileLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newEditProfileLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  action="<?= base_url('user/profile') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group">
              <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email'];?>" readonly >
        </div>
        
        <div class="form-group">
             <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'];?>">

              
        </div>

        <div class="form-group" >
          <label for="image">Gambar</label>
          <div class="row">
              <div class="col-sm-3">
                <img src="<?= base_url('assets/img/profile/'). $user ['image'];?>" class="img-thumbnail">
              </div>
              <div class="col-sm-9">
                <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image">
                <label class="custom-file-label" for="image">Choose file</label>
                </div>
              </div>
          </div>
        </div>
      
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" value="upload" name="upload" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
