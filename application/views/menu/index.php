

       <!-- Begin Page Content -->
        <div class="container-fluid">

           <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            	<?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>');  ?>
            	<?= $this->session->flashdata('message'); ?>
              <button type="button" class="btn btn-primary tombolTambahData" data-toggle="modal" data-target="#fromModal">Add New Menu</button> 
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Menu</th>
                      <th>Action</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Menu</th>
                      <th>Action</th>
                      
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php $i=1; ?>
                  	<?php foreach($menu as $mn) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $mn['menu']; ?></td>
                      <td>
                       <a  class="btn btn-info btn-sm " href="<?= base_url('menu/edit/').$mn['id'];?>">Edit</a>
                    
                      	<a onclick="javascript: return confirm('Anda Yakin hapus?')" href="<?= base_url(); ?>menu/hapus/<?= $mn['id']; ?>" class="btn btn-danger btn-sm" name="tombol-hapus">Hapus</a>
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



<div class="modal fade" id="fromModal" tabindex="-1" role="dialog" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Data Mahasiswa</h5>
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

        	
           <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
   
      </div>

       </form>
    </div>
  </div>
</div>


</div>
</div>


