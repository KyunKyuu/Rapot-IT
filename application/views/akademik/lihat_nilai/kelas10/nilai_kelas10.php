

       <!-- Begin Page Content -->
        <div class="container-fluid">

           <!-- Page Heading -->
         
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
                  <a class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-fw fa-print"></i>
                    </span>
                    <span class="text" style="color: white;"><strong>Cetak Nilai</strong></span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Mapel</th> 
                      <th>Nilai</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Mapel</th>
                      <th>Nilai</th>
                      <th>Status</th>
                      <th>Action</th>
                      
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php $i=1; ?>
                  	<?php foreach($siswa as $sw10) : ?>
                      <?php if ($sw10['nilai'] >= 75) {
                         $status = "Tuntas";
                          }else{
                          $status= "Remedial"; 
                          } ?>
                    <tr>
                      <td><?= $i++; ?></td>
                  
                      
                      <td><?= $sw10['mapel']; ?></td>
                        <td><?= $sw10['nilai']; ?></td>
                        <td><?= $status; ?></td>
                        <td><a href="<?= base_url('siswa/detail10/').$sw10['id']; ?>" class="btn btn-primary">Lihat Detail</a> ?></td>
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


<div class="modal fade" id="MenuModal" tabindex="-1" role="dialog" aria-labelledby="MenuModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MenuModal">Tambah New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('menu') ?>" method="post">
          <input type="hidden" name="id" id="id">
        	<div class="form-group">
        		<label for="menu">Menu</label>
        		<input type="text" name="menu" class="form-control" id="menu">
        		
        	</div>

        	


       </form>
    </div>
  </div>
</div>

<div class="modal fade" id="MenuModalEdit" tabindex="-1" role="dialog" aria-labelledby="MenuModalEdit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MenuModalEdit">Change Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('menu/edit') ?>" method="post">
          <input type="hidden" name="id" id="id" value="<?= $menuid['id']; ?>">
          <div class="form-group">
            <label for="menu">Menu</label>
            <input type="text" name="menu" class="form-control" id="menu" value="<?= $menuid['menu']; ?>">
            
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">change</button>
   
      </div>
       </form>
      </div>
      
    </div>
    
</div>


