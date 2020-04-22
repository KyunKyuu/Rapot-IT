

       <!-- Begin Page Content -->
        <div class="container-fluid">

           <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            	<?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>');  ?>
            	<?= $this->session->flashdata('message'); ?>
    
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Role</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Role</th>
                      <th>Action</th>
                      
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php $i=1; ?>
                  	<?php foreach($role as $r) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $r['role']; ?></td>
                      <td>
                      	   

                           <a href="<?= base_url('admin/tabeldata/') . $r['id']; ?>" class="btn btn-primary btn-sm">Lihat Detail</a>   

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


<div class="modal fade" id="RoleModal" tabindex="-1" role="dialog" aria-labelledby="RoleModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MenuModal">Added New Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('admin/role') ?>" method="post">
          <input type="hidden" name="id" id="id">
        	<div class="form-group">
        		<label for="menu">Role Name</label>
        		<input type="text" name="role" class="form-control" id="role">
        		
        	</div>

        	

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
   
      </div>
       </form>
    </div>
  </div>
</div>
</div>


