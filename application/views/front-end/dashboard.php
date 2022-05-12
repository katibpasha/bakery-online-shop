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

                                <a href="<?php echo site_url('Home') ?>">Home</a>
                            </li>
                            <li class="is-marked">

                                <a href="<?php echo site_url('Member/dashboard') ?>">My Account</a>
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
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">

                            <!--====== Dashboard Features ======-->
                            <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                <div class="dash__pad-1">

                                    <span class="dash__text u-s-m-b-16">Hello, <?= $this->session->userdata('namaKonsumen') ?></span>
                                    <ul class="dash__f-list">
                                        <li>

                                            <a class="dash-active" href="<?= site_url('Member/dashboard') ?>">My Profile</a>
                                        </li>

                                        <li>

                                            <a href="<?= site_url('Member/order') ?>">My Orders</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                <div class="dash__pad-1">
                                    <ul class="dash__w-list">
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>

                                                <span class="dash__w-text"><?= $this->cart->total_items() ?></span>

                                                <span class="dash__w-name">Keranjang</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>

                                                <span class="dash__w-text"><?= $order ?></span>

                                                <span class="dash__w-name">Dibatalkan</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>

                                                <span class="dash__w-text"><?= $wishlist ?></span>

                                                <span class="dash__w-name">Wishlist</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--====== End - Dashboard Features ======-->
                        </div>
                        <div class="col-lg-9 col-md-12">
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">My Profile</h1>
                                    <?php $id = $this->session->userdata('idMember') ?>
                                    <span class="dash__text u-s-m-b-30">Lihat semua info kamu, kamu bisa mencostum profilmu.</span>
                                    <div class="row">
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <h2 class="dash__h2 u-s-m-b-8">Nama Lengkap</h2>

                                            <span class="dash__text"><?= $this->session->userdata('namaKonsumen') ?></span>
                                        </div>
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>

                                            <span class="dash__text"><?= $this->session->userdata('email') ?></span>
                                            <div class="dash__link dash__link--secondary">

                                                <a href="<?= site_url('Member/edit_email/' . $id) ?>">Ubah</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <h2 class="dash__h2 u-s-m-b-8">Phone</h2>

                                            <span class="dash__text"><?= $this->session->userdata('telpon') ?></span>

                                        </div>
                                        <div class="col-lg-4 u-s-m-b-30">
                                            <h2 class="dash__h2 u-s-m-b-8">Alamat</h2>

                                            <span class="dash__text"><?= $this->session->userdata('alamat') ?></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="u-s-m-b-16">

                                                <a class="dash__custom-link btn--e-transparent-brand-b-2" href="<?= site_url('Member/edit_profile/' . $id) ?>">Edit Profile</a>
                                            </div>
                                            <div>

                                                <a class="dash__custom-link btn--e-brand-b-2" href="<?= site_url('Member/edit_password/' . $id) ?>">Change Password</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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