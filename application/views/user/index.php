<link rel="icon" href="<?php echo base_url() . 'assets/images/logo_kominfo.png' ?>">

<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-floating">
        <div class="container">
            <a class="navbar-brand" href="#">
                <!-- <img src="<?= base_url(); ?>assets/user/logo.png" alt="" width="10%"> -->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </div>
    </nav>

    <div class="page-hero-section bg-image hero-home-1"
        style="background-image: url(<?= base_url(); ?>assets/user/img/bg_hero_1.svg);">
        <div class="hero-caption pt-5">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-lg-6 wow fadeInUp">
                        <!-- <div class="badge mb-2"><span class="icon mr-1"><span class="mai-globe"></span></span> #2 Editor
                            Choice App
                            of 2020</div> -->

                        <br>
                        <br>

                        <h2 class="mb-4 text-primary">Diskominfo Batu</h2>
                        <div class="text-muted">Mempermudah peminjaman inventaris barang Dinas Komunikasi dan
                            Informatika Kota Batu
                        </div>
                        <br>
                        <a href="<?= base_url('auth'); ?>" class="btn btn-primary">Masuk</a>
                        <a href="<?= base_url('auth/registration'); ?>" class="btn btn-primary">Registrasi</a>
                    </div>
                    <div class="col-lg-6 d-none d-lg-block wow zoomIn">
                        <div class="">
                            <img src="<?= base_url(); ?>assets/user/job.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="position-realive bg-image">
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 py-3">
                        <div class="img-place wow zoomIn">
                            <img src="<?= base_url(); ?>assets/images/faox.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 py-3 mt-lg-5">
                        <h2 class="mb-4 text-primary">Alur Peminjaman</h2>
                        <div class="iconic-list">
                            <div class="iconic-item wow fadeInUp">
                                <div class="iconic-md iconic-text bg-warning fg-white rounded-circle">
                                    <span>1</span>
                                </div>
                                <div class="iconic-content">

                                    <h5>Registrasi</h5>
                                    <p class="fs-small">Pertama, lakukan registrasi telebih dahulu. Mengisi semua form
                                        yang ada di halaman registrasi.</p>
                                </div>
                            </div>

                            <div class="iconic-item wow fadeInUp">
                                <div class="iconic-md iconic-text bg-warning fg-white rounded-circle">
                                    <span>2</span>
                                </div>
                                <div class="iconic-content">
                                    <h5>Masuk</h5>
                                    <p class="fs-small">Setelah Registrasi, lakukan masuk sesuai dengan email dan
                                        kata sandi yang Anda masukkan pada saat registrasi.</p>
                                </div>
                            </div>
                            <div class="iconic-item wow fadeInUp">
                                <div class="iconic-md iconic-text bg-warning fg-white rounded-circle">
                                    <span>3</span>
                                </div>
                                <div class="iconic-content">
                                    <h5>Melakukan Peminjaman Barang</h5>
                                    <p class="fs-small">Setelah masuk, lalu masuk ke dalam halaman website. Pilih alat
                                        yang akan di pinjam dan lakukan transaksi peminjaman tersebut</p>
                                </div>
                            </div>
                            <div class="iconic-item wow fadeInUp">
                                <div class="iconic-md iconic-text bg-warning fg-white rounded-circle">
                                    <span>4</span>
                                </div>
                                <div class="iconic-content">

                                    <h5>Konfirmasi Peminjaman oleh Admin</h5>
                                    <p class="fs-small">Admin mengecek data dan menyetujui peminjaman. Lalu mengubah
                                        status sudah dikembalikan apabila peminjam sudah mengembalikan barang.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>