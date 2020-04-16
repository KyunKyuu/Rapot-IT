

       <!-- Begin Page Content -->
        <div class="container-fluid">

           <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

        

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">

              <?= $this->session->flashdata('message'); ?>
              <a href="#" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-fw fa-users-cog"></i>
                    </span>
                    <span class="text"><strong><?= $role['role']; ?></strong></span>
                  </a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Menu</th>
                      <th>Access</th>
                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Menu</th>
                      <th>Accsess</th>
                      
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php $i=1; ?>
                    <?php foreach($menu as $m) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $m['menu']; ?></td>
                      <td>
                           <div class="form-check">
                             <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                           </div>
                      </td>
                     
                    </tr>
                <?php endforeach; ?>
                     </tbody>
                </table>
              </div>
               
            <div class="card-footer py-3">

             <form action="<?= base_url('admin/changeaccess') ?>" method="post">
              <button class="btn btn-success btn-icon-split  btnchange" type="submit">
                    <span class="icon text-white-50">
                      <i class="fas fa-fw fa-check"></i>
                    </span>
                    <span class="text"><strong>Save Changes</strong></span>
                  </button>
            </div>
            
            
          </div>
</form>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Button trigger modal -->


</div>
</div>


