      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Manajemen Member</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Member</a></div>
                      <div class="breadcrumb-item">Main</div>
                  </div>
              </div>
              <div class="section-body">
                  <h2 class="section-title">Data Member</h2>
                  <div class="row">
                      <div class="col-12 col-md-12 col-lg-12">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Data Member</h4>

                              </div>
                              <div class="card-body">
                                  <?php if ($this->session->flashdata('flash')) : ?>
                                      <div class="flash-berhasil" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                                      <?php unset($_SESSION['flash']); ?>
                                  <?php endif; ?>

                                  <div class="table-responsive">
                                      <table class="table table-bordered table-md">
                                          <tr>
                                              <th>ID Member</th>
                                              <th>Nama Member</th>
                                              <th>Alamat</th>
                                              <th>No Telepon</th>
                                              <th>Status Akun</th>
                                              <th>Action</th>
                                          </tr>
                                          <?php $x = 1; ?>
                                          <?php foreach ($member as $item) { ?>
                                              <tr>
                                                  <td><?php echo $item->idMember ?></td>
                                                  <td><?php echo ucfirst($item->namaKonsumen);  ?></td>
                                                  <td><?php echo ucfirst($item->alamat);  ?></td>
                                                  <td><?php echo ucfirst($item->telpon);  ?></td>
                                                  <td><?php echo ucfirst($item->statusAktif);  ?></td>
                                                  <td>
                                                      <?php if ($item->statusAktif == 'aktif') { ?>
                                                          <a href="<?php echo site_url('Admin_member/deactivated/' . $item->idMember); ?>" class="btn btn-warning">Deactivated</a>
                                                      <?php } else { ?>
                                                          <a href="<?php echo site_url('Admin_member/activated/' . $item->idMember); ?>" class="btn btn-success">Activated</a>
                                                      <?php } ?>
                                                      <a href="<?php echo site_url('Admin_member/hapus/' . $item->idMember); ?>" class="btn btn-danger tombol-hapus">Hapus</a>
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