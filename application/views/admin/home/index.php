<meta property="og:title" content="dark-mode-switch">
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Beranda</h1>
        <small>
            <div class="text-muted"><a href="<?php echo base_url("admin/home"); ?>">Beranda</a>
            </div>
        </small>
    </div>

    <div class="alert alert-primary" role="alert">
        <?php
        foreach ($user as $ad) : ?>
        Selamat Datang <b><?=$ad->name ?></b> di halaman admin peminjaman inventaris alat Diskominfo Batu
        <?php endforeach; ?>
    </div>
    <!-- Content Row -->
    <div class="row">


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Peminjam</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get_where('user', array('id_role' => '2'))->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
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
                                Barang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get('barang')->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Daftar Dinas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get('dinas')->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Transaksi Peminjaman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo $this->db->get('peminjaman')->num_rows() ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-handshake fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Area Chart -->
        <!-- <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Total Transaksi Peminjaman Perbulan pada Tahun
                        <?= date('Y'); ?>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myPieChart2" width="669" height="320" class="chartjs-render-monitor"
                            style="display: block; width: 669px; height: 320px;"></canvas>
                    </div>
                </div>
            </div>
        </div> -->



        <!-- Pie Chart -->
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-white">Transaksi Peminjaman</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div class=""></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div class=""></div>
                            </div>
                        </div>
                        <canvas id="myPieChart" width="302" height="245" class="chartjs-render-monitor"
                            style="display: block; width: 302px; height: 245px;"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Peminjaman Disetujui
                        </span>
                        <span class="mr-2">

                            <i class="fas fa-circle text-warning"></i>Peminjaman Diajukan
                        </span>
                        <br>
                        <span class="mr-2">

                            <i class="fas fa-circle text-danger"></i>Peminjaman Ditolak
                        </span>
                    </div>
                </div>
            </div>
        </div>










        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header bg-primary py-3">
                    <h6 class="m-0 font-weight-bold text-white text-center">3 Transaksi Peminjaman Terbaru
                    </h6>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-sm table-striped text-center">
                        <thead>
                            <tr>
                                <th class="text-primary">Nama</th>
                                <th class="text-primary">Barang</th>
                                <th class="text-primary">Tgl. Peminjaman</th>
                                <th class="text-primary">Tgl. Pengembalian</th>
                                <th class="text-primary">Status Peminjaman</th>
                                <th class="text-primary">Status Pengembalian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($peminjaman as $ad) : ?>
                            <tr>
                                <td><strong><?= $ad->name ?></strong></td>
                                <td><?= $ad->nama ?></td>
                                <td> <?= date('d F Y', strtotime($ad->tgl_peminjaman)); ?></td>
                                <td> <?= date('d F Y', strtotime($ad->tgl_kembali)); ?></td>
                                <?php if ($ad->status_peminjaman == "disetujui") : ?>
                                <td class="project-state">
                                    <span class="badge badge-success"><?= $ad->status_peminjaman ?></span>
                                </td>
                                <?php elseif ($ad->status_peminjaman == "diajukan") : ?>
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

                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <a href="<?php echo base_url('admin/home/backup') ?>"
                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-database "></i>
                Unduh Database</a>
            <p>



        </div>




        <!-- Datepicker -->
        <script src="<?= base_url(); ?>assets/vendor/daterangepicker/moment.min.js"></script>
        <script src="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.min.js"></script>

        <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>



        <script type="text/javascript">
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito',
            '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
            // *     example: number_format(1234.56, 2, ',', ' ');
            // *     return: '1 234,56'
            number = (number + '').replace(',', '').replace(' ', '');
            var n = !isFinite(+number) ? 0 : +number,
                prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                s = '',
                toFixedFix = function(n, prec) {
                    var k = Math.pow(10, prec);
                    return '' + Math.round(n * k) / k;
                };
            // Fix for IE parseFloat(0.55).toFixed(0) = 0;
            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < script prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }
        </script>
        <script>
        // Pie Chart Example

        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ["Transaksi Diajukan", "Transaksi Ditolak", "Transaksi Disetujui"],
                datasets: [{
                    data: [
                        <?php echo $this->db->get_where('peminjaman', array('status_peminjaman' => 'diajukan'))->num_rows() ?>,
                        <?php echo $this->db->get_where('peminjaman', array('status_peminjaman' => 'ditolak'))->num_rows() ?>,
                        <?php echo $this->db->get_where('peminjaman', array('status_peminjaman' => 'disetujui'))->num_rows() ?>
                    ],
                    backgroundColor: ['#f6c23e ', '#e74a3b ',
                        '#1cc88a'
                    ],
                    hoverBackgroundColor: ['#5a5c69', '#5a5c69'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 80,
            },
        });
        </script>




        <script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>
        <script>
        // Area Chart Example

        var ctx = document.getElementById("myPieChart2");
        var myPieChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Transaksi Diajukan", "Transaksi Disetujui"],
                datasets: [{
                        label: "Total Barang Keluar",
                        // lineTension: 0.3,
                        backgroundColor: "rgba(78, 115, 223, 0.05)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        // pointHoverRadius: 1,
                        pointHoverBackgroundColor: "#5a5c69",
                        pointHoverBorderColor: "#5a5c69",
                        // pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: [
                            <?php echo $this->db->get_where('peminjaman', array('status_peminjaman' => 'diajukan'))->num_rows() ?>,
                            <?php echo $this->db->get_where('peminjaman', array('status_peminjaman' => 'disetujui'))->num_rows() ?>
                        ],
                    },
                    {
                        label: "Total Barang Keluar",
                        // lineTension: 0.3,
                        backgroundColor: "rgba(231, 74, 59, 0.05)",
                        borderColor: "#e74a3b",
                        pointRadius: 3,
                        pointBackgroundColor: "#e74a3b",
                        pointBorderColor: "#e74a3b",
                        // pointHoverRadius: 1,
                        pointHoverBackgroundColor: "#5a5c69",
                        pointHoverBorderColor: "#5a5c69",
                        // pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: [
                            <?php echo $this->db->get_where('peminjaman', array('status_peminjaman' => 'diajukan'))->num_rows() ?>,
                            <?php echo $this->db->get_where('peminjaman', array('status_peminjaman' => 'disetujui'))->num_rows() ?>
                        ],
                    }
                ],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: true,
                    caretPadding: 10,
                },
                legend: {
                    display: false
                },
                cutoutPercentage: 0,
            },
        });
        </script>
    </div>
</div>
</div>