<?= $this->extend('template/layout') ?>

<?= $this->Section('content') ?>

<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Admin</h6>
    </div>
    <div class="card-body">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible show fade mx-5">
                <div class="alert-body text-center">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Deskripsi Peran</th>
                        <th>Create At</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($admins)): ?>
                        <div class="alert alert-warning text-center border-warning" role="alert">
                            <h5 class="alert-heading">Data Kosong</h5>
                            Belum ada data pengguna yang terdaftar di database. Silakan jalankan Seeder atau tambahkan data.
                        </div>
                    <?php else: ?>
                        <?php foreach ($admins as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value['username'] ?></td>
                                <td><?= $value['email'] ?></td>
                                <td class="text-center">
                                    <?php $badgeColor = ($value['role_name'] == 'admin') ? 'bg-success' : 'bg-danger'; ?>
                                    <span class="badge text-white <?= $badgeColor ?> p-2">
                                        <?= ($value['role_name']) ?>
                                    </span>
                                </td>
                                <td><?= $value['description'] ?></td>
                                <td><?= date('d M Y', strtotime($value['created_at'])) ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url('admin/' . $value['id'] . '/edit')  ?>" class="btn btn-sm btn-info text-white rounded">Edit</a>
                                    <form action="admin/<?= $value['id']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger rounded" onclick="return confirm('Apakah anda yakin ingin menghapus Admin');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>