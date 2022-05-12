      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Manajemen Rekening</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Rekening</a></div>
                      <div class="breadcrumb-item">Main</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Data Rekening</h2>
                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-8">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Data Rekening</h4>
                                  <a href="<?php echo site_url('Rekening/form_rekening'); ?>" class="btn btn-primary">Tambah Rekening</a>
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
                                              <th>No Rekening</th>
                                              <th>Atas Nama</th>
                                              <th>Bank</th>
                                              <th>Action</th>
                                          </tr>
                                          <?php $x = 1; ?>
                                          <?php foreach ($rekening as $item) { ?>
                                              <tr>
                                                  <td><?php echo $x++ ?></td>
                                                  <td><?php echo $item->noRekening;  ?></td>
                                                  <td><?php echo ucfirst($item->namaRekening);  ?></td>
                                                  <td><?php echo strtoupper($item->bank);  ?></td>
                                                  <td>
                                                      <a href="<?php echo site_url('Rekening/edit_rekening/' . $item->id); ?>" class="btn btn-warning">Edit</a>
                                                      <a href="<?php echo site_url('rekening/hapus/' . $item->id); ?>" class="btn btn-danger tombol-hapus">Hapus</a>
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