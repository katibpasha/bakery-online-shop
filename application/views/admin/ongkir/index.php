      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Manajemen Ongkir</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Ongkir</a></div>
                      <div class="breadcrumb-item">Main</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Data Ongkir</h2>
                  <div class="row">
                      <div class="col-12 col-md-12 col-lg-8">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Data Ongkir</h4>
                                  <a href="<?php echo site_url('Ongkir/form_ongkir'); ?>" class="btn btn-primary">Tambah Ongkir</a>
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
                                              <th>Kota Tujuan</th>
                                              <th>Biaya</th>
                                              <th>Action</th>
                                          </tr>
                                          <?php $x = 1; ?>
                                          <?php foreach ($ongkir as $item) { ?>
                                              <tr>
                                                  <td><?php echo $x++ ?></td>
                                                  <td><?php echo ucfirst($item->namaKurir);  ?></td>
                                                  <td><?php echo ucfirst($item->namaKota);  ?></td>
                                                  <td>Rp.<?php echo number_format($item->biaya, 2, ',', '.'); ?></td>
                                                  <td>
                                                      <a href="<?php echo site_url('Ongkir/edit_ongkir/' . $item->idBiayaKirim); ?>" class="btn btn-warning">Edit</a>
                                                      <a href="<?php echo site_url('Ongkir/hapus/' . $item->idBiayaKirim); ?>" class="btn btn-danger tombol-hapus">Hapus</a>
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