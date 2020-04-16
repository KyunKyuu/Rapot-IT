

       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        
          <div class="row lg-5">
          	<div class="col-lg-8">
          		<?= form_open_multipart('user/edit'); ?>

          		<div class="form-group row">
          			<label for="email" class="col-sm-2 col-form-label" >Email</label>
          			<div class="col-sm-10">
          				<input type="text" name="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
          			</div>
          		</div>

              <div class="form-group row">
                <label for="nisnip" class="col-sm-2 col-form-label" >Nis / Nip</label>
                <div class="col-sm-10">
                  <input type="text"  class="form-control" id="nisnip" name="nisnip" value="<?= $user['nisnip']; ?>" readonly>
                </div>
              </div>

          		<div class="form-group row">
          			<label for="name" class="col-sm-2 col-form-label">Full Name</label>
          			<div class="col-sm-10">
          				<input type="text" name="name" class="form-control" id="name" name="name" value="<?= $user['name']; ?>">
          				  <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
          			</div>
              </div>
                <div class="form-group row">
                <label for="kelas" class="col-sm-2 col-form-label" >Kelas</label>
                <div class="col-sm-10">
                <select class="form-control" name="kelas" id="kelas" value="<?= $user['kelas']; ?>">
                   <option class="hidden"  selected disabled>Pilih Kelas</option>
                        <option>X</option>
                        <option>XI</option>
                        <option>XII</option>
                        <option>XII</option>
               </select>
               </div>
              </div>	
             

              <div class="form-group row">
                <label for="jurusan" class="col-sm-2 col-form-label" >Jurusan</label>
                <div class="col-sm-10">
                  <input type="text" name="jurusan" class="form-control" id="jurusan" name="jurusan" value="<?= $user['jurusan']; ?>" readonly>
                </div>
              </div>
          		<div class="form-group row">
          			<div class="col-sm-2">Picture</div>
          			<div class="col-sm-10">
          				<div class="row">
          					<div class="col-sm-3">
          						<img src="<?= base_url('assets/img/profile/') . $user['image']?>" class="img-thumbnail">
          					</div>
          				<div class="col-sm-9">
          					<div class="custom-file">
          						<input type="file" name="image" class="custom-file-input" id="image">
          						<label class="custom-file-label" for="image">Chose File</label>
          					</div>
          				</div>
          				</div>
          			</div>
          		</div>	

          		<div class="form-group row justify-content-end">
          			<div class="sm-10">
          				 <button href="#" class="btn btn-success btn-icon-split float-right btnchange" type="submit">
                    <span class="icon text-white-50">
                      <i class="fas fa-fw fa-check"></i>
                    </span>
                    <span class="text"><strong>Save Changes</strong></span>
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

      
 