      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Edit Data</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Agen Kurir</a></div>
                      <div class="breadcrumb-item">Form</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Forms</h2>
                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                          <form action="<?php echo site_url('kurir/action_edit') ?>" method="POST">
                              <div class="card">
                                  <div class="card-header"></div>
                                  <h4>Form Edit Agen Kurir</h4>
                              </div>
                              <div class="card-body">
                                  <div class="form_error" data-form="<?= form_error('namaKurir'); ?>"></div>
                                  <input type="hidden" class="form-control" id="inputEmail3" name="idKurir" value="<?= $kurir->idKurir ?>">
                                  <div class="form-group row">
                                      <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Agen Kurir</label>
                                      <div class="col-sm-7">
                                          <input type="text" class="form-control" id="inputEmail3" name="namaKurir" placeholder="Nama Agen Kurir" value="<?= $kurir->namaKurir ?>">
                                      </div>
                                  </div>
                              </div>
                              <div class="card-footer">
                                  <button type="submit" class="btn btn-primary">Save</button>
                              </div>
                      </div>
                      </form>
                  </div>
              </div>
      </div>
      </section>
      </div>