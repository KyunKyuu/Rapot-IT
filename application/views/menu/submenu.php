

       <!-- Begin Page Content -->
        <div class="container-fluid">

           <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
         

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
                </div>'
                <?php endif; ?>
             
            	
            	<?= $this->session->flashdata('message'); ?>
              <a class="btn btn-primary" href="" data-toggle="modal" data-target="#SubMenuModal">Add New SubMenu</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Menu</th>
                      <th>Url</th>
                       <th>Icon</th>
                        <th>Active</th>
                         <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                       <th>#</th>
                      <th>Title</th>
                      <th>Menu</th>
                      <th>Url</th>
                       <th>Icon</th>
                        <th>Active</th>
                         <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  	<?php $i=1; ?>
                  	<?php foreach($subMenu as $mn) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $mn['title']; ?></td>
                      <td><?= $mn['menu']; ?></td>
                      <td><?= $mn['url']; ?></td>
                      <td><?= $mn['icon']; ?></td>
                      <td><?= $mn['is_active']; ?></td>
                      <td>
                      	
                           <a class="btn btn-info btn-sm MenuModalEdit" href="<?= base_url(); ?>menu/editsub/<?= $mn['id']; ?>">Ubah</a>
                      	
                      	   <a onclick="javascript: return confirm('Anda Yakin hapus?')" href="<?= base_url(); ?>menu/hapussub/<?= $mn['id']; ?>" class="btn btn-danger btn-sm" name="tombol-hapus">Hapus</a>
                           
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


<div class="modal fade" id="SubMenuModal" tabindex="-1" role="dialog" aria-labelledby="SubMenuModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MenuModal">Added New SubMenu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url('menu/submenu') ?>" method="post">
          <input type="hidden" name="id" id="id">
        	<div class="form-group">
            <label for="title">SubMenu title</label>
        	<input type="text" name="title" class="form-control" id="title">
        	</div>

          <div class="form-group">
            <label for="menu_id">Select Menu</label>
            <select name="menu_id" id="menu_id" class="form-control"> 
              <option class="">Select Menu</option>
              <?php foreach ($menu as $m) :?>
                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="url">SubMenu url</label>
          <input type="text" name="url" class="form-control" id="url">
          </div>

          <div class="form-group">
            <label for="icon">SubMenu icon</label>
          <input type="text" name="icon" class="form-control" id="icon">
          </div>

        	<div class="form-group">
            <div class="form-check">
              <input type="checkbox" name="is_active" id="is_active" value="1" class="form=check-input" checked>
              <label class="form-check-label" for="defaultCheck1">Active?</label>
            </div>
            
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