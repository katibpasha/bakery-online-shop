      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Manajemen Produk</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Produk</a></div>
                      <div class="breadcrumb-item">Main</div>
                  </div>
              </div>
              <div class="section-body">
                  <h2 class="section-title">Data Produk</h2>
                  <div class="row">
                      <div class="col-12 col-md-12 col-lg-12">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Data Produk</h4>
                                  <a href="<?php echo site_url('Produk/form_produk'); ?>" class="btn btn-primary">Tambah Produk</a>
                              </div>
                              <div class="card-body">
                                  <?php if ($this->session->flashdata('flash')) : ?>
                                      <div class="flash-berhasil" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                                      <?php unset($_SESSION['flash']); ?>
                                  <?php endif; ?>

                                  <div class="table-responsive">
                                      <table class="table table-bordered table-md">
                                          <tr>
                                              <th>Kode Barang</th>
                                              <th>Kategori</th>
                                              <th>Nama Produk</th>
                                              <th>Foto</th>
                                              <th>Harga</th>
                                              <th>Stok</th>
                                              <th>Berat</th>
                                              <th>Diskon</th>
                                              <th>Action</th>
                                          </tr>
                                          <?php $x = 1; ?>
                                          <?php foreach ($produk as $item) { ?>
                                              <tr>
                                                  <td><?php echo $item->idProduk ?></td>
                                                  <td><?php echo ucfirst($item->namaKat);  ?></td>
                                                  <td><?php echo ucfirst($item->namaProduk);  ?></td>
                                                  <td align="center"><img src="<?php echo base_url() ?>assets/admin/produk/img/<?php echo $item->foto; ?>" alt="<?php echo $item->foto; ?>" width="50px"></td>
                                                  <td>Rp.<?php echo number_format($item->harga, 2, ',', '.'); ?></td>
                                                  <td><?php echo ucfirst($item->stok);  ?></td>
                                                  <td><?php echo ucfirst($item->berat);  ?></td>
                                                  <td><?php echo ucfirst($item->diskon);  ?></td>
                                                  <td>
                                                      <a href="<?php echo site_url('Produk/edit_produk/' . $item->idProduk); ?>" class="btn btn-warning">Edit</a>
                                                      <a href="<?php echo site_url('Produk/hapus/' . $item->idProduk); ?>" class="btn btn-danger tombol-hapus">Hapus</a>
                                                  </td>
                                              </tr>
                                          <?php } ?>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
      </div>