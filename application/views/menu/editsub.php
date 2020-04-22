  <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        
          <div class="row lg-5">
            <div class="col-lg-8">
             <?php foreach ($menusub as $mns) : ?>
              <form action="<?= base_url('menu/updatesub'); ?>">
              <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label" >Title</label>
                <div class="col-sm-10">
                  
                  <input type="hidden"  class="form-control" name="id" value="<?= $mns['id']; ?>">
                  <input type="hidden"  class="form-control" name="is_active" value="<?= $mns['is_active']; ?>">
                  <input type="text" name="title" id="title" class="form-control" value="<?= $mns['title']; ?>">
                </div>
              </div>

              

            <div class="form-group row">
            <label for="menu_id" class="col-sm-2 col-form-label" >Select Menu</label>
            <div class="col-sm-10">
            <select name="menu_id" id="menu_id" class="form-control">
             
               <option class="">Select Menu</option>

              <?php foreach ($menu as $m) :?>

            <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>


              <div class="form-group row">
                <label for="url" class="col-sm-2 col-form-label" >Url</label>
                <div class="col-sm-10">
                  <input type="text"  id="url" class="form-control" name="url" value="<?= $mns['url']; ?>">
                </div>
              </div>

              <div class="form-group row">
                <label for="icon" class="col-sm-2 col-form-label" >Icon</label>
                <div class="col-sm-10">
                  <input type="text"  id="icon" class="form-control" name="icon" value="<?= $mns['icon']; ?>">
                </div>
              </div>
                <a href="<?= base_url('menu/submenu') ?>" class="btn btn-danger ">Batal</a> &nbsp;
                <button type="reset" class="btn btn-dark">Reset</button> &nbsp;
              <button type="submit" class="btn btn-primary">Simpan</button> &nbsp;
              </form>  
            <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
