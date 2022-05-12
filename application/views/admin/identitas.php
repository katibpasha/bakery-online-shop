      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Tambah Data</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Identitas Website</a></div>
                      <div class="breadcrumb-item">Form</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Forms</h2>
                  <div class="row">
                      <div class="col-12 col-md-12 col-lg-12">
                          <div class="card mt-4 mt-lg-0">
                              <?php if ($this->session->flashdata('flash')) : ?>
                                  <div class="flash-berhasil" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                                  <?php unset($_SESSION['flash']); ?>
                              <?php endif; ?>
                              <?php if ($this->session->flashdata('flash-gagal')) : ?>
                                  <div class="flash-gagal" data-flash="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
                                  <?php unset($_SESSION['flash-gagal']); ?>
                              <?php endif; ?>
                              <div class="card-header py-0">
                                  <h4>Form Identitas Website</h4>
                              </div>
                              <?php echo form_open_multipart('Identitas/identitas_action') ?>
                              <div class="card-body pt-0">
                                  <div class="section-title">Logo Favicon</div>
                                  <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="validatedCustomFile" name="favicon" accept="image/*">
                                      <label class="custom-file-label btn-re" for="validatedCustomFile">Choose file...</label>
                                  </div>
                                  <p class="mt-2 ml-2"> <small>Maksimal Ukuran File 2 Mb</small></p>
                                  <?= form_error('favicon', '<small class="text-danger">', '</small>') ?>
                                  <div class="form-group">
                                      <label>Kontak Toko</label>
                                      <input type="text" class="form-control" name="kontak">
                                      <?= form_error('kontak', '<small class="text-danger">', '</small>') ?>
                                  </div>
                                  <div class="form-group">
                                      <label>Email Toko</label>
                                      <input type="text" class="form-control" name="email">
                                      <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                  </div>
                                  <div class="form-group">
                                      <label>Link Facebook Toko</label>
                                      <input type="text" class="form-control" name="fb">
                                  </div>
                                  <div class="form-group">
                                      <label>Link Instagram Toko</label>
                                      <input type="text" class="form-control" name="ig">
                                  </div>
                                  <div class="form-group">
                                      <div class="section-title">Logo Favicon Saat Ini</div>
                                      <div class="img-container pl-5">
                                          <img src="<?php echo base_url() ?>assets/admin/banner/img/favicon.jpg" alt="favicon" width="110px">
                                      </div>
                                  </div>
                              </div>
                              <div class="card-footer text-right">
                                  <button class="btn btn-primary mr-1" type="submit">Update</button>
                                  <button class="btn btn-secondary btn-reset" type="reset" id="tombol_reset">Reset</button>
                              </div>
                              <?php echo form_close(); ?>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
      </div>