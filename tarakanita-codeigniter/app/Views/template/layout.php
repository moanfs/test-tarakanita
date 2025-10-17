<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/sb-admin-2.min.css') ?>">
    <title>Tarakanita</title>
</head>

<body>
    <div id="wrapper">
        <?= $this->include('template/sidebar') ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content" class="mt-5">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?= $this->renderSection('content') ?>
                </div>
                <!-- End Page Content -->
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Tarakanita <?= date('Y') ?></span>
                    </div>
                </div>
            </footer>
            <!-- End Footer -->
        </div>
    </div>

    <script src="<?= base_url() ?>/assets/js/sb-admin-2.min.js"></script>
</body>

</html>