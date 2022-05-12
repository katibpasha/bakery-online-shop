      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Tambah Data</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Banner Website</a></div>
                      <div class="breadcrumb-item">Form</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Forms</h2>
                  <div class="row">
                      <div class="col-12 col-md-12 col-lg-12">
                          <div class="card mt-4 mt-lg-0">
                              <?php if ($this->session->flashdata('flash-gagal')) : ?>
                                  <div class="flash-gagal" data-flash="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
                                  <?php unset($_SESSION['flash-gagal']); ?>
                              <?php endif; ?>
                              <div class="card-header py-0">
                                  <h4>Form Banner Website</h4>
                              </div>
                              <?php echo form_open_multipart('Identitas/banner_action') ?>
                              <div class="card-body pt-0">
                                  <div class="section-title">Banner</div>
                                  <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="validatedCustomFile" name="banner" accept="image/*">
                                      <label class="custom-file-label btn-re" for="validatedCustomFile">Choose file...</label>
                                  </div>
                                  <p class="mt-2 ml-2"> <small>Ukuran Banner 1920 x 800 px</small></p>
                                  <div class="form-group">
                                      <label>Text 1</label>
                                      <input type="text" class="form-control" name="text1">
                                      <?= form_error('text1', '<small class="text-danger">', '</small>') ?>
                                  </div>
                                  <div class="form-group">
                                      <label>Text 2</label>
                                      <input type="text" class="form-control" name="text2">
                                      <?= form_error('text2', '<small class="text-danger">', '</small>') ?>
                                  </div>
                                  <div class="form-group">
                                      <label>Text 3</label>
                                      <input type="text" class="form-control" name="text3">
                                  </div>
                                  <div class="form-group">
                                      <label>Text 4</label>
                                      <input type="text" class="form-control" name="text4">
                                  </div>
                                  <div class="form-group">
                                      <label>Harga</label>
                                      <input type="text" class="form-control" name="harga">
                                      <?= form_error('harga', '<small class="text-danger">', '</small>') ?>
                                  </div>
                              </div>
                              <div class="card-footer text-right">
                                  <button class="btn btn-primary mr-1" type="submit">Add</button>
                                  <button class="btn btn-secondary btn-reset" type="reset" id="tombol_reset">Reset</button>
                              </div>
                              <?php echo form_close(); ?>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
      </div>