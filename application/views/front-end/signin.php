<div class="app-content">
    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">
        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">
                                <a href="<?= site_url('Home') ?>">Home</a>
                            </li>
                            <li class="is-marked">
                                <a href="<?= site_url('Home/signin') ?>">Signin</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <img src="<?= base_url() ?>assets/admin/banner/img/favicon.jpg" alt="favicon.jpg" width="120px">
                        </div>
                        <div class="section__text-wrap" style="margin-top: 10px;">
                            <h1 class="section__heading u-c-secondary">ALREADY REGISTERED?</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="flash-berhasil" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('flash-gagal')) : ?>
            <div class="flash-gagal" data-flash="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
            <?php unset($_SESSION['flash-gagal']); ?>
        <?php endif; ?>

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row row--center">
                    <div class="col-lg-6 col-md-8 u-s-m-b-30">
                        <div class="l-f-o">
                            <div class="l-f-o__pad-box">
                                <h1 class="gl-h1">SAYA PELANGGAN BARU ?</h1>

                                <span class="gl-text u-s-m-b-30">Untuk Pelanggan Baru Silahkan Untuk Buat Akun Pada Tombol Create an Account</span>
                                <div class="u-s-m-b-15">

                                    <a class="l-f-o__create-link btn--e-transparent-brand-b-2" href="<?= site_url('Home/signup') ?>">CREATE AN ACCOUNT</a>
                                </div>
                                <h1 class="gl-h1">SIGNIN</h1>

                                <span class="gl-text u-s-m-b-30">Jika Kamu Sudah Memiliki Akun, Silahkan Log In.</span>
                                <form class="l-f-o__form" method="POST" action="<?php echo site_url('Login/aksiLoginMember') ?>">
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="login-email">E-MAIL *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="login-email" placeholder="Enter E-mail" name="email">
                                        <?= form_error('email', '<small class="text-danger" style="color: red;">', '</small>') ?>
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="login-password">PASSWORD *</label>

                                        <input class="input-text input-text--primary-style" type="password" id="login-password" placeholder="Enter Password" name="password">
                                        <?= form_error('password', '<small class="text-danger" style="color: red;">', '</small>') ?>
                                    </div>
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-30">

                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">LOGIN</button>
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <a class="gl-link" href="<?= site_url('Home/forgot') ?>">Lupa Password?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>