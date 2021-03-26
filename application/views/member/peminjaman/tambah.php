<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Transaksi Peminjaman</h1>
        <small>
            <div class="text-muted"> Beranda &nbsp;/&nbsp; Peminjaman &nbsp; / &nbsp; <a
                    href="<?php echo base_url("member/barang/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Transaksi Peminjaman</h6>
                </div>

                <div class="card-body">
                    <form method="post" action="<?= base_url('member/peminjaman/tambah'); ?>">
                        <!-- <?php $no = 1;
                         foreach ($user as $ad) : ?>
                        <input type="hidden" name="id_user" value="<?= $ad->id_user;?>">
                        <?php endforeach?> -->

                        <!-- <div class="form-group">
                            <label for="">Barang</label>
                            <select class="form-control" id="id_barang" name="id_barang">
                                <option value="">- Pilih - </option>
                                <?php foreach ($barang as $j) : ?>
                                <option value="<?= $j->id_barang ?>"><?= $j->nama ?></option>
                                <?php endforeach ?>
                            </select>
                        </div> -->

                        <div class="form-group">
                            <label for="text">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" readonly
                                value="<?= $ad->name; ?>">
                        </div>



                        <div class=" form-group">
                            <label class="" for="">Barang</label>
                            <div class="input-group">
                                <select name="id_barang" id="id_barang" class="custom-select">
                                    <option value="" selected disabled>Pilih Barang</option>
                                    <?php foreach ($barang as $j) : ?>
                                    <option value="<?= $j->id_barang ?>"><?= $j->nama ?> | Stok <?= $j->stok ?>
                                    </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?= form_error('barang', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="tgl_peminjaman">Tgl. Peminjaman</label>
                            <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman"
                                value="<?= set_value('tgl_peminjaman')  ?>">
                            <?= form_error('tgl_peminjaman', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="tgl_kembali">Tgl. Pengembalian</label>
                            <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali"
                                value="<?= set_value('tgl_peminjaman')  ?>">
                            <?= form_error('tgl_kembali', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>


                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" min="1" class="form-control" id="jumlah" name="jumlah"
                                value="<?= set_value('jumlah')  ?>">
                            <?= form_error('jumlah', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows=""
                                class="form-control"></textarea>
                        </div>
                        <p>
                        <p>
                        <p>
                            <button type="submit" class=" btn btn-success"><i
                                    class="fas fa-plus"></i>&nbsp;Tambah</button>

                            <button type="reset" name="reset" class="btn btn-warning "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                            <a href="<?php echo base_url("member/peminjaman"); ?>" class="btn btn-primary"> <i
                                    class="fas fa-arrow-left"></i>&nbsp;Kembali </a>

                            <link href="<?= base_url(); ?>assets/dark/dark-mode.css" rel="stylesheet" type="text/css">
                    </form>

                </div>
                <br>
            </div>
            <br>
        </div>
    </div>
</div>