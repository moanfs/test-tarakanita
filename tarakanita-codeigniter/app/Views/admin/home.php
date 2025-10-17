<?= $this->extend('template/layout') ?>

<?= $this->Section('content') ?>
<div class="">
    <h1>Selamat Datang <?= session('username') ?></h1>
</div>
<?= $this->endSection(); ?>