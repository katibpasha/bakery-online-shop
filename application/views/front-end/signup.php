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

                                <a href="<?= base_url('Home') ?>">Home</a>
                            </li>
                            <li class="is-marked">

                                <a href="<?= base_url('Home/signup') ?>">Signup</a>
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
                    </div>
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary">CREATE AN ACCOUNT</h1>
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
                                <h1 class="gl-h1">INFORMASI PRIBADI</h1>
                                <form class="l-f-o__form" method="POST" action="<?= site_url('Home/action_signup') ?>">
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-fname">NAMA LENGKAP *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="reg-fname" placeholder="Nama Lengkap" name="nama">
                                        <?= form_error('nama', '<small class="text-danger" style="color: red;">', '</small>') ?>
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-lname">Email *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="reg-lname" placeholder="Email" name="email">
                                        <?= form_error('email', '<small class="text-danger" style="color: red;">', '</small>') ?>
                                    </div>

                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-email">No. Telepon *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="reg-email" placeholder="No. Telepon" name="telepon">
                                        <?= form_error('telepon', '<small class="text-danger" style="color: red;">', '</small>') ?>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="reg-email">Alamat *</label>
                                        <input class="input-text input-text--primary-style" type="text" placeholder="Alamat" name="alamat">
                                        <?= form_error('alamat', '<small class="text-danger" style="color: red;">', '</small>') ?>
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-password">PASSWORD *</label>

                                        <input class="input-text input-text--primary-style" type="password" id="reg-password" placeholder="Password" name="password1">
                                        <?= form_error('password1', '<small class="text-danger" style="color: red;">', '</small>') ?>
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reg-password">CONFIRM PASSWORD *</label>

                                        <input class="input-text input-text--primary-style" type="password" id="reg-password" placeholder="Confirm Password" name="password2">
                                        <?= form_error('password2', '<small class="text-danger" style="color: red;">', '</small>') ?>
                                    </div>
                                    <div class="u-s-m-b-15">

                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">DAFTAR</button>
                                    </div>

                                    <a class="gl-link" href="<?= base_url('Home') ?>">Kembali ke Toko</a>
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