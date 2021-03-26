<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Peminjaman</h1>
        <?php $no = 1;
        foreach ($peminjaman as $usr) : ?>
        <small>
            <div class="text-muted"> Manajemen peminjaman &nbsp;/&nbsp; Transaksi Peminjaman&nbsp; /&nbsp; <a
                    href="<?= base_url() . 'admin/peminjaman/detail/' . $usr->id_peminjaman ?>">Detail peminjam</a>
            </div>
        </small>
        <?php endforeach ?>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Transaksi peminjaman</h6>
        </div>
        <div class="row no-gutters">
            <div class="col-md-4">
                <?php $no = 1;
                foreach ($peminjaman as $usr) : ?>
                <img src="<?= base_url('assets/images/barang/') . $usr->image ?>" class="card-img" alt="...">
            </div>


            <div class="col-md-8">
                <div class="card-body">
                    <hr>
                    <h5 class="card-title text-dark">Nama&nbsp;: <?= $usr->name ?></h5>
                    <hr>
                    <h5 class="card-title text-dark">Dinas&nbsp;: <?= $usr->nama_dinas ?></h5>
                    <hr>
                    <h5 class="card-title text-dark">Nama barang &nbsp;: <?= $usr->nama ?></h5>
                    <hr>
                    <h5 class="card-title text-dark">Tgl. Peminjaman &nbsp;:
                        <?= date('d F Y', strtotime($usr->tgl_peminjaman)); ?>
                    </h5>
                    <hr>
                    <h5 class="card-title text-dark">Tgl. Pengembalian &nbsp;:
                        <?= date('d F Y', strtotime($usr->tgl_kembali)); ?>
                    </h5>
                    <hr>
                    <h5 class="card-title text-dark">Jumlah &nbsp;: <?= $usr->jumlah ?></h5>
                    <hr>
                    <h5 class="card-title text-dark">Status Peminjaman&nbsp;:
                        <?php if ($usr->status_peminjaman == "disetujui") : ?>
                        <td class="project-state">
                            <span class="badge badge-success"><?= $usr->status_peminjaman ?></span>
                        </td>
                        <?php elseif ($usr->status_peminjaman == 'diajukan') :  ?>
                        <td class="project-state">
                            <span class="badge badge-warning"><?= $usr->status_peminjaman ?></span>
                        </td>
                        <?php else : ?>
                        <td class="project-state">
                            <span class="badge badge-danger"><?= $usr->status_peminjaman ?></span>
                        </td>
                        <?php endif ?>
                    </h5>
                    <hr>
                    <h5 class="card-title text-dark">Status Pengembalian&nbsp;:
                        <?php if ($usr->status_pengembalian == "sudah") : ?>
                        <td class="project-state">
                            <span class="badge badge-success"><?= $usr->status_pengembalian ?></span>
                        </td>
                        <?php else : ?>
                        <td class="project-state">
                            <span class="badge badge-danger"><?= $usr->status_pengembalian ?></span>
                        </td>
                        <?php endif ?>
                    </h5>
                    <hr>
                    <h5 class="card-title text-dark">Keterangan&nbsp;: <?= $usr->keterangan ?></h5>
                    <hr>


                    <p>

                        <?php endforeach ?>
                    <p>

                        <!-- <a href="<?php echo base_url("admin/peminjaman"); ?>" class="btn btn-primary">Back</a> -->
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->