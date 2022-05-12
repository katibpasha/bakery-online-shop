<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title; ?></title>
    <link href="<?php echo base_url() ?>assets/admin/banner/img/favicon.jpg" rel="icon">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/node_modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/node_modules/summernote/dist/summernote-bs4.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/assets/css/components.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/sweetalert/sweetalert2.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/summernote/summernote.min.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>
                        <div class="search-result">
                            <div class="search-header">
                                Histories
                            </div>
                            <div class="search-item">
                                <a href="#">How to hack NASA using CSS</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">Kodinger.com</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">#Stisla</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-header">
                                Result
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="../assets/img/products/product-3-50.png" alt="product">
                                    oPhone S9 Limited Edition
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="../assets/img/products/product-2-50.png" alt="product">
                                    Drone X2 New Gen-7
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="../assets/img/products/product-1-50.png" alt="product">
                                    Headphone Blitz
                                </a>
                            </div>
                            <div class="search-header">
                                Projects
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-danger text-white mr-3">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    Stisla Admin Template
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-primary text-white mr-3">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    Create a new Homepage Design
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Messages
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-message">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle">
                                        <div class="is-online"></div>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b>
                                        <p>Hello, Bro!</p>
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Dedik Sugiharto</b>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="<?= base_url('assets/admin') ?>/assets/img/avatar/avatar-3.png" class="rounded-circle">
                                        <div class="is-online"></div>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Agung Ardiansyah</b>
                                        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="<?= base_url('assets/admin') ?>/assets/img/avatar/avatar-4.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Ardian Rahardiansyah</b>
                                        <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                                        <div class="time">16 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-avatar">
                                        <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle">
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Alfa Zulkarnain</b>
                                        <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right">
                            <div class="dropdown-header">Notifications
                                <div class="float-right">
                                    <a href="#">Mark All As Read</a>
                                </div>
                            </div>
                            <div class="dropdown-list-content dropdown-list-icons">
                                <a href="#" class="dropdown-item dropdown-item-unread">
                                    <div class="dropdown-item-icon bg-primary text-white">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Template update is available now!
                                        <div class="time text-primary">2 Min Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="far fa-user"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                                        <div class="time">10 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-success text-white">
                                        <i class="fas fa-check"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                                        <div class="time">12 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-danger text-white">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Low disk space. Let's clean it!
                                        <div class="time">17 Hours Ago</div>
                                    </div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <div class="dropdown-item-icon bg-info text-white">
                                        <i class="fas fa-bell"></i>
                                    </div>
                                    <div class="dropdown-item-desc">
                                        Welcome to Stisla template!
                                        <div class="time">Yesterday</div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url('assets/admin') ?>/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi <?= $this->session->userdata('namaAdmin') ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title"><?php echo $this->session->userdata('status') ?></div>
                            <a href="<?php echo site_url('Adminpanel/profile') ?>" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= site_url('login/logout'); ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?php echo site_url('Adminpanel/dashboard') ?>">SKS TEAM</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">St</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Menu Admin</li>
                        <li <?= $this->uri->segment(2) == 'dashboard' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                            <a href="<?php echo site_url('Adminpanel/dashboard') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        </li>
                        <li <?= $this->uri->segment(1) == 'Identitas' || $this->uri->segment(2) == 'banner' ? 'class="nav-item active"' : 'class="nav-item"' ?>>
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-store"></i><span>Menu Website</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?php echo site_url('Identitas') ?>">Identitas Website</a></li>
                                <li><a class="nav-link" href="<?php echo site_url('Identitas/banner') ?>">Images Banner</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fab fa-ubuntu"></i><span>Modul Sistem</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?php echo site_url('Produk') ?>">Produk</a></li>
                                <li><a class="nav-link" href="<?php echo site_url('Pengeluaran') ?>">Pengeluaran</a></li>
                                <li><a class="nav-link" href="<?php echo site_url('Kategori') ?>">Kategori</a></li>
                                <li><a class="nav-link" href="<?php echo site_url('Kota') ?>">Kota</a></li>
                                <li><a class="nav-link" href="<?php echo site_url('Kurir') ?>">Agen Kurir</a></li>
                                <li><a class="nav-link" href="<?php echo site_url('Ongkir') ?>">Ongkir</a></li>
                                <li><a class="nav-link" href="<?php echo site_url('Rekening') ?>">Rekening</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('User') ?>" class="nav-link"><i class="fas fa-user"></i> <span>Modul User</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('Admin_konfirmasi') ?>" class="nav-link"><i class="fas fa-receipt"></i> <span>Pesanan/Invoice</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo site_url('Admin_member') ?>" class="nav-link"><i class="fas fa-users"></i> <span>Member</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link has-dropdown"><i class="fas fa-book"></i><span>Laporan</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="<?php echo site_url('Laporan/pemasukan') ?>">Pemasukan</a></li>
                                <li><a class="nav-link" href="<?php echo site_url('Laporan/pengeluaran') ?>">Pengeluaran</a></li>
                            </ul>
                        </li>
                    </ul>
                </aside>
            </div>

            <?= $contents ?>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="#">Cuans</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Bukti Transfer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center mb-3">
                    <img width="400px" id="bukti-transfer">
                </div>

            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?= base_url('assets/admin') ?>/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="<?= base_url('assets/admin') ?>/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="<?= base_url('assets/admin') ?>/node_modules/chart.js/dist/Chart.min.js"></script>
    <script src="<?= base_url('assets/admin') ?>/node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/admin') ?>/node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="<?= base_url('assets/admin') ?>/node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Template JS File -->
    <script src="<?= base_url('assets/admin') ?>/assets/js/scripts.js"></script>
    <script src="<?= base_url('assets/admin') ?>/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="<?= base_url('assets/admin') ?>/assets/js/page/index.js"></script>
    <script src="<?= base_url('assets/admin') ?>/sweetalert/sweetalert2.min.js"></script>
    <script src="<?= base_url('assets/admin') ?>/summernote/summernote.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            flatpickr(document.getElementById('dari'), {});
            flatpickr(document.getElementById('sampai'), {});
        })
        $(document).ready(function() {
            $(document).on('click', '#detail-confirm', function() {
                var foto = $(this).data('bukti');
                $('#bukti-transfer').attr('src', '<?= base_url() ?>assets/front-end/konfirmasi/img/' + foto);
                console.log($('#bukti-transfer').attr('src', '<?= base_url() ?>assets/front-end/konfirmasi/img/' + foto))
            })
        });

        $(".tm").on("change", function() {
            this.setAttribute(
                "data-date",
                moment(this.value, "YYYY-MM-DD")
                .format(this.getAttribute("data-date-format"))
            )
        }).trigger("change")

        $(document).ready(function() {
            $('#summernote').summernote();
        });
        $(document).ready(function() {
            $('#validatedCustomFile').on('change', function() {
                // Ambil nama file 
                let fileName = $(this).val().split('\\').pop();
                // Ubah "Choose a file" label sesuai dengan nama file yag akan diupload
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        })

        $(document).ready(function() {
            $('.btn-reset').click(function() {
                let reset = 'Choose File...';
                console.log(reset);
                $('#validatedCustomFile').next('.custom-file-label').addClass('selected').html(reset)
            });
        });

        const flashBerhasil = $('.flash-berhasil').data('flash');
        if (flashBerhasil) {
            Swal.fire({
                title: 'Data',
                text: flashBerhasil,
                icon: 'success'
            });
        }

        const flashGagal = $('.flash-gagal').data('flash');
        if (flashGagal) {
            Swal.fire({
                title: 'Data',
                text: flashGagal,
                icon: 'warning'
            });
        }

        const flashUser = $('.flash-user').data('flash');
        if (flashUser) {
            Swal.fire({
                title: 'Peringatan',
                text: flashUser,
                icon: 'warning'
            });
        }

        $('.tombol-hapus').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "data akan di hapus",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus data!',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });

        $('.tombol-terima').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "data pembayaran sudah benar !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Terima Pembayaran ',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });

        $('.tombol-tolak').on('click', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');

            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "data pembayaran sudah benar !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Tolak Pembayaran',
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        });

        const dataError = $('.form_error').data('form');
        if (dataError) {
            Swal.fire({
                title: dataError,
                text: '',
                icon: 'warning'
            });
        }
    </script>
</body>

</html>