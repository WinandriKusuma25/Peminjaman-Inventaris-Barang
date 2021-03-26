<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit dinas</h1>
        <small>
            <div class="text-muted"> Manajemen peminjaman &nbsp;/&nbsp; Daftar dinas &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/dinas/edit"); ?>">Edit</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Data dinas</h6>
                </div>

                <?php foreach ($dinas as $ad) : ?>
                <div class="card-body">
                    <form method="post" action="">
                        <input type="hidden" id="id_dinas" name="id_dinas" value="<?= $ad->id_dinas; ?>">

                        <div class="form-group">
                            <label for="nama_dinas">Nama Dinas</label>
                            <input type="text" class="form-control" id="nama_dinas" name="nama_dinas"
                                value="<?= $ad->nama_dinas; ?>">
                            <?= form_error('nama_dinas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <?php endforeach ?>
                        <p>
                        <p>
                        <p>
                            <button type="submit" class=" btn btn-success"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>
                            <a href="<?php echo base_url("admin/dinas"); ?>" class="btn btn-primary"> <i
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