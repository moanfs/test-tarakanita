<?= $this->extend('template/layout') ?>

<?= $this->Section('content') ?>

<div class="card shadow">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Pelamar</h6>
    </div>
    <div class="card-body">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success alert-dismissible show fade mx-5">
                <div class="alert-body text-center">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-info alert-dismissible show fade mx-5">
                <div class="alert-body text-center">
                    <?= session()->getFlashdata('message'); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th>No.</th>
                        <th>Nama Pelamar</th>
                        <th>Lulusan</th>
                        <th>GPA</th>
                        <th>Catatan Portofolio</th>
                        <th>Create At</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($applicants)): ?>
                        <div class="alert alert-warning text-center border-warning" role="alert">
                            <h5 class="alert-heading">Data Kosong</h5>
                            Belum ada data pelamar yang terdaftar di database. Silakan tambahkan data.
                        </div>
                    <?php else: ?>
                        <?php foreach ($applicants as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value['name'] ?></td>
                                <td><?= $value['graduated_from'] ?></td>
                                <td><?= $value['gpa_score'] ?></td>
                                <td><?= $value['portfolio_notes'] ?></td>
                                <td><?= date('d M Y', strtotime($value['created_at'])) ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url('applicants/' . $value['id'] . '/edit') ?>" class="btn btn-sm btn-info text-white rounded">Edit</a>
                                    <form action="applicants/<?= $value['id']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger rounded" onclick="return confirm('Apakah anda yakin ingin menghapus');">Delete</button>
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