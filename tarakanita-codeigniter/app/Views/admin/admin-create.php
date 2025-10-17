<?= $this->extend('template/layout') ?>

<?= $this->Section('content') ?>
<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Tambah Admin</h6>
    </div>
    <div class="p-3">
        <form action="<?= base_url('admin/') ?>" method="POST" class="">
            <div class="form-group">
                <label for="exampleFormControlInput1">Username</label>
                <input type="text" name="username" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" value="<?= set_value('username') ?>" placeholder="admin">
                <div class="invalid-feedback">
                    <?= $validation->getError('username'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">email</label>
                <input type="text" name="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?= set_value('email') ?>" placeholder="contoh@mail.com">
                <div class="invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Password</label>
                <input type="password" name="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" placeholder="*******">
                <div class="invalid-feedback">
                    <?= $validation->getError('password'); ?>
                </div>
                <!-- <small id="emailHelp" class="form-text text-muted">GPA Max 4.00</small> -->
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Konfirmasi Password</label>
                <input type="password" name="password_confirm" class="form-control <?= ($validation->hasError('password_confirm')) ? 'is-invalid' : ''; ?>" id="exampleFormControlInput1" placeholder="*******">
                <div class="invalid-feedback">
                    <?= $validation->getError('password_confirm'); ?>
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>