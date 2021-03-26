<link rel="icon" href="<?php echo base_url() . 'assets/images/logo_kominfo.png' ?>">
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 ">Ubah Password untuk</h1>
                                    <h5 class="mb-4"> <?= $this->session->userdata('reset_email'); ?></h5>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <center><img src="<?= base_url(); ?>assets/images/logo_login.png" alt="" width="50%">
                                </center>
                                <br>
                                <form class="user" method="post" action="<?= base_url('auth/changePassword'); ?>">
                                    <label>Password</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password1" name="password1">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <label>Konfirmasi Password</label>
                                    <div class="form-group">
                                        <input type="password" class="form-control " id="password2" name="password2">
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block">
                                        Ubah Password
                                    </button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>