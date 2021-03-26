<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Barang</h1>
        <?php $no = 1;
        foreach ($barang as $usr) : ?>
        <small>
            <div class="text-muted"> Manajemen Peminjaman&nbsp;/&nbsp; Barang&nbsp; /&nbsp; <a
                    href="<?= base_url() . 'admin/baranf/detail/' . $usr->id_barang ?>">Detail Barang</a></div>
        </small>
        <?php endforeach ?>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card mb-3" style="max-width: 700px;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Barang</h6>
        </div>
        <div class="row no-gutters">
            <div class="col-md-6">
                <?php $no = 1;
                foreach ($barang as $usr) : ?>
                <img src="<?= base_url('assets/images/barang/') . $usr->image ?>" class="card-img" alt="...">
            </div>


            <div class="col-md-6">
                <div class="card-body">

                    <h5 class="card-title text-dark">Nama&nbsp;: <?= $usr->nama ?></h5>
                    <h5 class="card-title text-dark">Stok&nbsp;: <?= $usr->stok ?></h5>
                    <!-- <h5 class="card-title text-dark">Kondisi&nbsp;: <?php if ($usr->kondisi == "baik") : ?>
                        <td class="project-state">
                            <span class="badge badge-success"><?= $usr->kondisi ?></span>
                        </td>
                        <?php else : ?>
                        <td class="project-state">
                            <span class="badge badge-danger"><?= $usr->kondisi ?></span>
                        </td>
                        <?php endif ?>
                    </h5> -->
                    <!-- <h5 class="card-title text-dark">Ketersedian&nbsp;: <?php if ($usr->ketersedian == "ada") : ?>
                        <td class="project-state">
                            <span class="badge badge-success"><?= $usr->ketersedian ?></span>
                        </td>
                        <?php else : ?>
                        <td class="project-state">
                            <span class="badge badge-danger"><?= $usr->ketersedian ?></span>
                        </td>
                        <?php endif ?>
                    </h5> -->


                    <?php endforeach ?>
                    <p>

                        <a href="<?php echo base_url("admin/barang"); ?>" class="btn btn-primary">Kembali</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->