      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Manajemen Pengeluaran</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Pengeluaran</a></div>
                      <div class="breadcrumb-item">Main</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Data Pengeluaran</h2>
                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-12">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Data Pengeluaran</h4>
                                  <a href="<?php echo site_url('Pengeluaran/form_pengeluaran'); ?>" class="btn btn-primary">Tambah Pengeluaran</a>
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
                                              <th>Nama Item</th>
                                              <th>Tanggal Pengeluaran</th>
                                              <th>Kuantitas</th>
                                              <th>Harga Satuan</th>
                                              <th>Bukti Nota</th>
                                              <th>Satuan</th>
                                              <th>Action</th>
                                          </tr>
                                          <?php $x = 1; ?>
                                          <?php foreach ($pengeluaran as $item) { ?>
                                              <tr>
                                                  <td><?php echo $x++ ?></td>
                                                  <td><?php echo ucfirst($item->namaItem);  ?></td>
                                                  <td><?php echo $item->tglPengeluaran;  ?></td>
                                                  <td><?php echo $item->qty;  ?></td>
                                                  <td>Rp.<?php echo number_format($item->hargaSatuan, 2, ',', '.');  ?></td>
                                                  <td align="center"><img src="<?php echo base_url() ?>assets/admin/pengeluaran/img/<?php echo $item->buktiNota;  ?>" alt="<?php echo $item->buktiNota;  ?>" width="50px"></td>
                                                  <td><?php echo $item->satuan;  ?></td>
                                                  <td>
                                                      <a href="<?php echo site_url('Pengeluaran/edit_pengeluaran/' . $item->idPengeluaran); ?>" class="btn btn-warning">Edit</a>
                                                      <a href="<?php echo site_url('Pengeluaran/hapus/' . $item->idPengeluaran); ?>" class="btn btn-danger tombol-hapus">Hapus</a>
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