<?= $this->extend('template/layout') ?>

<?= $this->Section('content') ?>
<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Edit Admin</h6>
    </div>
    <div class="p-3">
        <form action="<?= site_url('admin/' . $admin['id']) ?>" method="POST" class="">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control " value="<?= old('username', $admin['username']) ?>" placeholder="admin" readonly>
            </div>
            <div class="form-group">
                <label>email</label>
                <input type="text" class="form-control " value="<?= old('email', $admin['email']) ?>" readonly>
            </div>
            <div class="form-group">
                <label>Role</label>
                <select class="form-control" name="role_name">
                    <?php foreach ($roles as $role) : ?>
                        <option value="<?= $role['id'] ?>" <?= ($role['id'] == $admin['role_id']) ? 'selected' : ''; ?>><?= $role['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="d-flex justify-content-end">
                <button type="reset" class="btn btn-secondary mr-2">Reset</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>