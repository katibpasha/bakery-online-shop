      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Tambah Data</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Produk</a></div>
                      <div class="breadcrumb-item">Form</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Forms</h2>
                  <div class="row">
                      <div class="col-12 col-md-12 col-lg-12">
                          <form action="<?php echo site_url('Produk/action_produk') ?>" method="POST" enctype="multipart/form-data">
                              <div class="card">
                                  <?php if ($this->session->flashdata('flash-gagal')) : ?>
                                      <div class="flash-gagal" data-flash="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
                                      <?php unset($_SESSION['flash-gagal']); ?>
                                  <?php endif; ?>
                                  <div class="card-header">
                                      <h4>Form Tambah Produk</h4>
                                  </div>
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label>Kode Produk</label>
                                          <input type="text" class="form-control" name="idProduk" value="<?php echo $kode_barang ?>" readonly>
                                      </div>
                                      <div class="form-group">
                                          <label>Kategori</label>
                                          <select class="form-control selectric" name="kategori">
                                              <?php foreach ($kategori as $item) { ?>
                                                  <option value="<?php echo $item->idKat ?>"><?php echo $item->namaKat ?></option>
                                              <?php } ?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                          <label>Nama Produk</label>
                                          <input type="text" class="form-control" name="namaProduk" required>
                                      </div>
                                      <div class="form-group">
                                          <div class="section-title">Foto Produk</div>
                                          <div class="custom-file">
                                              <input type="file" class="custom-file-input" id="validatedCustomFile" name="fotoProduk" accept="image/*">
                                              <label class="custom-file-label btn-re" for="validatedCustomFile">Choose file...</label>
                                          </div>
                                          <p class="mt-2 ml-2"> <small>Ukuran maksimal foto 15 mb </small></p>
                                      </div>
                                      <div class="form-group">
                                          <label>Harga</label>
                                          <input type="number" class="form-control" name="harga" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Stok</label>
                                          <input type="number" class="form-control" name="stok" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Berat</label>
                                          <input type="number" class="form-control" name="berat" required>
                                          <p class="mt-2 ml-2"> <small>Dalam Satuan Gram </small></p>
                                      </div>
                                      <div class="form-group">
                                          <label>Diskon</label>
                                          <input type="number" class="form-control" name="diskon">
                                          <p class="mt-2 ml-2"> <small>Optional</small></p>
                                      </div>
                                      <div class="form-group">
                                          <label>Deskripsi</label>
                                          <div class="col-sm-12 col-md-12 px-0">
                                              <textarea class="summernote-simple" id="summernote" name="deskripsi" required></textarea>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="card-footer">
                                      <button type="submit" class="btn btn-primary">Save</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </section>
      </div>