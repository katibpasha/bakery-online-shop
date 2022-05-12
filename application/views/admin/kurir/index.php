      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Manajemen Agen Kurir</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Agen Kurir</a></div>
                      <div class="breadcrumb-item">Main</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Data Agen Kurir</h2>
                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Data Agen Kurir</h4>
                                  <a href="<?php echo site_url('kurir/form_kurir'); ?>" class="btn btn-primary">Tambah Kurir</a>
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
                                              <th>Nama Agen Kurir</th>
                                              <th>Action</th>
                                          </tr>
                                          <?php $x = 1; ?>
                                          <?php foreach ($kurir as $item) { ?>
                                              <tr>
                                                  <td><?php echo $x++ ?></td>
                                                  <td><?php echo ucfirst($item->namaKurir);  ?></td>
                                                  <td>
                                                      <a href="<?php echo site_url('Kurir/edit_kurir/' . $item->idKurir); ?>" class="btn btn-warning">Edit</a>
                                                      <a href="<?php echo site_url('Kurir/hapus/' . $item->idKurir); ?>" class="btn btn-danger tombol-hapus">Hapus</a>
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