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

                                <a href="<?= site_url('Home/forgot') ?>">Reset</a>
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
                            <h1 class="section__heading u-c-secondary">FORGOT PASSWORD?</h1>
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
                                <h1 class="gl-h1">PASSWORD RESET</h1>

                                <span class="gl-text u-s-m-b-30">Enter your email or username below and we will send you a link to reset your password.</span>
                                <form class="l-f-o__form" method="POST" action="<?= site_url('Home/changePassword') ?>">
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reset-email">Password *</label>

                                        <input class="input-text input-text--primary-style" type="password" id="reset-email" placeholder="Enter Password" name="pass1">
                                        <?= form_error('pass1', '<small class="text-danger" style="color: red;">', '</small>') ?>
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="reset-email">Confirm Password *</label>

                                        <input class="input-text input-text--primary-style" type="password" id="reset-email" placeholder="Enter Confirm Password" name="pass2">
                                        <?= form_error('pass2', '<small class="text-danger" style="color: red;">', '</small>') ?>
                                    </div>
                                    <div class="u-s-m-b-30">

                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">SUBMIT</button>
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