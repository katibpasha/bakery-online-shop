      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Manajemen Kota</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Kota</a></div>
                      <div class="breadcrumb-item">Main</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Data Kota</h2>
                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Data Kota</h4>
                                  <a href="<?php echo site_url('kota/form_kota'); ?>" class="btn btn-primary">Tambah Kota</a>
                              </div>
                              <div class="card-body">
                                  <?php if ($this->session->flashdata('flash')) : ?>
                                      <div class="flash-berhasil" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                                      <?php unset($_SESSION['flash']); ?>
                                  <?php endif; ?>
                                  <div class="table-responsive">
                                      <table class="table table-bordered table-md">
                                          <tr>
                                              <th>No</th>
                                              <th>Nama Kota</th>
                                              <th>Action</th>
                                          </tr>
                                          <?php $x = 1; ?>
                                          <?php foreach ($kota as $item) { ?>
                                              <tr>
                                                  <td><?php echo $x++ ?></td>
                                                  <td><?php echo ucfirst($item->namaKota);  ?></td>
                                                  <td>
                                                      <a href="<?php echo site_url('Kota/edit_kota/' . $item->idKota); ?>" class="btn btn-warning">Edit</a>
                                                      <a href="<?php echo site_url('kota/hapus/' . $item->idKota); ?>" class="btn btn-danger tombol-hapus">Hapus</a>
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