      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Manajemen Invoice</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Invoice</a></div>
                      <div class="breadcrumb-item">Main</div>
                  </div>
              </div>
              <div class="section-body">
                  <h2 class="section-title">Data Invoice</h2>
                  <div class="row">
                      <div class="col-12 col-md-12 col-lg-12">
                          <div class="card">
                              <div class="card-header">
                                  <h4>Data Invoice</h4>

                              </div>
                              <div class="card-body">
                                  <?php if ($this->session->flashdata('flash')) : ?>
                                      <div class="flash-berhasil" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                                      <?php unset($_SESSION['flash']); ?>
                                  <?php endif; ?>

                                  <div class="table-responsive">
                                      <table class="table table-bordered table-md">
                                          <tr>
                                              <th>ID Transaksi</th>
                                              <th>Nama Pemesan</th>
                                              <th>Rekening Tujuan</th>
                                              <th>Total Bayar</th>
                                              <th>Alamat Pengiriman</th>
                                              <th>Status</th>
                                              <th>Validasi</th>
                                          </tr>
                                          <?php $x = 1; ?>
                                          <?php foreach ($transaksi as $item) { ?>
                                              <tr>
                                                  <td><?php echo $item->idTransaksi ?></td>
                                                  <td><?php echo $item->namaKonsumen ?></td>
                                                  <td><?php echo $item->noRekening ?> - <?php echo $item->namaRekening ?></td>
                                                  <td>Rp.<?php echo number_format($item->totalBelanja, 2, ',', '.'); ?></td>
                                                  <td><?php echo $item->alamatPengiriman ?></td>
                                                  <td><span class="badge badge-pill badge-info"><?php echo $item->status ?></span></td>
                                                  <td>
                                                      <?php if ($item->status == 'Dalam Pengecekan') : ?>
                                                          <a href="<?php echo site_url('Admin_konfirmasi/detail_konfirmasi/' . $item->idTransaksi); ?>" class="btn btn-primary">Detail</a>

                                                          <a href="<?php echo site_url('Admin_konfirmasi/terima/' . $item->idTransaksi); ?>" class="btn btn-success tombol-terima">Terima</a>

                                                          <a href="<?php echo site_url('Admin_konfirmasi/tolak/' . $item->idTransaksi); ?>" class="btn btn-warning tombol-tolak">Tolak</a>
                                                      <?php endif ?>

                                                      <a href="<?php echo site_url('Admin_konfirmasi/hapus/' . $item->idTransaksi); ?>" class="btn btn-danger tombol-hapus">Hapus</a>
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