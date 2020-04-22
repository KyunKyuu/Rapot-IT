

       <!-- Begin Page Content -->
        <div class="container-fluid">

           <!-- Page Heading -->
         
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
           <?= form_error('siswa', '<div class="alert alert-danger" role="alert">','</div>');  ?>
            	<?= $this->session->flashdata('message'); ?>
                <div class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-fw fa-users"></i>
                    </span>
                    <span class="text"><strong><?= $title; ?></strong></span>
                  </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Nis</th>
                      <th>Mengajar</th>
                      <th>Date Created</th>
                 
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Nis</th>
                      <th>Mengajar</th>
                      <th>Date Created</th>
                
                      
                      
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php $i=1; ?>
                  	<?php foreach($guru as $gr) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $gr['name']; ?></td>
                      <td><?= $gr['nisnip']; ?></td>
                      <td><?= $gr['mapel']; ?></td>
                      <td><?= date('d F Y', $gr['date_created']); ?></td>
                     
                     
                    </tr>
                <?php endforeach; ?>
                     </tbody>
                </table>
              </div>
            </div>
          </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Button trigger modal -->


</div>


