<?php 
if ($data['role_id'] == 1) {
  $status = " Admin";
}elseif ($data['role_id'] == 2) {
  $status = " Siswa";
}else{
  $status = " Guru";
}

 ?>

       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title . $status; ?></h1>
           <div class="row">
          <div class="col-lg-8">
  
          </div>
         </div>
          <div class="card mb-3 col-lg-8">
            <div class="row no-gutters">
              <div class="col-md-3">
              </div>
              <div class="col-md-8">
                  <div class="card-body">
                    <image class="routed-circle shadow" src="<?= base_url('assets/img/profile/') . $data['image']; ?>">
                    <h5 class="card-title"><?= $data['name']; ?></h5>
                    <p class="card-text"><?= $data['email']; ?></p>
                    <?php if ($data['role_id'] == 2) : ?>
                    <p class="card-text"><?= $data['kelas'];?>-<?= $data['jurusan'];?></p>
                    <?php else : ?>
                    <p class="card-text"><?= $data['mapel'];?></p>
                    <?php endif; ?>
                    <p class="card-text"><?= date('d F Y',$data['date_created']);?></p>
                      
                  </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      
