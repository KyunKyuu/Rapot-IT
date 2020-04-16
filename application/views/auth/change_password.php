</div>
  <div class="limiter"> 
    
    <div class="container-login100">
     
      <div class="wrap-login100">
      <h6 class="mb-4"><?= $this->session->userdata('reset_email') ?></h6>  
       <div class="col-mt-2"><?= $this->session->flashdata('message'); ?></div>
          <span class="login100-form-title p-b-26">

            Change Password
          </span>

          <span class="login100-form-title p-b-48">
            <i class="fas fa-code"></i>
          </span>
           <form class="login100-form" action="<?= base_url('auth/changepassword'); ?>" method="post">
           
           <?= form_error('password1', '<small class="text-danger pl-3 float-right">', '</small>'); ?><br>
          <div class="wrap-input100 ">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="password1" id="password1" autocomplete="off">
            <span class="focus-input100" data-placeholder="Enter Password"></span>
          </div>


           <?= form_error('password2', '<small class="text-danger pl-3 float-right">', '</small>'); ?><br>
          <div class="wrap-input100 ">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="password2" id="password2" autocomplete="off">
            <span class="focus-input100" data-placeholder="Repeat Password"></span>
          </div>

          

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button type="submit" class="login100-form-btn">
                Reset Password
              </button>
            </form>
            </div>
          </div>
        
        
      </div>
    </div>
  </div>
  

  




  