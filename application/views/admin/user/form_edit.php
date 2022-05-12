<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah User Admin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">User Admin</a></div>
                <div class="breadcrumb-item">Form</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Forms</h2>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <form action="<?php echo site_url('User/edit') ?>" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Tambah User Admin</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama User Admin</label>
                                    <input type="hidden" name="id" value="<?php echo $user->idAdmin ?>">
                                    <input type="hidden" name="pass" value="<?php echo $user->passAdmin ?>">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $user->namaAdmin ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Email Valid User Admin</label>
                                    <input type="text" class="tm form-control" name="email" placeholder="Email" value="<?php echo $user->emailAdmin ?>">
                                    <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                                </div>
                                <div class="form-group">
                                    <label>Role/Level Admin</label>
                                    <select class="form-control selectric" name="level">
                                        <option value="1">Admin Utama</option>
                                        <option value="2" selected>Kasir</option>
                                    </select>
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