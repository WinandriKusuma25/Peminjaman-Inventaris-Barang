<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah dinas</h1>
        <small>
            <div class="text-muted"> Manajemen Peminjaman &nbsp;/&nbsp; daftar dinas &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/dinas/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data dinas</h6>
                </div>

                <div class="card-body">

                    <form method="post" action="<?= base_url('admin/dinas/tambah'); ?>">

                        <div class="form-group">
                            <label for="nama_dinas">Nama dinas</label>
                            <input type="text" class="form-control" id="nama_dinas" name="nama_dinas"
                                value="<?= set_value('nama_dinas')  ?>">
                            <?= form_error('nama_dinas', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <button type="submit" class=" btn btn-success"><i class="fas fa-plus"></i>&nbsp;Tambah</button>

                        <button type="reset" name="reset" class="btn btn-warning "><i
                                class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                        <a href="<?php echo base_url("admin/dinas"); ?>" class="btn btn-primary"> <i
                                class="fas fa-arrow-left"></i>Kembali</a>
                    </form>
                </div>
            </div>
            <br>
            <br>
        </div>
        <br>
    </div>
</div>
</div>