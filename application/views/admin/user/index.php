      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Manajemen User Admin</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">User Admin</a></div>
                      <div class="breadcrumb-item">Main</div>
                  </div>
              </div>
              <div class="section-body">
                  <h2 class="section-title">Data User Admin</h2>
                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-8">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Data User Admin</h4>
                                  <a href="<?php echo site_url('User/form_user'); ?>" class="btn btn-primary">Tambah User Admin</a>
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
                                              <th>Email Admin</th>
                                              <th>Nama Admin</th>
                                              <th>Action</th>
                                          </tr>
                                          <?php $x = 1; ?>
                                          <?php foreach ($admin as $item) { ?>
                                              <tr>
                                                  <td><?php echo $x++ ?></td>
                                                  <td><?php echo $item->emailAdmin;  ?></td>
                                                  <td><?php echo ucfirst($item->namaAdmin);  ?></td>
                                                  <td>
                                                      <a href="<?php echo site_url('User/edit_user/' . $item->idAdmin); ?>" class="btn btn-warning">Edit</a>
                                                      <a href="<?php echo site_url('User/hapus/' . $item->idAdmin); ?>" class="btn btn-danger tombol-hapus">Hapus</a>
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