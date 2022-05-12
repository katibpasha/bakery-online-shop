<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title ?></title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/assets/css/components.css">
    <link rel="stylesheet" href="<?= base_url('assets/admin') ?>/sweetalert/sweetalert2.min.css">
</head>

<body>
    <div id="app">
        <?= $contents ?>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/scripts.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/custom.js"></script>
    <script src="<?= base_url('assets/admin') ?>/sweetalert/sweetalert2.min.js"></script>

    <!-- Page Specific JS File -->

    <script>
        const flash_login = $('.flash-login').data('flash');

        if (flash_login) {
            Swal.fire({
                title: flash_login,
                text: 'Email atau password tidak tersedia',
                icon: 'warning'
            });
        }

        const flash_success = $('.flash-success').data('flash');
        if (flash_success) {
            Swal.fire({
                title: 'Success',
                text: flash_success,
                icon: 'success'
            });
        }
    </script>
</body>

</html>