<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Barang</h1>
        <small>
            <div class="text-muted"> Manajemen Peminjaman &nbsp;/&nbsp; Barang &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/barang/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Barang</h6>
                </div>

                <div class="card-body">
                    <form method="post" action="<?= base_url('admin/barang/tambah'); ?>" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="<?= set_value('nama')  ?>">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" min="1" class="form-control" id="stok" name="stok"
                                value="<?= set_value('stok')  ?>">
                            <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <!-- <div class="form-group">
                            <label for="Kondisi">Kondisi</label>
                            <div class="form-check">
                                <input type="radio" name="kondisi" value="baik" value="<?= set_value('kondisi')  ?>">
                                Baik
                            </div>
                            <div class="form-check">
                                <input type="radio" name="kondisi" value="rusak" value="<?= set_value('kondisi')  ?>">
                                Rusak
                            </div>
                            <?= form_error('kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div> -->


                        <!-- <div class="form-group">
                            <label for="Ketersedian">Ketersediaan</label>
                            <div class="form-check">
                                <input type="radio" name="ketersedian" value="ada"
                                    value="<?= set_value('ketersedian')  ?>">
                                Ada
                            </div>
                            <div class="form-check">
                                <input type="radio" name="ketersedian" value="tidak"
                                    value="<?= set_value('ketersedian')  ?>">
                                Tidak
                            </div>
                            <?= form_error('ketersedian', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div> -->

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

                            <a href="<?php echo base_url("admin/barang"); ?>" class="btn btn-primary"> <i
                                    class="fas fa-arrow-left"></i>&nbsp;Kembali </a>

                            <link href="<?= base_url(); ?>assets/dark/dark-mode.css" rel="stylesheet" type="text/css">
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
</div>