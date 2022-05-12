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

                                <a href="<?php echo site_url('Member/order') ?>">My Account</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="flash-berhasil" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
        <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
    <?php if ($this->session->flashdata('flash-gagal')) : ?>
        <div class="flash-gagal" data-flash="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
        <?php unset($_SESSION['flash-gagal']); ?>
    <?php endif; ?>

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

                                            <a href="<?= site_url('Member/dashboard') ?>">My Profile</a>
                                        </li>

                                        <li>

                                            <a class="dash-active" href="<?= site_url('Member/order') ?>">My Orders</a>
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
                                    <h1 class="dash__h1 u-s-m-b-14">My Orders</h1>
                                    <span class="dash__text u-s-m-b-30">Kamu bisa mengecek orderan mu disini.</span>
                                    <div class="m-order__list">
                                        <?php foreach ($transaksi as $item) : ?>
                                            <div class="m-order__get" style="background-color: #E5c28d !important; box-shadow: 1px 1px 8px rgba(0,0,0,0.2);">
                                                <div class="manage-o__header u-s-m-b-30">
                                                    <div class="dash-l-r">
                                                        <div>
                                                            <div class="manage-o__text-2 u-c-secondary">Invoice #<?= $item->idTransaksi ?></div>
                                                            <div class="manage-o__text u-c-white">Diorder pada <?= date('d-m-Y', strtotime($item->tglTransaksi))  ?></div>
                                                        </div>
                                                        <div>
                                                            <div class="dash__link dash__link--brand">

                                                                <a href="<?= site_url('Member/detail_order/' . $item->idTransaksi) ?>">MANAGE</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                    <?= $this->pagination->create_links() ?>

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