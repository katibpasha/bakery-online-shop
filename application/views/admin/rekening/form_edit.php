<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Rekening</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Rekening</a></div>
                <div class="breadcrumb-item">Form</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Forms</h2>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <form action="<?php echo site_url('Rekening/edit') ?>" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Edit Rekening</h4>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $rekening->id ?> ">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">No Rekening</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="inputEmail3" name="noRekening" placeholder="No Rekening" required value="<?php echo $rekening->noRekening ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Atas Nama</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="inputEmail3" name="nama" placeholder="Atas Nama" required value="<?php echo $rekening->namaRekening ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Bank</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="inputEmail3" name="bank" placeholder="Nama Bank" required value="<?php echo $rekening->bank ?>">
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