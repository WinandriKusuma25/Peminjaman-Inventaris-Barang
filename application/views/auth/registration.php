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
                        <div class="col-lg -9">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h5 text-primary">Registrasi</h1>
                                    <center><img src="<?= base_url(); ?>assets/images/logo_login.png" alt=""
                                            width="100%">
                                    </center>
                                    <br>
                                </div>
                                <form class="user" method="post" action="<?= base_url('auth/registration') ?>">

                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control form-control" id="name" name="name"
                                            value="<?= set_value('name')  ?>">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class=" form-group">
                                        <label class="" for="dinas">Dinas</label>
                                        <div class="input-group">
                                            <select name="id_dinas" id="id_dinas" class="custom-select">
                                                <option value="" selected disabled>Pilih dinas</option>
                                                <?php foreach ($dinas as $j) : ?>
                                                <option value="<?= $j->id_dinas ?>"><?= $j->nama_dinas ?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </div>
                                        <?= form_error('dinas', '<small class="text-danger">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control form-control" id="email" name="email"
                                            value="<?= set_value('email')  ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label>No Telp</label>
                                        <input type="number" class="form-control form-control" id="no_telp"
                                            name="no_telp" value="<?= set_value('no_telp')  ?>">
                                        <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <div class=" form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control form-control" id="password1"
                                            name="password1">
                                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>

                                        <div class=" form-group">
                                            <label>Konfirmasi Password</label>
                                            <input type="password" class="form-control form-control" id="password2"
                                                name="password2">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Regitrasi akun
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('beranda'); ?>">Beranda</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth'); ?>">Sudah Punya akun ? Login</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgotPassword'); ?>">Lupa Password ?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>