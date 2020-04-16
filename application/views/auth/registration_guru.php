      <div class="container register">
                <div class="row">
                    <div class="col-md-3  register-left">
                        <img src="<?= base_url('assets/img') ?>/logo_white.png"  alt=""/>
                        <h3 >Welcome</h3>
                        <p style="color: white;" class="col mt-2">Jadilah yang terbaik, susugaaaaaaaaaaaaaa, kyaa kyaa</p>
                        <a href="<?= base_url('auth') ?>" class="btn btn-light col-sm-5"><strong>LOGIN</strong></a><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            
                            <li class="nav-item">
                                <a class="nav-link"  href="<?= base_url('auth/registration') ?>" aria-controls="profile" aria-selected="false">Murid</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#" role="tab" aria-controls="home" aria-selected="true">Guru</a>
                            </li>
                        </ul>                      

                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                               <h3 class="register-heading">Halaman Daftar <strong style="font-size: 40px;">Guru</strong></h3>
                                <form  action="<?= base_url(); ?>auth/registrationguru" method="post">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label >Full Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name');?>">
                                             <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                          <label>Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email');?>">
                                             <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>

                                        </div>
                                        <div class="form-group">
                                          <label>Password</label>
                                            <input type="password" class="form-control" id="password1" name="password1">
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                          <label>Confrim Password</label>
                                            <input type="password" class="form-control" id="password2" name="password2">
                                            <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                       
                                    </div>
                                   
                                    <div class="col-md-6">
                                       <div class="form-group">
                                      <label>Nomer Induk Pengajar</label>
                                            <input type="number" class="form-control" id="nisnip" name="nisnip" value="<?= set_value('nisnip');?>" autocomplete="off">
                                              <?= form_error('nisnip', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                          <label>Guru Mata Pelajaran</label>
                                            <select class="form-control" name="mapel" id="mapel">
                                                <option class="hidden"  selected disabled>Select Mata Pelajaran</option>
                                                <option>Administrasi Sistem Jaringan</option>
                                                <option>Administrasi Infrasrtuktur Jaringan</option>
                                                <option>Teknologi Leess Jaringan</option>
                                                <option>Bahasa Indonesia</option>
                                                <option>PPKNNN</option>
                                            </select>
                                             <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        
                                         
                                        <button type="submit" class="btn btn-primary col-lg-5 col mt-5 float-right" >Register</button>
                                    </div>
                                  </form>
                               </div>
                        </div>
                    </div>
                </div>

            </div>    