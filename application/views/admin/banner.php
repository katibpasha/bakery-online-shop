      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Tambah Data</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Banner Website</a></div>
                      <div class="breadcrumb-item">Form</div>
                  </div>
              </div>
              <div class="section-body">
                  <h2 class="section-title">Forms</h2>
                  <div class="row">
                      <div class="col-12 col-md-12 col-lg-12">
                          <div class="card">
                              <?php if ($this->session->flashdata('flash')) : ?>
                                  <div class="flash-berhasil" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                                  <?php unset($_SESSION['flash']); ?>
                              <?php endif; ?>
                              <?php if ($this->session->flashdata('flash-gagal')) : ?>
                                  <div class="flash-gagal" data-flash="<?= $this->session->flashdata('flash-gagal'); ?>"></div>
                                  <?php unset($_SESSION['flash-gagal']); ?>
                              <?php endif; ?>
                              <div class="card-header">
                                  <h4>Data Banner</h4>
                                  <a href="<?php echo site_url('Identitas/form_banner'); ?>" class="btn btn-primary">Tambah Banner</a>
                              </div>
                              <div class="card-body" style="padding-right: 100px !important; ">
                                  <?php if ($this->session->flashdata('flash')) : ?>
                                      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash'); ?>"></div>
                                      <?php unset($_SESSION['flash']); ?>
                                  <?php endif; ?>
                                  <div class="table-responsive">
                                      <table class="table table-bordered table-md">
                                          <tr>
                                              <th>No</th>
                                              <th>Banner</th>
                                              <th>Text 1</th>
                                              <th>Text 2</th>
                                              <th>Text 3</th>
                                              <th>Text 4</th>
                                              <th>harga</th>
                                              <th>Aksi</th>
                                          </tr>
                                          <?php $x = 1; ?>
                                          <?php foreach ($banner as $item) { ?>
                                              <tr>
                                                  <td><?php echo $x++ ?></td>
                                                  <td><img src="<?php echo base_url() ?>/assets/admin/banner/img/<?php echo $item->banner ?>" alt="banner" width="90px"></td>
                                                  <td><?php echo $item->text1; ?></td>
                                                  <td><?php echo $item->text2; ?></td>
                                                  <td><?php echo $item->text3; ?></td>
                                                  <td><?php echo $item->text4; ?></td>
                                                  <td>Rp.<?php echo  number_format($item->harga, 2, ',', '.'); ?></td>
                                                  <td>
                                                      <a href="<?php echo site_url('Identitas/hapus_banner/' . $item->idBanner); ?>" class="btn btn-danger tombol-hapus">Hapus</a>
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