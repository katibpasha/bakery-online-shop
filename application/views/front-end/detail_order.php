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
                            <h1 class="dash__h1 u-s-m-b-30">Detail Order</h1>
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                <div class="dash__pad-2">
                                    <div class="dash-l-r">
                                        <div>
                                            <div class="manage-o__text-2 u-c-secondary">Invoice #<?= $transaksi->idTransaksi ?></div>
                                            <div class="manage-o__text u-c-silver">Diorder pada <?= date('d-m-Y', strtotime($transaksi->tglTransaksi)) ?></div>
                                        </div>
                                        <div>
                                            <div class="manage-o__text-2 u-c-silver">Total:

                                                <span class="manage-o__text-2 u-c-secondary">Rp.<?= number_format($transaksi->totalBelanja, 2, ',', '.'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                <div class="dash__pad-2">
                                    <div class="manage-o">
                                        <div class="manage-o__timeline">
                                            <div class="timeline-row">
                                                <div class="col-lg-3 u-s-m-b-30">
                                                    <div class="timeline-step">
                                                        <div class="timeline-l-i timeline-l-i--finish">

                                                            <span class="timeline-circle"></span>
                                                        </div>
                                                        <?php if ($transaksi->status == 'Belum Bayar') : ?>
                                                            <span class="timeline-text"><?= $transaksi->status ?></span>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 u-s-m-b-30">
                                                    <div class="timeline-step">
                                                        <div class="timeline-l-i timeline-l-i--finish">

                                                            <span class="timeline-circle"></span>
                                                        </div>
                                                        <?php if ($transaksi->status == 'Dalam Pengecekan' || $transaksi->status == 'Ditolak') : ?>
                                                            <span class="timeline-text"><?= $transaksi->status ?></span>
                                                            <?php if ($transaksi->status == 'Ditolak') : ?>
                                                                <small>"Silakan konfirmasi ulang dengan menekan tombol bayar sekarang di bawah"</small>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 u-s-m-b-30">
                                                    <div class="timeline-step">
                                                        <div class="timeline-l-i timeline-l-i--finish">

                                                            <span class="timeline-circle"></span>
                                                        </div>
                                                        <?php if ($transaksi->status == 'Dikirim') : ?>
                                                            <span class="timeline-text"><?= $transaksi->status ?></span>
                                                            <?php if ($transaksi->status == 'Dikirim') : ?>
                                                                <small>Jika barang telah diterima tekan tombol pesanan diterima di bawah</small>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 u-s-m-b-30">
                                                    <div class="timeline-step">
                                                        <div class="timeline-l-i timeline-l-i--finish">

                                                            <span class="timeline-circle"></span>
                                                        </div>
                                                        <?php if ($transaksi->status == 'Diterima' || $transaksi->status == 'Dibatalkan') : ?>
                                                            <span class="timeline-text"><?= $transaksi->status ?></span>
                                                            <?php if ($transaksi->status == 'Diterima') : ?>
                                                                <small>Terima kasih telah berbelanja ditempat kami</small>
                                                            <?php endif ?>
                                                            <?php if ($transaksi->status == 'Dibatalkan') : ?>
                                                                <small>Mohon maaf atas ketidaknyamanan-nya</small>
                                                            <?php endif ?>
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php foreach ($detail as $item) : ?>
                                            <div class="manage-o__description u-s-m-b-30">
                                                <div class="description__container">
                                                    <div class="description__img-wrap">

                                                        <img class="u-img-fluid" src="<?= base_url() ?>assets/admin/produk/img/<?= $item->foto ?>" alt="<?= $item->foto ?>">
                                                    </div>
                                                    <div class="description-title"><?= $item->namaProduk ?></div>
                                                </div>
                                                <div class="description__info-wrap">
                                                    <div>

                                                        <span class="manage-o__text-2 u-c-silver">Quantity:

                                                            <span class="manage-o__text-2 u-c-secondary"><?= $item->qty ?></span></span>
                                                    </div>
                                                    <div>

                                                        <span class="manage-o__text-2 u-c-silver">Total:

                                                            <span class="manage-o__text-2 u-c-secondary">Rp.<?= number_format($item->subHarga, 2, ',', '.'); ?></span></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                        <div class="dash__pad-3">
                                            <h2 class="dash__h2 u-s-m-b-8">Alamat Tujuan</h2>
                                            <h2 class="dash__h2 u-s-m-b-8"><?= $transaksi->namaKonsumen ?></h2>

                                            <span class="dash__text-2"><?= $transaksi->alamatPengiriman ?></span>

                                            <span class="dash__text-2">(+62) <?= substr($this->session->userdata('telpon'), 1) ?></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-6">
                                    <div class="dash__box dash__box--bg-white dash__box--shadow u-h-100">
                                        <div class="dash__pad-3">
                                            <h2 class="dash__h2 u-s-m-b-8">Total Summary</h2>
                                            <div class="dash-l-r u-s-m-b-8">
                                                <div class="manage-o__text-2 u-c-secondary">Ongkir</div>
                                                <div class="manage-o__text-2 u-c-secondary">Rp.<?= number_format($transaksi->biaya, 2, ',', '.'); ?></div>
                                            </div>
                                            <div class="dash-l-r u-s-m-b-8">
                                                <div class="manage-o__text-2 u-c-secondary">Total</div>
                                                <div class="manage-o__text-2 u-c-secondary">Rp.<?= number_format($transaksi->totalBelanja, 2, ',', '.'); ?></div>
                                            </div>
                                            <span class="dash__text-2">Silahkan Bayar Tagihan Anda Segera</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php if ($transaksi->status == 'Belum Bayar' || $transaksi->status == 'Ditolak') : ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="u-s-m-b-16">
                                            <a class="dash__custom-link btn--e-transparent-brand-b-2" href="<?= site_url('Konfirmasi/index/' . $transaksi->idTransaksi) ?>">Bayar Sekarang</a>
                                            <a class="dash__custom-link btn--e-brand-b-2 tombol-batal" href="<?= site_url('Konfirmasi/batalkan/' . $transaksi->idTransaksi) ?>">Batalkan Belanja</a>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                            <?php if ($transaksi->status == 'Dikirim') : ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="u-s-m-b-16">
                                            <a class="dash__custom-link btn--e-brand-b-2" href="<?= site_url('Member/pesanan_diterima/' . $transaksi->idTransaksi) ?>">Pesanan Diterima</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>