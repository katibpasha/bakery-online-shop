<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Hi, <?php echo $this->session->userdata('namaAdmin') ?> !</h2>
            <p class="section-lead">
                Change information about yourself on this page.
            </p>
            <?php if ($this->session->flashdata('flash')) : ?>
                <div class="flash-berhasil" data-flash="<?= $this->session->flashdata('flash'); ?>"></div>
                <?php unset($_SESSION['flash']); ?>
            <?php endif; ?>
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form action="<?php echo site_url('Adminpanel/update_profile') ?>" method="post" class="needs-validation">
                            <div class="card-header">
                                <h4>Edit Profile</h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama User Admin</label>
                                    <input type="hidden" class="tm form-control" name="email" required placeholder="Email" value="<?= $user->emailAdmin ?>">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama" value="<?= $user->namaAdmin ?>">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" required placeholder="Password">
                                </div>
                                <input type="hidden" name="role" value="<?= $user->roleAdmin ?>">
                                <div class="card-footer text-right">
                                    <button class="btn btn-primary">Save Changes</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>