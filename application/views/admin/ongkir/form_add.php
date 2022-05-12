      <!-- Main Content -->
      <div class="main-content">
          <section class="section">
              <div class="section-header">
                  <h1>Tambah Data</h1>
                  <div class="section-header-breadcrumb">
                      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                      <div class="breadcrumb-item"><a href="#">Ongkir</a></div>
                      <div class="breadcrumb-item">Form</div>
                  </div>
              </div>

              <div class="section-body">
                  <h2 class="section-title">Forms</h2>
                  <div class="row">
                      <div class="col-12 col-md-6 col-lg-6">
                          <form action="<?php echo site_url('Ongkir/action_ongkir') ?>" method="POST">
                              <div class="card">
                                  <div class="card-header">
                                      <h4>Form Tambah Ongkir</h4>
                                  </div>
                                  <div class="card-body">
                                      <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-2 col-form-label">Agen Kurir</label>
                                          <div class="col-sm-7">
                                              <select class="form-control selectric" name="kurir">
                                                  <?php foreach ($kurir as $item) { ?>
                                                      <option value="<?php echo $item->idKurir ?>"><?php echo $item->namaKurir ?></option>
                                                  <?php } ?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-2 col-form-label">Kota</label>
                                          <div class="col-sm-7">
                                              <select class="form-control selectric" name="kota">
                                                  <?php foreach ($kota as $item) { ?>
                                                      <option value="<?php echo $item->idKota ?>"><?php echo $item->namaKota ?></option>
                                                  <?php } ?>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="form-group row">
                                          <label for="inputEmail3" class="col-sm-2 col-form-label">Biaya</label>
                                          <div class="col-sm-7">
                                              <input type="number" class="form-control" id="inputEmail3" name="biaya" placeholder="Biaya" required>
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