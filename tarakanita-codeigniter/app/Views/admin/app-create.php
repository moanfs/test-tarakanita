<?= $this->extend('template/layout') ?>

<?= $this->Section('content') ?>
<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Pelamar</h6>
    </div>
    <div class="p-3">
        <form action="<?= site_url('applicants/') ?>" method="POST" class="">
            <div class="form-group">
                <label for="exampleFormControlInput1">Nama Pelamar</label>
                <input type="text" name="name" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" value="<?= set_value('name') ?>" placeholder="Halomoan" autofocus>
                <div class="invalid-feedback">
                    <?= $validation->getError('name'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Lulusan</label>
                <input type="text" name="graduated_from" class="form-control <?= ($validation->hasError('graduated_from')) ? 'is-invalid' : ''; ?>" value="<?= set_value('graduated_from') ?>" placeholder="Universitas Telkom">
                <div class="invalid-feedback">
                    <?= $validation->getError('graduated_from'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">GPA</label>
                <input type="text" name="gpa_score" class="form-control <?= ($validation->hasError('gpa_score')) ? 'is-invalid' : ''; ?>" value="<?= set_value('gpa_score') ?>" placeholder="3.34">
                <small id="emailHelp" class="form-text text-muted">GPA Max 4.00</small>
                <div class="invalid-feedback">
                    <?= $validation->getError('gpa_score'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Catatan Portofolio</label>
                <textarea name="portfolio_notes" class="form-control <?= ($validation->hasError('portfolio_notes')) ? 'is-invalid' : ''; ?>" placeholder="catatan..."><?= set_value('portfolio_notes') ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('portfolio_notes'); ?>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-secondary mr-2 ">Reset</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>