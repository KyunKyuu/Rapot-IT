</div>
  <div class="limiter"> 
    
    <div class="container-login100">
     
      <div class="wrap-login100">
       <div class="col-mt-2"><?= $this->session->flashdata('message'); ?></div>
          <span class="login100-form-title p-b-26">

            Login Page
          </span>

          <span class="login100-form-title p-b-48">
            <i class="fas fa-code"></i>
          </span>
           <form class="login100-form" action="<?= base_url('auth'); ?>" method="post">
            <?= form_error('email', '<small class="text-danger pl-3 float-right">', '</small>'); ?><br>
          <div class="wrap-input100">
            <input class="input100" type="text" name="email" id="email">


            <span class="focus-input100" data-placeholder="Email"></span>
          </div>
          
       
           <?= form_error('password', '<small class="text-danger pl-3 float-right">', '</small>'); ?><br>
          <div class="wrap-input100 ">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="password" id="password" autocomplete="off">
            <span class="focus-input100" data-placeholder="Password"></span>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button type="submit" class="login100-form-btn">
                Login
              </button>
            </form>
            </div>
          </div>
         <div class="text-center p-t-115">
            <span class="txt1">
             Forgot Your Password?
            </span>

            <a class="txt2" href="<?= base_url('auth/forgotpassword') ?>" style="color: black;">
             Reset Password
            </a>
            <hr>
         
            <span class="txt1">
              Don’t have an account?
            </span>

            <a class="txt2" href="<?= base_url('auth/registration') ?>" style="color: black;">
              Sign Up
            </a>
          </div>
        
      </div>
    </div>
  </div>
  