<!-- Sidebar -->
<?php
if (
$this->session->userdata('id_role') != 2
) {
redirect('/admin/home');
}
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('member/home') ?>">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url(); ?>assets/images/logo_kominfo.png" alt="" width="60%">
        </div>
        <div class="sidebar-brand-text mx-3">Peminjaman Inventaris</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Beranda
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('home') ?>">
        <a class="nav-link pb-0" href="<?= base_url('member/home') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Profil
    </div>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('profile') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('member/profile') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profilku</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Peminjaman
    </div>


    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('barang') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('member/barang') ?>">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Daftar Barang</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('peminjaman') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('member/peminjaman') ?>">
            <i class="fas fa-fw fa-handshake"></i>
            <span>Transaksi Peminjaman</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">
    <!-- Heading -->
    <div class="sidebar-heading">
        Keluar
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item ">
        <a class="nav-link pb-1" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Keluar</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->