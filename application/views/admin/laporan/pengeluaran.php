<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Laporan Pengeluaran</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Laporan Pengeluaran</a></div>
                <div class="breadcrumb-item">Main</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Data Laporan Pengeluaran</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Laporan Pengeluaran</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= site_url('Laporan/cetakLaporanPengeluaran') ?>" method="POST" target="_BLANK">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dari">Dari</label>
                                            <input type="date" class="form-control" name="dari" id="dari" placeholder="Dari" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dari">Sampai</label>
                                            <input type="date" class="form-control" name="sampai" id="sampai" placeholder="Sampai" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" name="cetak" class="form-control btn btn-primary"><i class="fa fa-print mr-2"></i>Cetak</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" name="excell" class="form-control btn btn-success"><i class="fa fa-download mr-2"></i>Export Excell</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" name="pdf" class="form-control btn btn-danger"><i class="fa fa-download mr-2"></i>Export PDF</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>