<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Barang</h1>
        <small>
            <div class="text-muted"> Manajemen peminjaman &nbsp;/&nbsp; Daftar barang &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/barang/edit"); ?>">Edit</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Data barang</h6>
                </div>

                <?php foreach ($barang as $ad) : ?>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id="id_barang" name="id_barang" value="<?= $ad->id_barang; ?>">

                        <div class="form-group">
                            <label for="nama">Nama barang</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $ad->nama; ?>">
                            <?= form_error('nama_barang', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" min="1" class="form-control" id="stok" name="stok"
                                value="<?= $ad->stok; ?>">
                            <?= form_error('stok', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <!-- <div class="form-group">
                            <label for="nim">Kondisi</label>
                            <?php if ($ad->kondisi == "baik") : ?>
                            <div class="form-check">
                                <input type="radio" name="kondisi" value="baik" checked> Baik
                            </div>
                            <div class="form-check">
                                <input type="radio" name="kondisi" value="rusak"> Rusak
                            </div>
                            <?php else : ?>
                            <div class="form-check">
                                <input type="radio" name="kondisi" value="baik"> Baik
                            </div>
                            <div class="form-check">
                                <input type="radio" name="kondisi" value="rusak" checked> Rusak
                            </div>
                            <?php endif ?>
                            <?= form_error('kondisi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div> -->


                        <!-- <div class="form-group">
                            <label for="nim">Ketersedian</label>
                            <?php if ($ad->ketersedian == "ada") : ?>
                            <div class="form-check">
                                <input type="radio" name="ketersedian" value="ada" checked> Ada
                            </div>
                            <div class="form-check">
                                <input type="radio" name="ketersedian" value="tidak">Tidak
                            </div>
                            <?php else : ?>
                            <div class="form-check">
                                <input type="radio" name="ketersedian" value="ada"> Ada
                            </div>
                            <div class="form-check">
                                <input type="radio" name="ketersedian" value="tidak" checked>Tidak
                            </div>
                            <?php endif ?>
                            <?= form_error('ketersedian', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div> -->

                        <label for="image">Foto</label>
                        <br>
                        <img src="<?= base_url('assets/images/barang/') . $ad->image ?>" class="img-thumbnail"
                            width="20%">
                        <p>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="image" name="image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <?php endforeach ?>
                        <p>
                        <p>
                        <p>
                            <button type="submit" class=" btn btn-success"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <!-- <button type="reset" name="reset" class="btn btn-warning "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button> -->

                            <a href="<?php echo base_url("admin/barang"); ?>" class="btn btn-primary"> <i
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