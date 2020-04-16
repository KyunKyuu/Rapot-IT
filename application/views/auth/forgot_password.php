</div>
  <div class="limiter"> 
    
    <div class="container-login100">
     
      <div class="wrap-login100">
       <div class="col-mt-2"><?= $this->session->flashdata('message'); ?></div>
          <span class="login100-form-title p-b-26">

            Reset Password
          </span>

          <span class="login100-form-title p-b-48">
            <i class="fas fa-code"></i>
          </span>
           <form class="login100-form" action="<?= base_url('auth/forgotpassword'); ?>" method="post">
            <?= form_error('email', '<small class="text-danger pl-3 float-right">', '</small>'); ?><br>
          <div class="wrap-input100">
            <input class="input100" type="email" name="email" id="email">


            <span class="focus-input100" data-placeholder="Email"></span>
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
        
          <div class="text-center p-t-115">
            <span class="txt1">
             Remember Your Password?
            </span>

            <a class="txt2" href="<?= base_url('auth') ?>">
              Login
            </a>
          </div>
        
      </div>
    </div>
  </div>
  