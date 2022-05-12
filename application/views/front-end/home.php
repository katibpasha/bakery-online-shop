<div class="main-content">
    <!--====== App Content ======-->
    <div class="app-content">
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="flash-berhasil" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
            <?php unset($_SESSION['flash']); ?>
        <?php endif; ?>
        <?php if ($this->session->flashdata('flash-gagal')) : ?>
            <div class="flash-gagal" data-flash="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
            <?php unset($_SESSION['flash-gagal']); ?>
        <?php endif; ?>

        <!--====== Primary Slider ======-->
        <div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
            <div class="owl-carousel primary-style-1" id="hero-slider">
                <?php $x = 1;
                foreach ($banner as $item) : ?>
                    <div class="hero-slide hero-slide--<?= $x++ ?>" style="background-size: auto; background-image: url(<?= base_url() ?>assets/admin/banner/img/<?= $item->banner ?>);">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="slider-content slider-content--animation">

                                        <span class="content-span-1 u-c-secondary" style="color: white !important; font-weight: bold; text-shadow:2px 2px #000000;"><?= $item->text1 ?></span>

                                        <span class="content-span-2 u-c-secondary" style="color: white !important; font-weight: bold; text-shadow:2px 2px #000000;"><?= $item->text2 ?></span>

                                        <span class="content-span-3 u-c-secondary" style="color: white !important; font-weight: bold; text-shadow:2px 2px #000000;"><?= $item->text3 ?></span>

                                        <span class="content-span-4 u-c-secondary" style="color: white !important; font-weight: bold; text-shadow:2px 2px #000000;">Starting At

                                            <span class="u-c-brand">Rp.<?= number_format($item->harga, 2, ',', '.'); ?></span></span>

                                        <a class="shop-now-link btn--e-brand" href="#produk_terbaru">SHOP NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <!--====== End - Primary Slider ======-->


        <!--====== Section 2 ======-->
        <br>
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-16">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary u-s-m-b-12">PRODUK KAMI</h1>

                                <span class="section__span u-c-silver">PILIH FAVORITMU</span>
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
                        <div class="col-lg-12">
                            <div class="filter-category-container">
                                <div class="filter__category-wrapper">

                                    <button class="btn filter__btn filter__btn--style-1 js-checked" type="button" data-filter="*">ALL</button>
                                </div>
                                <!-- <div class="filter__category-wrapper">

                                    <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".headphone">HEADPHONES</button>
                                </div>
                                <div class="filter__category-wrapper">

                                    <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".smartphone">SMARTPHONES</button>
                                </div>
                                <div class="filter__category-wrapper">

                                    <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".sportgadget">SPORT GADGETS</button>
                                </div>
                                <div class="filter__category-wrapper">

                                    <button class="btn filter__btn filter__btn--style-1" type="button" data-filter=".dslr">DSLR</button>
                                </div> -->
                            </div>
                            <div class="filter__grid-wrapper u-s-m-t-30">
                                <div class="row">
                                    <?php foreach ($produk as $item) : ?>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item headphone">
                                            <div class="product-o product-o--hover-on product-o--radius">
                                                <div class="product-o__wrap">

                                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                                        <img class="aspect__img" src="<?= base_url() ?>assets/admin/produk/img/<?= $item->foto ?>" alt="<?= $item->foto ?>"></a>
                                                    <div class="product-o__action-wrap">
                                                        <ul class="product-o__action-list">
                                                            <?php if ($item->stok != 0) : ?>
                                                                <li>
                                                                    <a id="set_dtl" data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View" data-id="<?= $item->idProduk ?>" data-kat="<?= $item->namaKat ?>" data-produk="<?= $item->namaProduk ?>" data-foto="<?= $item->foto ?>" data-harga="<?= $item->harga - $item->diskon ?>" data-stok="<?= $item->stok ?>" data-berat="<?= $item->berat ?>" data-deskripsi="<?= htmlspecialchars($item->deskripsiProduk) ?>"><i class="fas fa-search-plus"></i></a>
                                                                </li>

                                                                <li>
                                                                    <a href="<?= site_url('Home/tambah_keranjang/' . $item->idProduk . '/' . '1') ?>" data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                                                </li>

                                                                <li>

                                                                    <a href="<?= site_url('Member/wishlist/' . $item->idProduk) ?>" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                                                </li>
                                                            <?php endif ?>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <span class="product-o__category"><small><?= $item->namaKat ?></small></span>

                                                <span class="product-o__name">

                                                    <a href="<?= site_url('Home/detail_produk/' . $item->idProduk) ?>"><?= ucfirst($item->namaProduk)  ?></a></span>

                                                <span class="product-o__price">Rp.<?= number_format($item->harga - $item->diskon, 2, ',', '.');  ?></span>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->

        <!--====== Section 4 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46" id="produk_terbaru">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary u-s-m-b-12">PRODUK TERBARU</h1>

                                <span class="section__span u-c-silver">DAPATKAN PRODUK TERBARU</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->


            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="slider-fouc">
                        <div class="owl-carousel product-slider" data-item="4">
                            <?php foreach ($terbaru as $item) : ?>
                                <div class="u-s-m-b-30">
                                    <div class="product-o product-o--hover-on">
                                        <div class="product-o__wrap">

                                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                                <img class="aspect__img" src="<?= base_url() ?>assets/admin/produk/img/<?= $item->foto ?>" alt="<?= $item->foto ?>"></a>
                                            <div class="product-o__action-wrap">
                                                <ul class="product-o__action-list">
                                                    <li>

                                                        <a id="set_dtl" data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View" data-id="<?= $item->idProduk ?>" data-kat="<?= $item->namaKat ?>" data-produk="<?= $item->namaProduk ?>" data-foto="<?= $item->foto ?>" data-harga="<?= $item->harga - $item->diskon ?>" data-stok="<?= $item->stok ?>" data-berat="<?= $item->berat ?>" data-deskripsi="<?= htmlspecialchars($item->deskripsiProduk) ?>"><i class="fas fa-search-plus"></i></a>
                                                    </li>
                                                    <li>

                                                        <a href="<?= site_url('Home/tambah_keranjang/' . $item->idProduk . '/' . '1') ?>" data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                                    </li>
                                                    <li>

                                                        <a href="<?= site_url('Member/wishlist/' . $item->idProduk) ?>" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        <span class="product-o__category">

                                            <small><?= $item->namaKat ?></small></span>

                                        <span class="product-o__name">

                                            <a href="<?= site_url('Home/detail_produk/' . $item->idProduk) ?>"> <?= ucfirst($item->namaProduk)  ?></a></span>

                                        <span class="product-o__price">Rp.<?= number_format($item->harga - $item->diskon, 2, ',', '.');  ?>

                                        </span>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 4 ======-->

        <!--====== Section 11 ======-->
        <div class="u-s-p-b-90 u-s-m-b-30">

            <!--====== Section Intro ======-->
            <div class="section__intro u-s-m-b-46">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section__text-wrap">
                                <h1 class="section__heading u-c-secondary u-s-m-b-12" id="testimoni">TESTIMONI</h1>

                                <span class="section__span u-c-silver">APA YANG PELANGGAN KAMI KATAKAN</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Intro ======-->


            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">

                    <!--====== Testimonial Slider ======-->
                    <div class="slider-fouc">
                        <div class="owl-carousel" id="testimonial-slider">
                            <?php foreach ($review as $item) : ?>
                                <div class="testimonial">
                                    <div class="testimonial__content-wrap">

                                        <span class="testimonial__double-quote"><i class="fas fa-quote-right"></i></span>
                                        <blockquote class="testimonial__block-quote">
                                            <p>"<?= $item->Review ?>"</p>
                                        </blockquote>

                                        <span class="testimonial__author"><?= $item->namaKonsumen ?></span>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <!--====== End - Testimonial Slider ======-->
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
    </div>
</div>