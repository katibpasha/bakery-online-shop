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
                        <h4>Forgot Password</h4>
                    </div>

                    <div class="card-body">
                        <p class="text-muted">We will send a link to reset your password</p>
                        <form action="<?php echo site_url('Adminpanel/action_forgot') ?>" method="POST">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Forgot Password
                                </button>
                            </div>
                            <div class="text-center">
                                <a href="<?php echo site_url('Adminpanel') ?>" class="text-small">Kembali ke Halaman Login</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="simple-footer">
                    Copyright &copy; Stisla 2018
                </div>
            </div>
        </div>
    </div>
</section>