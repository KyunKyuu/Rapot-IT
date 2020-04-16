

       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
         <div class="row">
         	<div class="col-lg-6">
         		 <?= $this->session->flashdata('message'); ?>
         		<form action="<?= base_url('user/changepassword'); ?>" method="post">
         			<div class="form-group">
         				<label type="current_password">Curent Password</label>
         				<input type="password" name="current_password" id="current_password" class="form-control">
         				<?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
         			</div>
         			<div class="form-group">
         				<label type="new_password1">New Password</label>
         				<input type="password" name="new_password1" id="new_password1" class="form-control">
         				<?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
         			</div>
         			<div class="form-group">
         				<label type="new_password2">Repeat Password</label>
         				<input type="password" name="new_password2" id="new_password2" class="form-control">
         				<?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
         			</div>
         				<div class="form-group row justify-content-end col-lg">
          			<div class="sm-6">
          				 <button class="btn btn-success btn-icon-split float-right btnchange" type="submit">
                    <span class="icon text-white-50">
                      <i class="fas fa-fw fa-check"></i>
                    </span>
                    <span class="text"><strong>Save Password</strong></span>
                  </button>
          			</div>
          		</div>
         		</form>
         	</div>
         </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      

