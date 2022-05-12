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

                                <a href="<?= site_url('Member/my_wishlist') ?>">Wishlist</a>
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

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary">Wishlist</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <!--====== Wishlist Product ======-->
                        <?php if (empty($wishlist)) : ?>
                            <div class="section__intro u-s-m-b-60">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="section__text-wrap">
                                                <h1 class="section__heading u-c-secondary">Your Wishlist is Empty</h1>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                        <?php foreach ($wishlist as $item) : ?>
                            <div class="w-r u-s-m-b-30">
                                <div class="w-r__container">
                                    <div class="w-r__wrap-1">
                                        <div class="w-r__img-wrap">

                                            <img class="u-img-fluid" src="<?= base_url() ?>assets/admin/produk/img/<?= $item->foto ?>" alt="<?= $item->foto ?>">
                                        </div>
                                        <div class="w-r__info">

                                            <span class="w-r__name">

                                                <a href="<?= site_url('Home/detail_produk/' . $item->idProduk) ?>"><?= $item->namaProduk ?></a></span>

                                            <span class="w-r__category">

                                                <a><?= $item->namaKat ?></a></span>

                                            <span class="w-r__price">Rp.<?= number_format($item->harga - $item->diskon, 2, ',', '.');  ?>
                                        </div>
                                    </div>
                                    <div class="w-r__wrap-2">

                                        <a class="w-r__link btn--e-brand-b-2" data-modal="modal" data-modal-id="#add-to-cart" href="<?= site_url('Home/tambah_keranjang/' . $item->idProduk . '/' . '1') ?>">ADD TO CART</a>

                                        <a class="w-r__link btn--e-transparent-platinum-b-2" href="<?= site_url('Home/detail_produk/' . $item->idProduk) ?>">VIEW</a>

                                        <a class="w-r__link btn--e-transparent-platinum-b-2" href="<?= site_url('Member/hapus/' . $item->id) ?>">REMOVE</a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <!--====== End - Wishlist Product ======-->



                    </div>
                    <?php if ($wishlist) : ?>
                        <div class="col-lg-12">
                            <div class="route-box">
                                <div class="route-box__g">

                                    <a class="route-box__link" href="<?= site_url('Home') ?>"><i class="fas fa-long-arrow-alt-left"></i>

                                        <span>CONTINUE SHOPPING</span></a>
                                </div>
                                <div class="route-box__g">

                                    <a class="route-box__link" href="<?= site_url('Member/clear') ?>"><i class="fas fa-trash"></i>

                                        <span>CLEAR WISHLIST</span></a>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>