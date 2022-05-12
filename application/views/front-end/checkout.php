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

                                <a href="<?= site_url('Checkout') ?>">Checkout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->



    <!--====== Section 3 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="checkout-f">
                    <div class="row">

                        <div class="col-lg-6">
                            <h1 class="checkout-f__h1">RINGKASAN ORDER</h1>

                            <!--====== Order Summary ======-->
                            <div class="o-summary">
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__item-wrap gl-scroll">
                                        <?php foreach ($this->cart->contents() as $item) : ?>
                                            <div class="o-card">
                                                <div class="o-card__flex">
                                                    <div class="o-card__img-wrap">

                                                        <img class="u-img-fluid" src="<?= base_url() ?>assets/admin/produk/img/<?= $item['foto'] ?>" alt="<?= $item['foto'] ?>">
                                                    </div>
                                                    <div class="o-card__info-wrap">

                                                        <span class="o-card__name">

                                                            <a href="<?= site_url('Home/detail_produk/' . $item['id']) ?>"><?= $item['name'] ?></a></span>

                                                        <span class="o-card__quantity">Quantity x <?= $item['qty'] ?></span>

                                                        <span class="o-card__price">Rp.<?= number_format($item['subtotal'], 2, ',', '.'); ?></span>
                                                    </div>
                                                </div>

                                                <a class="o-card__del far fa-trash-alt" href="<?= site_url('Checkout/hapus_keranjang/' . $item['rowid']) ?>"></a>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                                <form method="POST" action="<?= site_url('Checkout/action_checkout') ?>">
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <table class="o-summary__table">
                                                <tbody>
                                                    <tr>
                                                        <td>ONGKIR</td>
                                                        <td id="ongkir"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>SUBTOTAL</td>
                                                        <td>Rp.<?= number_format($this->cart->total(), 2, ',', '.'); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>GRAND TOTAL</td>
                                                        <td align="right"><input type="text" name="total" id="grand-total" style="border: none; text-align: right !important; font-weight: bold;" required readonly style="width: 10px !important;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        <td align="right"><?= form_error('total', '<small class="text-danger" style="color: red;">', '</small>') ?></td>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                            </div>
                            <!--====== End - Order Summary ======-->
                        </div>

                        <div class="col-lg-6" style="margin-top: 10px;">
                            <h1 class="checkout-f__h1">ONGKIR, REKENING, & ALAMAT</h1>
                            <div class="o-summary__section u-s-m-b-30">
                                <div class="o-summary__box">

                                    <div class="ship-b">
                                        <div class="u-s-m-b-30">
                                            <input type="hidden" name="id" value="<?= $invoice ?>">
                                            <label class="gl-label" for="address-state">Ongkir *</label>
                                            <select class="select-box select-box--primary-style" id="ongkos" name="ongkir">
                                                <option value="gagal" selected>Silahkan Pilih Ongkir</option>
                                                <?php foreach ($ongkir as $item) : ?>
                                                    <option class="ongkos" value="<?= $item->idBiayaKirim ?>" data-ongkir="<?= $item->biaya ?>"><?= $item->namaKurir ?> - <?= $item->kotaTujuan ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <!--====== End - Select Box ======-->
                                        </div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="address-state">Rekening *</label>
                                            <select class="select-box select-box--primary-style" name="rekening">
                                                <option value="gagal" selected>Silahkan Pilih Rekening</option>
                                                <?php foreach ($rekening as $item) : ?>
                                                    <option class="ongkos" value="<?= $item->id ?>"><?= $item->noRekening ?> - <?= $item->namaRekening ?></option>
                                                <?php endforeach ?>
                                            </select>
                                            <!--====== End - Select Box ======-->
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="address-phone">Alamat Lengkap Pengiriman *</label>

                                            <input class="input-text input-text--primary-style" type="text" id="address-phone" name="alamat">
                                            <?= form_error('alamat', '<small class="text-danger" style="color: red;">', '</small>') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="o-summary__section u-s-m-b-30">
                                <div class="o-summary__box">
                                    <h1 class="checkout-f__h1">INFORMATION</h1>

                                    <div class="u-s-m-b-15">

                                        <!--====== Check Box ======-->
                                        <div class="check-box">

                                            <input type="checkbox" id="term-and-condition" required>
                                            <div class="check-box__state check-box__state--primary">

                                                <label class="check-box__label" for="term-and-condition">Toko Kami</label>
                                            </div>
                                        </div>
                                        <!--====== End - Check Box ======-->

                                        <a class="gl-link">Terms of Service.</a>
                                        <br>
                                        <small>Dengan melakukan order berarti anda setuju dengan syarat dan ketentuan yang ada pada toko kami</small>
                                    </div>
                                    <div>

                                        <button class="btn btn--e-brand-b-2" type="submit">PLACE ORDER</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 3 ======-->
</div>