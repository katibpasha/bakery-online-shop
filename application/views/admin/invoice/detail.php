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
                      <div class="col-12 col-md-12 col-lg-7">
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
                                              <th>ID Invoice</th>
                                              <th>Lihat Bukti</th>
                                          </tr>
                                          <tr>
                                              <td><?php echo $konfirmasi->idTransaksi ?></td>
                                              <td>
                                                  <button id="detail-confirm" type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop" data-bukti="<?= $konfirmasi->buktiTransfer ?>">
                                                      Lihat Bukti Pembayaran
                                                  </button>
                                              </td>
                                          </tr>
                                      </table>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
      </div>