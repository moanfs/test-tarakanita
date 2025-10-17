<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('/') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Tarakanita</div>
    </a>

    <li class="nav-item active">
        <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Peran:</h6>
                <span class="collapse-item "><?= session('role_name') ?></span>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('/') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if (session()->get('role_name') == 'superadmin') : ?>
        <!-- Heading -->
        <div class="sidebar-heading">Admin</div>

        <!-- Nav Item - Data Admin -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('/admin') ?>">
                <span>Data Admin</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('/admin/new') ?>">
                <span>Form Admin</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php endif; ?>
    <!-- Heading -->
    <div class="sidebar-heading">Applicants</div>

    <!-- Nav Item - Pelamar -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('/applicants') ?>">
            <span>Data Pelamar</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('/applicants/new') ?>">
            <span>Form Pelamar</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Data Admin -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('/logout') ?>">
            <span>Logout</span>
        </a>
    </li>
</ul>
<!-- End of Sidebar -->