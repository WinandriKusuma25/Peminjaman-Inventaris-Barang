<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Transaksi Peminjaman</h1>
        <small>
            <div class="text-muted"> Manajemen Peminjaman &nbsp;/&nbsp; Transaksi Peminjaman &nbsp; / &nbsp; <a
                    href="<?php echo base_url("admin/peminjaman/tambah"); ?>">Tambah</a>
            </div>
        </small>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col">
            <?= $this->session->flashdata('message'); ?>
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Transaksi Peminjaman</h6>
                </div>

                <div class="card-body">

                    <form method="post" action="<?= base_url('admin/peminjaman/tambah'); ?>">


                        <!-- <div class="form-group">
                            <label for="">Nama Peminjam</label>
                            <select class="form-control" id="id_user" name="id_user">
                                <option value="">- Pilih - </option>
                                <?php foreach ($users as $j) : ?>
                                <option value="<?= $j->id_user ?>"><?= $j->name ?></option>
                                <?php endforeach ?>
                            </select>
                        </div> -->

                        <div class=" form-group">
                            <label class="" for="">Nama Peminjam</label>
                            <div class="input-group">
                                <select name="id_user" id="id_user" class="custom-select">
                                    <option value="" selected disabled>Pilih Nama</option>
                                    <?php foreach ($users as $j) : ?>
                                    <option value="<?= $j->id_user ?>"><?= $j->name ?> </option>
                                    <?php endforeach ?>

                                </select>
                            </div>
                            <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <!-- <div class="form-group">
                            <label for="">Barang</label>
                            <select class="form-control" id="id_barang" name="id_barang">
                                <option value="">- Pilih - </option>
                                <?php foreach ($barang as $j) : ?>
                                <option value="<?= $j->id_barang ?>"><?= $j->nama ?></option>
                                <?php endforeach ?>
                            </select>
                        </div> -->

                        <div class=" form-group">
                            <label class="" for="">Barang</label>
                            <div class="input-group">
                                <select name="id_barang" id="id_barang" class="custom-select">
                                    <option value="" selected disabled>Pilih Barang</option>
                                    <?php foreach ($barang as $j) : ?>
                                    <option value="<?= $j->id_barang ?>"><?= $j->nama ?> | Stok <?= $j->stok ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?= form_error('barang', '<small class="text-danger">', '</small>'); ?>
                        </div>


                        <div class="form-group">
                            <label for="tgl_peminjaman">Tgl.Peminjaman</label>
                            <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman"
                                value="<?= set_value('tgl_peminjaman')  ?>">
                            <?= form_error('tgl_peminjaman', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="tgl_pengembalian">Tgl.Pengembalian</label>
                            <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali"
                                value="<?= set_value('tgl_pengembalian')  ?>">
                            <?= form_error('tgl_pengembalian', '<small class="text-danger pl-3">', '</small>'); ?>
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


                        <div class="form-group">
                            <label for="status_peminjaman">Status Peminjaman</label>
                            <div class="form-check">
                                <input type="radio" name="status_peminjaman" value="diajukan"
                                    value="<?= set_value('status_peminjaman')  ?>">
                                Diajukan
                            </div>
                            <div class="form-check">
                                <input type="radio" name="status_peminjaman" value="disetujui"
                                    value="<?= set_value('status_peminjaman')  ?>"> Disetujui
                            </div>
                            <?= form_error('status_peminjaman', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="status_pengembalian">Status Pengembalian</label>
                            <div class="form-check">
                                <input type="radio" name="status_pengembalian" value="belum"
                                    value="<?= set_value('status_pengembalian')  ?>">
                                Belum
                            </div>
                            <div class="form-check">
                                <input type="radio" name="status_pengembalian" value="sudah"
                                    value="<?= set_value('status_pengembalian')  ?>"> Sudah
                            </div>
                            <?= form_error('status_pengembalian', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>



                        <button type="submit" class=" btn btn-success"><i class="fas fa-plus"></i>&nbsp;Tambah</button>

                        <button type="reset" name="reset" class="btn btn-warning "><i
                                class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                        <a href="<?php echo base_url("admin/peminjaman"); ?>" class="btn btn-primary"> <i
                                class="fas fa-arrow-left"></i>Kembali</a>


                    </form>

                </div>
                <br>
            </div>
            <br>
        </div>
    </div>
</div>