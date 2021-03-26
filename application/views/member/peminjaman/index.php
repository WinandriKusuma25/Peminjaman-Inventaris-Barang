<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Peminjaman</h1>
        <small>
            <div class="text-muted">Peminjaman &nbsp;/&nbsp; <a
                    href="<?php echo base_url("member/peminjaman"); ?>">Transaksi Peminjaman</a>
            </div>
        </small>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data peminjaman</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>
            <a class='btn btn-success' href="peminjaman/tambah">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <span>
                    Tambah
                </span>
            </a>

            <p>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary">No.</th>
                            <!-- <th class="text-primary">Nama </th> -->
                            <th class="text-primary">Barang</th>
                            <th class="text-primary">Tgl. Peminjaman</th>
                            <th class="text-primary">Status Peminjaman</th>
                            <th class="text-primary">Status Pengembalian</th>
                            <th class="text-primary">Jumlah</th>
                            <th class="text-primary">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($peminjaman as $ad) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <!-- <td><?= $ad->name ?></td> -->
                            <td><?= $ad->nama ?></td>
                            <td><?= date('d F Y', strtotime($ad->tgl_peminjaman)); ?></td>
                            <?php if ($ad->status_peminjaman == 'disetujui') :  ?>
                            <td class="project-state">
                                <span class="badge badge-success"><?= $ad->status_peminjaman ?></span>
                            </td>
                            <?php elseif ($ad->status_peminjaman == 'diajukan') :  ?>
                            <td class="project-state">
                                <span class="badge badge-warning"><?= $ad->status_peminjaman ?></span>
                            </td>

                            <?php else : ?>
                            <td class="project-state">
                                <span class="badge badge-danger"><?= $ad->status_peminjaman ?></span>
                            </td>
                            <?php endif ?>


                            <?php if ($ad->status_pengembalian == "sudah") : ?>
                            <td class="project-state">
                                <span class="badge badge-success"><?= $ad->status_pengembalian ?></span>
                            </td>
                            <?php else : ?>
                            <td class="project-state">
                                <span class="badge badge-danger"><?= $ad->status_pengembalian ?></span>
                            </td>
                            <?php endif ?>

                            <td><?= $ad->jumlah ?></td>

                            <td>
                                <a class='btn btn-warning btn-circle'
                                    href="<?= base_url() . 'member/peminjaman/edit/' . $ad->id_peminjaman ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a>

                                <a class='btn btn-primary btn-circle '
                                    href='<?= base_url() . 'member/peminjaman/detail/' . $ad->id_peminjaman ?>'
                                    class='btn btn-biru'>
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a>


                                <?php if ($ad->status_peminjaman == "disetujui") : ?>
                                <a href="#modalDelete2" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('member/peminjaman/hapus/' . $ad->id_peminjaman) ?>')"
                                    class='btn btn-danger btn-circle'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>

                                <?php elseif ($ad->status_peminjaman == "ditolak") : ?>
                                <a href="#modalDelete3" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('member/peminjaman/hapus/' . $ad->id_peminjaman) ?>')"
                                    class='btn btn-danger btn-circle'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                                <?php else : ?>
                                <a href="#modalDelete" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('member/peminjaman/hapus/' . $ad->id_peminjaman) ?>')"
                                    class='btn btn-danger btn-circle'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>

                                <?php endif ?>


                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>


<!-- Modal -->
<div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><b>Konfirmasi Hapus Data</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin akan menghapus data ini?
            </div>
            <div class="modal-footer">
                <form id="formDelete" action="" method="post">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalDelete2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <div class="text-danger"><b>Peringatan !</b></div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Mohon maaf data peminjaman Anda tidak dapat di hapus karena transaksi peminjaman telah disetujui oleh
                Admin.
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalDelete3">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <div class="text-danger"><b>Peringatan !</b></div>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Mohon maaf data peminjaman Anda tidak dapat di hapus karena transaksi peminjaman telah ditolak oleh
                Admin.
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>