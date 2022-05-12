<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Laporan Pemasukan</title>
</head>

<body>

    <div class="print-area" id="print">
        <section class="header mt-5" style="padding: 0px 50px;">
            <div class="container">
                <div class="logo text-center">
                    <h1 class="mt-3"><b>DOEA NOUNA</b></h1>
                    <p><i>Alamat : Jl Your Address Here No. 178 Sleman, Yogyakarta</i></p>
                </div>
            </div>
            <hr style="border: 1px solid #000;">
        </section>

        <section class="content">
            <div class="container-fluid" style="padding: 20px 50px;">
                <h2>Laporan Pemasukan</h2>
                <p class="text-muted mt-4 mb-0">From : <?= $dari ?></p>
                <p class="text-muted">Untill : <?= $sampai ?></p>
                <table class="table table-bordered">
                    <thead class="bg-success text-white">
                        <tr>
                            <th scope="col">Invoice</th>
                            <th scope="col">Nama Pemesan</th>
                            <th scope="col">Rekening</th>
                            <th scope="col">Alamat Pengiriman</th>
                            <th scope="col">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0;
                        foreach ($pemasukan as $item) : ?>
                            <tr>
                                <th scope="row"><?= $item->idTransaksi ?></th>
                                <td><?= $item->namaKonsumen ?></td>
                                <td><?= $item->noRekening ?> - <?= $item->namaRekening ?></td>
                                <td><?= $item->alamatPengiriman ?></td>
                                <td><?php $total += $item->totalBelanja ?>Rp.<?php echo number_format($item->totalBelanja, 2, ',', '.'); ?></td>
                            </tr>
                        <?php endforeach ?>
                        <tr>
                            <th colspan="4" class="text-right pr-4 bg-dark text-white">Total Pendapatan</th>
                            <td>Rp.<?= number_format($total, 2, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>
    <div class="container-fluid" style="padding: 0px 50px;">
        <button class="btn btn-primary" onclick="printArea('print')">Print</button>
    </div>


    <script>
        function printArea(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>