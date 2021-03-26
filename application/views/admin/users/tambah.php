<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Peminjam</h1>
        <small>
            <div class="text-muted"> Manajemen Peminjaman &nbsp;/&nbsp; Peminjam &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/users/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Peminjam</h6>
                </div>

                <div class="card-body">
                    <form method="post" action="<?= base_url('admin/users/tambah'); ?>" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="<?= set_value('nama')  ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
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
                            <input type="number" class="form-control form-control" id="no_telp" name="no_telp"
                                value="<?= set_value('no_telp')  ?>">
                            <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class=" form-group">
                            <label>Password</label>
                            <input type="password" class="form-control form-control" id="password1" name="password1">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                            <br>
                            <div class=" form-group">
                                <label>Konfirmasi Password</label>
                                <input type="password" class="form-control form-control" id="password2"
                                    name="password2">
                            </div>

                            <label for="image">Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image" required autofocus>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                                <!-- <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?> -->
                            </div>
                            <p>
                            <p>
                            <p>
                                <button type="submit" class=" btn btn-success"><i
                                        class="fas fa-save"></i>&nbsp;Simpan</button>

                                <button type="reset" name="reset" class="btn btn-warning "><i
                                        class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                                <a href="<?php echo base_url("admin/users"); ?>" class="btn btn-primary"> <i
                                        class="fas fa-arrow-left"></i>&nbsp;Kembali </a>

                                <link href="<?= base_url(); ?>assets/dark/dark-mode.css" rel="stylesheet"
                                    type="text/css">
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>