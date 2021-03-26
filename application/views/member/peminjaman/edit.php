<!-- Begin Page Content -->
<?php $no = 1;
foreach ($peminjamanEdit as $p) : ?>
<?php if ($p->status_peminjaman == "disetujui") : ?>

<div class="container-fluid">
    <div class="alert alert-danger" role="alert">
        <b> Peringantan ! </b>
        <hr>
        Mohon maaf peminjaman Anda tidak dapat di edit karena transaksi peminjaman sudah di setujui oleh
        Admin.<br>Apabila
        ada kendala silahkan hubungi Admin.
        <br>
        Terima kasih.

    </div>

    <a href="<?php echo base_url("member/peminjaman"); ?>" class="btn btn-primary"> <i
            class="fas fa-arrow-left"></i>&nbsp;Kembali </a>
</div>
</div>

<?php elseif ($p->status_peminjaman == "ditolak") : ?>
<div class="container-fluid">
    <div class="alert alert-danger" role="alert">
        <b> Peringantan ! </b>
        <hr>
        Mohon maaf peminjaman Anda tidak dapat di edit karena transaksi peminjaman sudah ditolak oleh
        Admin.<br>Apabila
        ada kendala silahkan hubungi Admin.
        <br>
        Terima kasih.

    </div>

    <a href="<?php echo base_url("member/peminjaman"); ?>" class="btn btn-primary"> <i
            class="fas fa-arrow-left"></i>&nbsp;Kembali </a>
</div>
</div>


<?php else : ?>


<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit peminjaman</h1>
        <small>
            <div class="text-muted"> Manajemen peminjaman &nbsp;/&nbsp;peminjaman &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/peminjaman/edit"); ?>">Edit</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit Data peminjaman</h6>
                </div>

                <?php foreach ($peminjamanEdit as $p) : ?>
                <div class="card-body">
                    <form method="post" action="">
                        <input type="hidden" id="id_peminjaman" name="id_peminjaman" value="<?= $p->id_peminjaman; ?>">


                        <div class="form-group">
                            <label for="text">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" readonly
                                value="<?= $p->name; ?>">
                        </div>

                        <div class=" form-group">
                            <label class="" for="barang">Barang</label>
                            <div class="input-group">
                                <select name="id_barang" id="id_barang" class="custom-select">
                                    <option value="" selected disabled>Pilih barang</option>
                                    <?php foreach ($barang as $j) : ?>
                                    <option value="<?= $j->id_barang ?>"
                                        <?= $j->id_barang == $p->id_barang ? "selected" : null ?>><?= $j->nama ?> | Stok
                                        <?= $j->stok ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?= form_error('barang', '<small class="text-danger">', '</small>'); ?>
                        </div>


                        <div class="form-group">
                            <label for="tgl_peminjaman">Tanggal Peminjaman</label>
                            <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman"
                                value="<?= $p->tgl_peminjaman; ?>">
                            <?= form_error('tgl_peminjaman', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="tgl_peminjaman">Tanggal Kembali</label>
                            <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali"
                                value="<?= $p->tgl_kembali; ?>">
                            <?= form_error('tgl_peminjaman', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" min="1" class="form-control" id="jumlah" name="jumlah"
                                value="<?= $p->jumlah; ?>">
                            <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class=" form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="50" rows=""
                                class="form-control"><?= $p->keterangan; ?></textarea>
                            <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class="form-group">
                            <label for="text">Status Peminjaman</label>
                            <input type="text" class="form-control" id="status_peminjaman" name="status_peminjaman"
                                readonly value="<?= $p->status_peminjaman; ?>">
                        </div>


                        <div class="form-group">
                            <label for="text">Status Pengembalian</label>
                            <input type="text" class="form-control" id="status_pengembalian" name="status_pengembalian"
                                readonly value="<?= $p->status_pengembalian; ?>">
                        </div>





                        <?php endforeach ?>
                        <p>
                        <p>
                        <p>
                            <button type="submit" class=" btn btn-primary"><i
                                    class="fas fa-save"></i>&nbsp;Simpan</button>

                            <!-- <button type="reset" name="reset" class="btn btn-warning "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button> -->

                            <a href="<?php echo base_url("member/peminjaman"); ?>" class="btn btn-primary"> <i
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
<?php endif ?>

<?php endforeach ?>