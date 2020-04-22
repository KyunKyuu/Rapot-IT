

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
                     <span class="text"><strong><?= $role['role']; ?></strong></span>
                  </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama</th>
                      <th>Email</th>
                      
                      <th>Action</th>
                 
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>#</th>
                      <th>Nama</th>
                      <th>Email</th>
                     
                      <th>Action</th>
                
                      
                      
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i=1; ?>
                    <?php foreach($profile as $m) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $m['name']; ?></td>
                     
                      <td><?= $m['nisnip']; ?></td>
                      <td>
                        <a href="<?= base_url('admin/detail/') . $m['id'] ?>" class="btn btn-primary btn-sm">Detail</a>
                         <a onclick="javascript: return confirm('Anda Yakin hapus?')" href="<?= base_url('admin/hapus/') . $m['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                          
                      </td>
                     
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


