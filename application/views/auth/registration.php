
   
  <div class="container register">
                <div class="row">
                    <div class="col-md-3  register-left">
                        <img src="<?= base_url('assets/img') ?>/logo_white.png" style="color: white;" alt=""/>
                        <h3 >Welcome</h3>
                        <p style="color: white;" class="col mt-2">Jadilah yang terbaik, susugaaaaaaaaaaaaaa, kyaa kyaa</p>
                        <a href="<?= base_url('auth') ?>" class="btn btn-light col-sm-5"><strong>LOGIN</strong></a><br/>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#" role="tab" aria-controls="home" aria-selected="true">Murid</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link"  href="<?= base_url('auth/registrationguru') ?>" aria-controls="profile" aria-selected="false">Guru</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Halaman Daftar <strong style="font-size: 40px;">Murid</strong></h3>
                                 <form  action="<?= base_url(); ?>auth/registration" method="post">
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
                                      <label>Nomer Induk Siswa</label>
                                            <input type="number" class="form-control" id="nisnip" name="nisnip" value="<?= set_value('nisnip');?>" autocomplete="off">
                                              <?= form_error('nisnip', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class="form-group">
                                          <label>Kelas</label>
                                            <select class="form-control" name="kelas" id="kelas" value="<?= set_value('kelas');?>">

                                                <option class="hidden"  selected disabled>Pilih Kelas</option>
                                                <option>X</option>
                                                <option>XI</option>
                                                <option>XII</option>
                                                <option>XII</option>
                                            </select>
                                             <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                         <div class="form-group">
                                          <label>Jurusan</label>
                                            <select class="form-control" name="jurusan" id="jurusan" value="<?= set_value('jurusan');?>">
                                                <option class="hidden"  selected disabled>Pilih Jurusan</option>
                                                <option>KA-1</option>
                                                <option>KA-2</option>
                                                <option>KGSP 1</option>
                                                <option>KGSP 2</option>
                                                <option>PROFIL</option>
                                                <option>TKJ-1</option>
                                                <option>TKJ-2</option>
                                                 <option>TKJ-3</option>
                                                <option>GEO-1</option>
                                                <option>GEO-2</option>
                                                <option>GEO-3</option>
                                                <option>DPIB-1</option>
                                                <option>DPIB-2</option>
                                                <option>DPIB-3</option>
                                                <option>DPIB-4</option>
                                                <option>DPIB-5</option>
                                            </select>
                                             <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        
                                         
                                        <button type="submit" class="btn btn-primary col-lg-5 col mt-5 float-right btn-user btn-block" >Register</button>
                                      </form>
                                    </div>
                                </div>
                            </div>
              </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>                         
