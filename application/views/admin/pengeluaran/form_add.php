      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Tambah Data</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Pengeluaran</a></div>
                      <div class="breadcrumb-item">Form</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Forms</h2>
                  <div class="row">
                      <div class="col-12 col-md-12 col-lg-12">
                          <form action="<?php echo site_url('Pengeluaran/action_pengeluaran') ?>" method="POST" enctype="multipart/form-data">
                              <div class="card">
                                  <?php if ($this->session->flashdata('flash-gagal')) : ?>
                                      <div class="flash-gagal" data-flash="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
                                      <?php unset($_SESSION['flash-gagal']); ?>
                                  <?php endif; ?>
                                  <div class="card-header">
                                      <h4>Form Tambah Pengeluaran</h4>
                                  </div>
                                  <div class="card-body">
                                      <div class="form-group">
                                          <label>Nama Item</label>
                                          <input type="text" class="form-control" name="namaItem" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Tanggal Pengeluaran</label>
                                          <input type="date" class="tm form-control" name="tanggal" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Kuantitas</label>
                                          <input type="number" class="form-control" name="kuantitas" required>
                                      </div>
                                      <div class="form-group">
                                          <label>Harga Satuan</label>
                                          <input type="number" class="form-control" name="harga" required>
                                      </div>
                                      <div class="form-group">
                                          <div class="section-title">Bukti Nota</div>
                                          <div class="custom-file">
                                              <input type="file" class="custom-file-input" id="validatedCustomFile" name="bukti" accept="image/*">
                                              <label class="custom-file-label btn-re" for="validatedCustomFile">Choose file...</label>
                                          </div>
                                          <p class="mt-2 ml-2"> <small>Upload bukti transaksi dengan format jpg/png</small></p>
                                      </div>
                                      <div class="form-group">
                                          <label>Satuan</label>
                                          <input type="text" class="form-control" name="satuan" required>
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