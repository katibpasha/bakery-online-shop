<section class="section">
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="login-brand">
                    <img src="<?php echo base_url() ?>assets/admin/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                </div>
                <?php if ($this->session->flashdata('flash')) : ?>
                    <div class="flash-login" data-flash="<?= $this->session->flashdata('flash') ?>"></div>
                    <?php unset($_SESSION['flash']) ?>
                <?php endif ?>
                <?php if ($this->session->flashdata('flash-success')) : ?>
                    <div class="flash-success" data-flash="<?= $this->session->flashdata('flash-success') ?>"></div>
                    <?php unset($_SESSION['flash-success']) ?>
                <?php endif ?>
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Login Admin</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="<?= site_url('Login/aksiLogin') ?>" class="needs-validation" novalidate="">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Silahkan Masukan Email
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                    <div class="float-right">
                                        <a href="<?php echo site_url('Adminpanel/forgot_password') ?>" class="text-small">
                                            Forgot Password?
                                        </a>
                                    </div>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                    Silahkan masukan password
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; Cuanism 2021
                </div>
            </div>
        </div>
    </div>
</section>