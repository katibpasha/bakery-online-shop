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
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
                                <div class="dash__pad-2">
                                    <h1 class="dash__h1 u-s-m-b-14">Edit Profile</h1>

                                    <span class="dash__text u-s-m-b-30">Silahkan Update Profile Anda</span>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form class="dash-edit-p" method="POST" action="<?= site_url('Member/action_edit/' . 'password') ?>">
                                                <div class="gl-inline">
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="reg-fname">Password *</label>
                                                        <input type="hidden" name="id" value="<?= $member->idMember ?>">
                                                        <input class="input-text input-text--primary-style" type="password" id="reg-fname" placeholder="Password" name="pass1">
                                                        <?= form_error('pass1', '<small class="text-danger" style="color: red;">', '</small>') ?>
                                                    </div>
                                                    <div class="u-s-m-b-30">

                                                        <label class="gl-label" for="reg-fname">Confirm Password *</label>
                                                        <input class="input-text input-text--primary-style" type="password" id="reg-fname" placeholder="Confirm Password" name="pass2">
                                                        <?= form_error('pass2', '<small class="text-danger" style="color: red;">', '</small>') ?>
                                                    </div>
                                                </div>

                                                <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                                            </form>
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