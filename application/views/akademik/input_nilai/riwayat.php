

       <!-- Begin Page Content -->
        <div class="container-fluid">

           <!-- Page Heading -->
         
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
    
                <div class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-fw fa-history"></i>
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
                      <th>Kelas</th>
                      <th>Mapel</th>
                      <th>Upload By</th>
                      <th>Date Upload</th>
                      <th>Status</th>
                  
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Kelas</th>
                      <th>Mapel</th>
                      <th>Upload By</th>
                      <th>Date Upload</th>
                      <th>Status</th>
                      
                      
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php $i=1; ?>
                  	<?php foreach($riwayat as $rw) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $rw['kelas']; ?></td>
                      <td><?= $rw['mapel']; ?></td>
                      <td><?= $rw['upload_by']; ?></td>
                      <td><?= date('d F Y', $rw['date_upload']); ?></td>
                      
                     
                     
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


