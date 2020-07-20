<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon">
                <img src="<?= base_url('assets/img/logowhite4.png'); ?>" alt="CakeCode" height="50">
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Management
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item <?php if (!empty($produk)) {
                                echo ('active');
                            } ?>">
            <a class="nav-link" href="<?= base_url('admin/productmanagement') ?>">
                <i class="fas fa-cookie-bite"></i>
                <span>Product management</span></a>
        </li>

        <!-- Nav Item - user management -->
        <li class="nav-item <?php if (!empty($usermanagement)) {
                                echo ('active');
                            } ?>">
            <a class="nav-link" href="<?= base_url('admin/usermanagement') ?>">
                <i class="fas fa-user"></i>
                <span>User management</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->