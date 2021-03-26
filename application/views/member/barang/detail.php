<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Transaksi Peminjaman</h1>
        <small>
            <div class="text-muted"> Dashboard &nbsp;/&nbsp; Peminjaman &nbsp; / &nbsp; <a
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
                    <form method="post" action="<?= base_url('member/peminjaman/tambah'); ?>"
                        enctype="multipart/form-data">
                        <?php $no = 1;
                foreach ($barang as $ad) : ?>
                        <img src="<?= base_url('assets/images/barang/') . $ad->image ?>" alt="..." width="20%">

                        <div class="form-group">
                            <label for="tgl_peminjaman">Tgl. Peminjaman</label>
                            <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman"
                                value="<?= set_value('tgl_peminjaman')  ?>">
                            <?= form_error('tgl_peminjaman', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="tgl_peminjaman">Tgl. Pengembalian</label>
                            <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian"
                                value="<?= set_value('tgl_peminjaman')  ?>">
                            <?= form_error('tgl_pengembalian', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                value="<?= set_value('keterangan')  ?>">
                            <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>



                        <p>
                        <p>
                        <p>
                            <button type="submit" class=" btn btn-success"><i
                                    class="fas fa-plus"></i>&nbsp;Tambah</button>

                            <button type="reset" name="reset" class="btn btn-warning "><i
                                    class="fas fa-sync-alt"></i>&nbsp;Reset</button>

                            <a href="<?php echo base_url("member/barang"); ?>" class="btn btn-primary"> <i
                                    class="fas fa-arrow-left"></i>&nbsp;Kembali </a>

                            <link href="<?= base_url(); ?>assets/dark/dark-mode.css" rel="stylesheet" type="text/css">
                    </form>
                    <?php endforeach?>
                </div>
                <br>
            </div>
        </div>
    </div>

</div>