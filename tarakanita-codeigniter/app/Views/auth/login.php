<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/sb-admin-2.min.css') ?>">
</head>

<body class="bg-gradient-primary">
    <div class="container d-flex justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="row justify-content-center">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <?php if (session()->getFlashdata('message')) : ?>
                        <div class="alert alert-danger alert-dismissible show ">
                            <div class="alert-body text-center">
                                <?= session()->getFlashdata('message'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form action="<?= site_url('login'); ?>" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" value="<?= set_value('email') ?>" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="exampleInputPassword" placeholder="Password">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('password'); ?>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
</body>

</html>