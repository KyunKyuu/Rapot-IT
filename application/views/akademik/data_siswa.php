

       <!-- Begin Page Content -->
        <div class="container-fluid">

           <!-- Page Heading -->
         
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

            <div class="card-header py-3">
           <?= form_error('siswa', '<div class="alert alert-danger" role="alert">','</div>');  ?>
            	<?= $this->session->flashdata('message'); ?>
                <div class="btn btn-danger btn-icon-split">
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
                      <th>Kelas</th>
                      <th>Date Created</th>
                    
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Nis</th>
                      <th>Kelas</th>
                      <th>Date Created</th>
                 
                      
                      
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php $i=1; ?>
                  	<?php foreach($siswa as $sw) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $sw['name']; ?></td>
                      <td><?= $sw['nisnip']; ?></td>
                      <td><?= $sw['kelas']; ?>-<?= $sw['jurusan']; ?></td>
                      <td><?= date('d F Y', $sw['date_created']); ?></td>
                      
                     
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


<div class="modal fade" id="siswaModal" tabindex="-1" role="dialog" aria-labelledby="siswaModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MenuModal"> Edit Data Siswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('data_siswa') ?>" method="post">
          <input type="hidden" name="id" id="id">
        	<div class="form-group">
        		<label for="menu">Menu</label>
        		<input type="text" name="menu" class="form-control" id="menu">
        		
        	</div>

       </form>
    </div>
  </div>
</div>
</div>
</div>


