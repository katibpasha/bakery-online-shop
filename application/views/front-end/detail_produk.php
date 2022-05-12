<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-t-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">

                    <!--====== Product Breadcrumb ======-->
                    <div class="pd-breadcrumb u-s-m-b-30">
                        <ul class="pd-breadcrumb__list">
                            <li class="has-separator">

                                <a href="<?php echo  site_url('Home') ?>">Home</a>
                            </li>
                            <li>
                                <a>Detail Produk</a>
                            </li>
                        </ul>
                    </div>
                    <!--====== End - Product Breadcrumb ======-->


                    <!--====== Product Detail Zoom ======-->
                    <div class="pd u-s-m-b-30">
                        <div class="slider-fouc pd-wrap">
                            <div id="pd-o-initiate">
                                <div>
                                    <img class="u-img-fluid" src="<?= base_url() ?>assets/admin/produk/img/<?= $produk->foto ?>" alt="<?= $produk->foto ?>">
                                </div>
                            </div>
                        </div>
                        <div class="u-s-m-t-15">
                            <div class="slider-fouc">
                                <div id="pd-o-thumbnail">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--====== End - Product Detail Zoom ======-->
                </div>
                <div class="col-lg-7">

                    <!--====== Product Right Side Details ======-->
                    <div class="pd-detail">
                        <div>

                            <span class="pd-detail__name"><?= $produk->namaProduk ?></span>
                        </div>
                        <div>
                            <div class="pd-detail__inline">

                                <span class="pd-detail__price">Rp.<?= number_format($produk->harga - $produk->diskon, 2, ',', '.');  ?></span>
                            </div>
                        </div>
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                <span class="pd-detail__review u-s-m-l-4">

                                    <a data-click-scroll="#view-review"><?= $testi ?> Reviews</a></span>
                            </div>
                        </div>
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__inline">
                                <?php if ($produk->stok != 0) { ?>
                                    <span class="pd-detail__stock"><?= $produk->stok ?> dalam stok</span>

                                    <span class="pd-detail__left"><?= $produk->berat ?> gram</span>
                                <?php } else { ?>
                                    <span class="pd-detail__left">out of stok</span>

                                <?php } ?>

                            </div>
                        </div>
                        <div class="u-s-m-b-15">

                            <span class="pd-detail__preview-desc"><?= $produk->deskripsiProduk ?></span>
                        </div>
                        <?php if ($produk->stok != 0) : ?>
                            <div class="u-s-m-b-15">
                                <div class="pd-detail__inline">

                                    <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

                                        <a href="<?= site_url('Member/wishlist/' . $produk->idProduk) ?>">Tambahkan ke Wishlist</a>
                                </div>
                            </div>
                        <?php endif ?>
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__inline">

                                <span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>

                                    <a href="signin.html">Laporkan masalah</a>

                                </span>
                            </div>
                        </div>
                        <div class="u-s-m-b-15">
                            <ul class="pd-social-list">
                                <li>

                                    <a class="s-fb--color-hover" href="<?= $identitas->fb ?>"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>

                                    <a class="s-insta--color-hover" href="<?= $identitas->instagram ?>"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>

                                    <a class="s-wa--color-hover" href="https://wa.me/62<?= substr($identitas->contact, 1) ?>"><i class="fab fa-whatsapp"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="u-s-m-b-15">
                            <?php if ($produk->stok != 0) : ?>
                                <form class="pd-detail__form" method="POST" action="<?= site_url('Home/tambah_keranjang/' . $produk->idProduk . '/' . '1') ?>">
                                    <div class="pd-detail-inline-2">
                                        <div class="u-s-m-b-15">

                                            <!--====== Input Counter ======-->
                                            <div class="input-counter">

                                                <span class="input-counter__minus fas fa-minus"></span>

                                                <input class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="1000" name="qty">

                                                <span class="input-counter__plus fas fa-plus"></span>
                                            </div>
                                            <!--====== End - Input Counter ======-->
                                        </div>
                                        <div class="u-s-m-b-15">

                                            <button class="btn btn--e-brand-b-2" type="submit">Add to Cart</button>
                                        </div>
                                    </div>
                                </form>
                            <?php endif ?>
                        </div>
                        <div class="u-s-m-b-15">

                            <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                            <ul class="pd-detail__policy-list">
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Buyer Protection.</span>
                                </li>
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Full Refund if you don't receive your order.</span>
                                </li>
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Returns accepted if product not as described.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--====== End - Product Right Side Details ======-->
                </div>
            </div>
        </div>
    </div>

    <!--====== Product Detail Tab ======-->
    <div class="u-s-p-y-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pd-tab">
                        <div class="u-s-m-b-30">
                            <ul class="nav pd-tab__list">
                                <li class="nav-item">

                                    <a class="nav-link active" data-toggle="tab" href="#pd-desc">DESCRIPTION</a>
                                </li>
                                <li class="nav-item">

                                    <a class="nav-link" id="view-review" data-toggle="tab" href="#pd-rev">REVIEWS

                                        <span>(<?= $testi ?>)</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">

                            <!--====== Tab 1 ======-->
                            <div class="tab-pane fade show active" id="pd-desc">
                                <div class="pd-tab__desc">
                                    <div class="u-s-m-b-15">
                                        <p><?= $produk->deskripsiProduk ?></p>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <ul>
                                            <li><i class="fas fa-check u-s-m-r-8"></i>

                                                <span>Buyer Protection.</span>
                                            </li>
                                            <li><i class="fas fa-check u-s-m-r-8"></i>

                                                <span>Full Refund if you don't receive your order.</span>
                                            </li>
                                            <li><i class="fas fa-check u-s-m-r-8"></i>

                                                <span>Returns accepted if product not as described.</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Tab 1 ======-->

                            <!--====== Tab 3 ======-->
                            <div class="tab-pane" id="pd-rev">
                                <div class="pd-tab__rev">
                                    <div class="u-s-m-b-30">
                                        <div class="pd-tab__rev-score">
                                            <div class="gl-rating-style-2 u-s-m-b-8"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i></div>
                                            <div class="u-s-m-b-8">
                                                <h4>We want to hear from you!</h4>
                                            </div>
                                            <span class="gl-text">Tell us what you think about this item</span>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <form class="pd-tab__rev-f1">
                                            <div class="rev-f1__group">
                                                <div class="u-s-m-b-15">
                                                    <h2><?= $testi ?> Total Review(s)</h2>
                                                </div>
                                            </div>
                                            <?php foreach ($review as $item) : ?>
                                                <div class="rev-f1__review">
                                                    <div class="review-o u-s-m-b-15">
                                                        <div class="review-o__info u-s-m-b-8">

                                                            <span class="review-o__name"><?= $item->namaKonsumen ?></span>

                                                        </div>

                                                        <p class="review-o__text"><?= $item->testi ?></p>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                        </form>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <form class="pd-tab__rev-f2" method="POST" action="<?php echo site_url('Member/review/' . $id) ?>">
                                            <h2 class="u-s-m-b-15">Add a Review</h2>

                                            <span class="gl-text u-s-m-b-15">Your email address will not be published. Required fields are marked *</span>
                                            <div class="u-s-m-b-30">
                                                <div class="rev-f2__table-wrap gl-scroll">

                                                </div>
                                            </div>
                                            <div class="rev-f2__group">
                                                <div class="u-s-m-b-15">

                                                    <label class="gl-label" for="reviewer-text">YOUR REVIEW *</label><textarea class="text-area text-area--primary-style" id="reviewer-text" name="testi"></textarea>
                                                </div>
                                            </div>
                                            <div>
                                                <button class="btn btn--e-brand-shadow" type="submit">SUBMIT</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Tab 3 ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Product Detail Tab ======-->
</div>