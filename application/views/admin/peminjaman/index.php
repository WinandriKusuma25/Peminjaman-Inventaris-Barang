<div class="nav-link">
    <div id="darkSwitch"></div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    </script>
    <!-- Page Heading -->

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Transaksi Peminjaman</h1>
        <small>
            <div class="text-muted"> Manajemen Peminjaman &nbsp;/&nbsp; <a
                    href="<?php echo base_url("admin/peminjaman"); ?>">Transaksi Peminjaman</a>
            </div>
        </small>
    </div>


    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Peminjaman Belum Disetujui</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('peminjaman', array('status_peminjaman' => 'diajukan'))->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Peminjaman Sudah Disetujui</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('peminjaman', array('status_peminjaman' => 'disetujui'))->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Barang Belum Dikembalikan </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('peminjaman', array('status_pengembalian' => 'belum'))->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Barang Sudah Dikembalikan </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('peminjaman', array('status_pengembalian' => 'sudah'))->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

            <a class='btn btn-primary' href="peminjaman/statusPeminjaman">
                <i class="fa fa-paste" aria-hidden="true"></i>
                <span>
                    Kelola Status Peminjaman
                </span>
            </a>

            <a class='btn btn-primary' href="peminjaman/statusPengembalian">
                <i class="fa fa-paste" aria-hidden="true"></i>
                <span>
                    Kelola Status Pengembalian
                </span>
            </a>



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
                            <th class="text-primary">Aksi</th>

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
                                <!-- <a class='btn btn-primary  btn-circle'
                                    href='<?= base_url() . 'admin/peminjaman/detail/' . $ad->id_peminjaman ?>'
                                    class='btn btn-biru'>
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a> -->

                                <a class='btn btn-circle btn-primary'
                                    href='<?= base_url() . 'admin/peminjaman/detail/' . $ad->id_peminjaman ?>'
                                    class='btn  btn-biru'>
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </a>

                                <!-- <a class='btn btn-warning btn-circle'
                                    href="<?= base_url() . 'admin/peminjaman/edit/' . $ad->id_peminjaman ?>">
                                    <i class="fas fa-edit" aria-hidden="true"></i>
                                </a> -->

                                <!-- <a href="#modalDelete" data-toggle="modal"
                                    onclick="$('#modalDelete #formDelete').attr('action', '<?= site_url('admin/peminjaman/hapus/' . $ad->id_peminjaman) ?>')"
                                    class='btn btn-danger btn-circle'>
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a> -->
                            </td>

                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

                <a href="<?php echo base_url('admin/peminjaman/pdf') ?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-file-pdf "></i>
                    Laporan PDF</a>

                <a href="<?php echo base_url('admin/peminjaman/excel') ?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-file-excel"></i>
                    Laporan Excel</a>


                <a href="<?php echo base_url('admin/peminjaman/print') ?>"
                    class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fa fa-print"></i>
                    Cetak</a>
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