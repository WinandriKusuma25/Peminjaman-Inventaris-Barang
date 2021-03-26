<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
        <small>
            <div class="text-muted"> Manajemen Peminjam &nbsp;/&nbsp; Peminjam &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/users/edit"); ?>">Edit</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Peminjam</h6>
                </div>

                <?php foreach ($users as $ad) : ?>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id="id_user" name="id_user" value="<?= $ad->id_user; ?>">


                        <div class="form-group">
                            <label for="text">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" readonly
                                value="<?= $ad->name; ?>">
                        </div>

                        <div class="form-group">
                            <label for="nim">Status</label>
                            <?php if ($ad->is_active == "aktif") : ?>
                            <div class="form-check">
                                <input type="radio" name="is_active" value="aktif" checked> Aktif
                            </div>
                            <div class="form-check">
                                <input type="radio" name="is_active" value="pasif"> Pasif
                            </div>
                            <?php else : ?>
                            <div class="form-check">
                                <input type="radio" name="is_active" value="aktif"> Aktif
                            </div>
                            <div class="form-check">
                                <input type="radio" name="is_active" value="pasif" checked> Pasif
                            </div>
                            <?php endif ?>
                            <?= form_error('is_active', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <?php endforeach ?>
                        <p>
                        <p>
                        <p>
                            <button type="submit" class=" btn btn-success"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <!-- <button type="reset" name="reset" class="btn btn-warning "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button> -->

                            <a href="<?php echo base_url("admin/users"); ?>" class="btn btn-primary"> <i
                                    class="fas fa-arrow-left"></i>&nbsp;Kembali </a>

                    </form>
                </div>
            </div>
            <br>
        </div>
        <br>
    </div>
    <br>
</div>
</div>