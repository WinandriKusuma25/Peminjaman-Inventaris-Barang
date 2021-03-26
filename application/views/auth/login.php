<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<link rel="icon" href="<?php echo base_url() . 'assets/images/logo_kominfo.png' ?>">
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image">
                        </div>
                        <hr>
                        <div class="col-lg -9">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h5 text-primary mb-4">Masuk</h1>
                                </div>
                                <div class="nav-link">
                                    <?= $this->session->flashdata('message'); ?>
                                    <center>
                                        <img src="<?= base_url(); ?>assets/images/logo_login.png" alt="" width="100%">
                                    </center>
                                    <br>
                                    <form class="user" method="post" action="<?= base_url('auth'); ?>">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                value="<?= set_value('email') ?>">
                                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <div class=" form-group">
                                            <label>Kata Sandi</label>
                                            <input type="password" class="form-control " id="password" name="password">
                                            <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Masuk
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('beranda'); ?>">Beranda</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/forgotPassword'); ?>">Lupa
                                            Kata Sandi ?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?= base_url('auth/registration'); ?>">Buat akun baru
                                        </a>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>