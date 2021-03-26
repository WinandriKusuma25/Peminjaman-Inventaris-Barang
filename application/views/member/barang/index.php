<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Barang</h1>
        <small>
            <div class="text-muted">Peminjaman &nbsp;/&nbsp; <a href="<?php echo base_url("admin/barang"); ?>">Daftar
                    Barang</a>
            </div>
        </small>
    </div>






    <div class=" d-flex flex-wrap">
        <?php foreach ($barang as $ad): ?>
        <div class="card mr-3 mb-3" style="width:330px; height:430px">
            <center><img src="<?= base_url('assets/images/barang/') . $ad->image ?>" style="width:250px; height:300px;">
            </center>

            <hr>
            <center>

                <p class="card-text"><b><?= $ad->nama ?></b></p>

                <?php if ($ad->stok < 1) : ?>
                <span class="badge badge-danger">Mohon maaf stok kosong</span>
                <?php else : ?>
                <p class="card-text"> Stok : <?= $ad->stok ?></p>
                <?php endif ?>

            </center>

            <center>
                <br>
                <!-- <hr>


                <a class='btn btn-primary ' href='<?= base_url() . 'member/barang/detail/' . $ad->id_barang ?>'>
                    Pinjam
                </a> -->

            </center>


        </div>
        <?php endforeach ?>
    </div>
</div>
</div>