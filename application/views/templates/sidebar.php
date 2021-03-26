<!-- Sidebar -->
<?php
// var_dump($this->session->userdata('data'));
// // $ses = $this->session->userdata('data');
// // echo $ses['id_role'];
// die();
if (
    $this->session->userdata('id_role') != 1
) {
    redirect('/member/home');
}
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/home') ?>">
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
        <a class="nav-link pb-0" href="<?= base_url('admin/home') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <!-- <li class="nav-item <?= activate_menu('calendar') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/calendar') ?>">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Calendar</span></a>
    </li> -->



    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Profil
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- <li class="nav-item <?= activate_menu('profile') ?>  <?= activate_menu('Change_Password') ?>">
        <a class="nav-link collapsed <?= activate_menu('profile') ?>" href="#" data-toggle="collapse"
            data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header  <?= activate_menu('profile') ?>">Profile Admin</h6>
                <a class="collapse-item <?= activate_menu('profile') ?>"
                    href=" <?= base_url('admin/profile') ?>">Profile</a>
                <a class="collapse-item <?= activate_menu('profile/edit') ?>"" href="
                    <?= base_url('admin/profile/edit') ?>">Edit Profile</a>
                <a class="collapse-item <?= activate_menu('Change_Password') ?>"
                    href="<?= base_url('admin/Change_Password') ?>">Ubah Password</a>
            </div>
        </div>
    </li> -->


    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('profile') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/profile') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profilku</span></a>
    </li>
    <p>
        <!-- <li class="nav-item <?= activate_menu('profile/edit') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/profile/edit') ?>">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Edit Profile</span></a>
    </li>

    <li class="nav-item <?= activate_menu('Change_Password') ?>">
        <a class="nav-link pb-0" href=" <?= base_url('admin/Change_Password') ?>">
            <i class="fas fa-fw fa-key"></i>
            <span>Change Password</span></a>
    </li> -->

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Peminjam
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('users') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/users') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Peminjam</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <!-- <li class="nav-item <?= activate_menu('anak_didik') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/anak_didik') ?>">
            <i class="fas fa-fw fa-child"></i>
            <span>Anak Didik</span></a>
    </li> -->

    <!-- Divider -->
    <hr class="sidebar-divider mt-3">

    <!-- Heading -->
    <div class="sidebar-heading">
        Manajemen Peminjaman
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('peminjaman') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/peminjaman') ?>">
            <i class="fas fa-fw fa-handshake"></i>
            <span>Transaksi Peminjaman</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('barang') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/barang') ?>">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Daftar Barang</span></a>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= activate_menu('dinas') ?>">
        <a class="nav-link pb-0" href="<?= base_url('admin/dinas') ?>">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Daftar Dinas</span></a>
    </li>


    <!-- Nav Item - Utilities Collapse Menu -->
    <!-- <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li> -->

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