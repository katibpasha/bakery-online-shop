<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="<?= base_url() ?>assets/admin/banner/img/favicon.jpg" rel="shortcut icon">
    <title><?= $title ?></title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/sweetalert/sweetalert2.min.css">
    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>css/app.css">

    <style>
        * {
            scroll-behavior: smooth;
        }
    </style>

</head>

<body class="config">
    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        <header class="header--style-1">

            <!--====== Nav 1 ======-->
            <nav class="primary-nav primary-nav-wrapper--border">
                <div class="container">

                    <!--====== Primary Nav ======-->
                    <div class="primary-nav">

                        <!--====== Main Logo ======-->

                        <a class="main-logo" href="index.html">

                            <img src="images/logo/logo-1.png" alt=""></a>
                        <!--====== End - Main Logo ======-->


                        <!--====== Search Form ======-->
                        <form class="main-form">

                            <label for="main-search"></label>

                            <input class="input-text input-text--border-radius input-text--style-1" type="text" id="main-search" placeholder="Search">

                            <button class="btn btn--icon fas fa-search main-search-button" type="submit"></button>
                        </form>
                        <!--====== End - Search Form ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation">

                            <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cogs" type="button"></button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                    <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Account">

                                        <a><i class="far fa-user-circle"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:120px">
                                            <?php if ($this->session->userdata('namaKonsumen')) : ?>
                                                <li>
                                                    <a href="<?php echo site_url('Member/dashboard') ?>"><i class="fas fa-user-circle u-s-m-r-6"></i>

                                                        <span>Account</span></a>
                                                </li>
                                            <?php endif ?>
                                            <?php if (!$this->session->userdata('namaKonsumen')) : ?>
                                                <li>

                                                    <a href="<?= base_url('Home/signup') ?>"><i class="fas fa-user-plus u-s-m-r-6"></i>

                                                        <span>Signup</span></a>
                                                </li>
                                                <li>

                                                    <a href="<?= base_url('Home/signin') ?>"><i class="fas fa-lock u-s-m-r-6"></i>

                                                        <span>Signin</span></a>
                                                </li>
                                            <?php endif ?>
                                            <?php if ($this->session->userdata('namaKonsumen')) : ?>
                                                <li>

                                                    <a href="<?php echo site_url('Member/logout') ?>"><i class="fas fa-lock-open u-s-m-r-6"></i>

                                                        <span>Signout</span></a>
                                                </li>
                                            <?php endif ?>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li data-tooltip="tooltip" data-placement="left" title="Contact">
                                        <a href="https://wa.me/62<?= substr($identitas->contact, 1) ?>" target="_blank"><i class="fas fa-phone-volume"></i></a>
                                    </li>
                                    <li data-tooltip="tooltip" data-placement="left" title="Mail">

                                        <a href="mailto:<?= $identitas->mail ?>"><i class="far fa-envelope"></i></a>
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Primary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 1 ======-->


            <!--====== Nav 2 ======-->
            <nav class="secondary-nav-wrapper" style="box-shadow: 2px 2px 5px rgba(0,0,0,0.1) !important;">
                <div class="container">

                    <!--====== Secondary Nav ======-->
                    <div class="secondary-nav">

                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation1">
                            <img src="<?= base_url() ?>assets/admin/banner/img/favicon.jpg" alt="favicon.jpg" width="40px">
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation2">

                            <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cog" type="button"></button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design2 ah-list--link-color-secondary">
                                    <li>
                                        <a href="#produk_terbaru">PRODUK TERBARU</a>
                                    </li>

                                    <li>
                                        <a href="shop-side-version-2.html">ABOUT US</a>
                                    </li>
                                    <li>
                                        <a href="#testimoni">TESTIMONI</a>
                                    </li>
                                    <?php if (!$this->session->userdata('namaKonsumen')) : ?>
                                        <li>
                                            <a href="<?= site_url('Home/signin') ?>">LOGIN</a>
                                        </li>
                                    <?php endif ?>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation3">

                            <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-shopping-bag toggle-button-shop" type="button"></button>

                            <span class="total-item-round"><?= $this->cart->total_items() ?></span>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                    <li>
                                        <a href="<?= site_url('Home') ?>"><i class="fas fa-home"></i></a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('Member/my_wishlist') ?>"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li class="has-dropdown">
                                        <a class="mini-cart-shop-link" id="keranjang"><i class="fas fa-shopping-bag"></i>
                                            <span class="total-item-round"><?= $this->cart->total_items() ?></span></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <?php if ($this->cart->contents()) : ?>
                                            <div class="mini-cart">

                                                <!--====== Mini Product Container ======-->

                                                <?php foreach ($this->cart->contents() as $item) : ?>
                                                    <div class="mini-product-container gl-scroll u-s-m-b-15">

                                                        <!--====== Card for mini cart ======-->

                                                        <!--====== End - Card for mini cart ======-->


                                                        <!--====== Card for mini cart ======-->
                                                        <div class="card-mini-product o-summary__item-wrap gl-scroll">
                                                            <div class="mini-product ">
                                                                <div class="mini-product__image-wrapper">

                                                                    <a class="mini-product__link" href="product-detail.html">

                                                                        <img class="u-img-fluid" src="<?= base_url() ?>assets/admin/produk/img/<?= $item['foto'] ?>" alt="<?= $item['foto'] ?>"></a>
                                                                </div>
                                                                <div class="mini-product__info-wrapper">

                                                                    <span class="mini-product__name">

                                                                        <a><?= $item['name'] ?></a></span>

                                                                    <span class="mini-product__quantity">qty: <?= $item['qty'] ?></span>

                                                                    <span class="mini-product__price">Rp.<?php echo number_format($item['subtotal'], 2, ',', '.'); ?></span>
                                                                </div>
                                                            </div>

                                                            <a href="<?= base_url('Home/hapus_keranjang/' . $item['rowid']) ?>" class="btn btn-warning">Hapus</a>
                                                        </div>

                                                    </div>
                                                <?php endforeach ?>
                                                <!--====== End - Mini Product Container ======-->


                                                <!--====== Mini Product Statistics ======-->
                                                <div class="mini-product-stat">
                                                    <div class="mini-total">

                                                        <span class="subtotal-text">TOTAL</span>

                                                        <span class="subtotal-value">Rp.<?php echo number_format($this->cart->total(), 2, ',', '.'); ?></span>
                                                    </div>
                                                    <div class="mini-action">

                                                        <a class="mini-link btn--e-brand-b-2" href="<?= site_url('Checkout') ?>">PROCEED TO CHECKOUT</a>

                                                    </div>
                                                </div>
                                                <!--====== End - Mini Product Statistics ======-->
                                            </div>
                                        <?php endif ?>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Secondary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 2 ======-->
        </header>
        <!--====== End - Main Header ======-->
        <?= $contents ?>
        <!--====== Main Footer ======-->
        <footer>
            <div class="outer-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="outer-footer__content u-s-m-b-40">

                                <span class="outer-footer__content-title">Contact Us</span>
                                <div class="outer-footer__text-wrap"><i class="fas fa-home"></i>

                                    <span>Your address here</span>
                                </div>
                                <div class="outer-footer__text-wrap"><i class="fas fa-phone-volume"></i>

                                    <span>(+62) <?= substr($identitas->contact, 1)  ?> </span>
                                </div>
                                <div class="outer-footer__text-wrap"><i class="far fa-envelope"></i>

                                    <span><?= $identitas->mail  ?></span>
                                </div>
                                <div class="outer-footer__social">
                                    <ul>
                                        <li>

                                            <a class="s-fb--color-hover" href="<?= $identitas->fb  ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                        </li>

                                        <li>

                                            <a class="s-insta--color-hover" href="<?= $identitas->instagram  ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="outer-footer__content u-s-m-b-40">

                                        <span class="outer-footer__content-title">Information</span>
                                        <div class="outer-footer__list-wrap">
                                            <ul>
                                                <li>

                                                    <a href="#keranjang">Cart</a>
                                                </li>
                                                <li>

                                                    <a href="<?php echo site_url('Member/dashboard') ?>">Account</a>
                                                </li>
                                                <li>

                                                    <a href="<?php echo site_url('Home') ?>">Shop</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="outer-footer__content u-s-m-b-40">
                                        <div class="outer-footer__list-wrap">

                                            <span class="outer-footer__content-title">Our Company</span>
                                            <ul>
                                                <li>

                                                    <a href="about.html">About us</a>
                                                </li>
                                                <li>

                                                    <a href="https://wa.me/62<?= substr($identitas->contact, 1) ?>" target="_blank">Contact Us</a>
                                                </li>

                                                <li>

                                                    <a href="<?php echo site_url('Home') ?>">Store</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="outer-footer__content">

                                <span class="outer-footer__content-title">Masukan Pendapat Anda Tentang Kami</span>
                                <form class="newsletter" method="POST" action="<?= site_url('Member/testimoni') ?>">

                                    <div class="newsletter__group">

                                        <label for="newsletter"></label>

                                        <input class="input-text input-text--only-white" type="text" id="newsletter" placeholder="Masukan Pendapat Anda" name="testi">

                                        <button class="btn btn--e-brand newsletter__btn" type="submit">Testimoni</button>
                                    </div>

                                    <span class="newsletter__text">Thank You for Testimonials</span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="lower-footer__content">
                                <div class="lower-footer__copyright">

                                    <span>Copyright © 2021</span>

                                    <a href="https://github.com/vickyir">Pengabdian Masyarakat</a>

                                    <span>All Right Reserved</span>
                                </div>
                                <!-- <div class="lower-footer__payment">
                                    <ul>
                                        <li><i class="fab fa-cc-stripe"></i></li>
                                        <li><i class="fab fa-cc-paypal"></i></li>
                                        <li><i class="fab fa-cc-mastercard"></i></li>
                                        <li><i class="fab fa-cc-visa"></i></li>
                                        <li><i class="fab fa-cc-discover"></i></li>
                                        <li><i class="fab fa-cc-amex"></i></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!--====== Modal Section ======-->


        <!--====== Quick Look Modal ======-->

        <div class="modal fade quick-look" id="quick-look">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal--shadow">
                    <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-5">

                                <!--====== Product Breadcrumb ======-->
                                <div class="pd-breadcrumb u-s-m-b-30">
                                    <ul class="pd-breadcrumb__list">
                                        <li>
                                            <a href="<?= base_url('Home') ?>">Home</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--====== End - Product Breadcrumb ======-->


                                <!--====== Product Detail ======-->
                                <div class="pd u-s-m-b-30">
                                    <div class="pd-wrap">
                                        <div id="js-product-detail-modal">
                                            <div>
                                                <img class="u-img-fluid" id="foto" src="images/product/product-d-1.jpg" alt="">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--====== End - Product Detail ======-->
                            </div>
                            <div class="col-lg-7">

                                <!--====== Product Right Side Details ======-->
                                <div class="pd-detail">
                                    <div>

                                        <span class="pd-detail__name" id="produk"></span>
                                    </div>
                                    <div>
                                        <div class="pd-detail__inline">
                                            <span class="pd-detail__price" id="harga"></span>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-15">

                                    </div>
                                    <div class="u-s-m-b-15">
                                        <div class="pd-detail__inline">
                                            <span class="pd-detail__stock" id="stok"></span>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <span class="pd-detail__preview-desc" id="deskripsi"></span>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <div class="pd-detail__inline">
                                            <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>
                                                <a href="" id="wish">Tambahkan ke Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <div class="pd-detail__inline">

                                            <span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>
                                                <a href="mailto:<?= $identitas->mail ?>">Laporkan Masalah</a>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <ul class="pd-social-list">
                                            <li>
                                                <a class="s-fb--color-hover" href="<?= $identitas->fb ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a class="s-insta--color-hover" href="<?= $identitas->instagram ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a class="s-wa--color-hover" href="https://wa.me/62<?= substr($identitas->contact, 1) ?>" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <form class="pd-detail__form" method="POST" action="" id="keranjang2">
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
            </div>
        </div>
    </div>
    <!--====== End - Main App ======-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/admin') ?>/sweetalert/sweetalert2.min.js"></script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>
    <script src="<?= base_url('assets/admin') ?>/assets/js/stisla.js"></script>

    <!--====== Vendor Js ======-->
    <script src="<?= base_url('assets/user/') ?>js/vendor.js"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="<?= base_url('assets/user/') ?>js/jquery.shopnav.js"></script>

    <!--====== App ======-->
    <script src="<?= base_url('assets/user/') ?>js/app.js"></script>
    <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
    <script>
        $('.tombol-batal').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "data transaksi akan dibatalkan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Batalkan Belanja!',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')

        $(document).ready(function() {
            $(document).on('click', '#set_dtl', function() {
                var id = $(this).data('id');
                var kat = $(this).data('kat');
                var produk = $(this).data('produk');
                var foto = $(this).data('foto');
                var harga = $(this).data('harga');
                var deskripsi = $(this).data('deskripsi');
                var stok = $(this).data('stok');
                var berat = $(this).data('berat');

                $('#produk').text(produk);
                $('#harga').text('Rp.' + harga);
                $('#stok').text(stok + ' Dalam Stok');
                $('#deskripsi').html(deskripsi);
                $('#foto').attr('src', '<?= base_url() ?>assets/admin/produk/img/' + foto);
                $('#wish').attr('href', '<?= base_url() ?>Member/wishlist/' + id);
                $('#keranjang2').attr('action', '<?= base_url() ?>Home/tambah_keranjang/' + id + '/' + '1');

                // console.log($('#foto').attr('src', '<?= base_url() ?>assets/admin/produk/img/' + foto));

            });
        });

        $(document).ready(function() {
            $('#ongkos').change(function() {
                var ongkir = $('#ongkos option:selected').data('ongkir');
                var number_string = ongkir.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                $('#ongkir').text('Rp.' + rupiah);

                var grandTotal = <?= $this->cart->total() ?> + ongkir;
                var number_string = grandTotal.toString(),
                    sisa = number_string.length % 3,
                    rupiah = number_string.substr(0, sisa),
                    ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');

                }

                $('#grand-total').val('Rp.' + rupiah);
            });
        });

        const flashBerhasil = $('.flash-berhasil').data('flash');
        if (flashBerhasil) {
            Swal.fire({
                title: 'Data',
                text: flashBerhasil,
                icon: 'success'
            });
        }

        const flashGagal = $('.flash-gagal').data('flash');
        if (flashGagal) {
            Swal.fire({
                title: 'Data',
                text: flashGagal,
                icon: 'warning'
            });
        }
    </script>

    <!--====== Noscript ======-->
    <noscript>
        <div class="app-setting">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="app-setting__wrap">
                            <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                            <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </noscript>
</body>

</html>