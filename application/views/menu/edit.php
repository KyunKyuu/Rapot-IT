  <div class="container-fluid">

           <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
          <br><br>
         <div class="row lg-2">
          	<div class="col-lg-8">
          		<?php foreach ($menu as $mn) : ?>
          			
          	
          		<form action="<?= base_url('menu/update'); ?>" method="post">

          		<div class="form-group">
          			<label for="menu" class="col-sm-2 col-form-label" >Menu</label>
          			<div class="col-sm-12">

          				<input type="hidden"  class="form-control" name="id" value="<?= $mn['id']; ?>">
          				<input type="text"  class="form-control"  name="menu" value="<?= $mn['menu']; ?>">
          			</div>
          		</div>
          		<a href="<?= base_url('menu') ?>" class="btn btn-danger ">Batal</a>
          		<button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
          	</form>
          <?php endforeach; ?>
          	</div>
          </div>

  </div>
  	

  </div>
