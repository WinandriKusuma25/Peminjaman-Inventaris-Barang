<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="container-fluid">
    </script>
    <!-- Page Heading -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark">Peminjaman Belum Dikembalikan</h1>
        <small>
            <div class="text-muted"> Manajemen Peminjaman &nbsp;/&nbsp; <a
                    href="<?php echo base_url("admin/peminjaman"); ?>">Transaksi Peminjaman</a>
            </div>
        </small>
    </div>



    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Berikut merupakan data peminjaman belum dikembalikan</h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>

            <a class='btn btn-danger' href="statusPengembalian">
                <i class="fa fa-times" aria-hidden="true"></i>
                <span>
                    Peminjaman Belum Dikembalikan
                </span>
            </a>

            <a class='btn btn-success' href="pengembalianSukses">
                <i class="fa fa-check" aria-hidden="true"></i>
                <span>
                    Peminjaman Sudah Dikembalikan
                </span>
            </a>


            <!-- <a class='btn btn-success' href="peminjaman/tampilPengembalianSudah">
                <i class="fa fa-plus" aria-hidden="true"></i>
                <span>
                    Pengembalian Sudah
                </span>
            </a> -->

            <p>
            <div class="table-responsive">
                <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-primary">No.</th>
                            <th class="text-primary">Nama </th>
                            <th class="text-primary">Barang</th>
                            <th class="text-primary">Tgl. Peminjaman</th>
                            <th class="text-primary">Status Peminjaman</th>
                            <th class="text-primary">Status Pengembalian</th>
                            <th class="text-primary">Detail</th>
                            <th class="text-primary">Setujui Pengembalian</th>
                            <!-- <th class="text-primary">Status Peminjaman</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($peminjaman as $ad) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $ad->name ?></td>
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


                            <td>
                                <a class='btn btn-primary btn-circle '
                                    href='<?= base_url() . 'admin/peminjaman/detail/' . $ad->id_peminjaman ?>'
                                    class='btn btn-biru'>
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a>

                                <!-- <a class='btn btn-warning btn-circle'
                                    href="<?= base_url() . 'admin/peminjaman/edit/' . $ad->id_peminjaman ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a> -->
                                <!-- 
                                <a href="<?= base_url('admin/peminjaman/toggle/') . $ad->id_peminjaman ?>"
                                    class="btn  btn-sm <?= $ad->status_peminjaman  ? 'btn-success' : 'btn-danger' ?>"
                                    title="<?= $ad->status_peminjaman ? 'Setujui Peminjaman' : 'Batalkan Peminjaman' ?>"><i
                                        class="fa fa-fw fa-power-off"></i></a> -->

                                <!-- Page Heading -->
                                <!-- 
                                <a href="#modalKonfirmasi" data-toggle="modal"
                                    onclick="$('#modalKonfirmasi #modalKonfirmasi').attr('action', '<?= site_url('admin/peminjaman/editPengembalian/' . $ad->id_peminjaman) ?>')"
                                    class='btn btn-danger btn-circle'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a> -->

                            </td>
                            <td>
                                <form
                                    action="<?php echo base_url() . 'admin/peminjaman/editPengembalian/' .  $ad->id_peminjaman;?>"
                                    method="post">
                                    <input type="hidden" name="id_peminjaman" value="<?= $ad->id_peminjaman;?>">
                                    <input type="hidden" name="status_pengembalian" value="sudah">
                                    <button class="btn btn-success" type="submit"><i class="fas fa-check"></i>
                                        &nbsp;Setujui
                                    </button>
                                </form>
                            </td>
                            <!-- <td>
                                <form
                                    action="<?php echo base_url();?>admin/peminjaman/editPengembalian/ <?= $ad->id_peminjaman;?>"
                                    method="post">
                                    <input type="hidden" name="id_peminnjaman" value="<?= $ad->id_peminjaman;?>">
                                    <input type="hidden" name="status_pengembalian" value="sudah">
                                    <button class="btn btn-success" type="submit">Barang sudah kembali&nbsp;<i
                                            class="fas fa-user-edit"></i></button>
                                </form>
                            </td> -->
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <a href="<?php echo base_url("admin/peminjaman"); ?>" class="btn btn-primary"> <i
                        class="fas fa-arrow-left"></i>&nbsp;Kembali </a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
</div>


<!-- Modal -->
<div class="modal fade" id="modalKonfirmasi">
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