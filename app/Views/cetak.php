<main id="main" class="main">

    <div class="pagetitle">
        <h1>Laporan Penjualan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

            <!-- Card PRINT -->
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">PRINT</h5>
                        <form action="<?= base_url('home/biasa') ?>" method="post">
                            <div class="mb-3">
                                <label for="twl">Tanggal Awal :</label>
                                <input type="date" class="form-control" name="ta">
                            </div>
                            <div class="mb-3">
                                <label for="takr">Tanggal Akhir :</label>
                                <input type="date" class="form-control" name="tar">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-info">
                                    <i class="bi-printer"></i> Print
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Card PDF -->
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">PDF</h5>
                        <form action="<?= base_url('home/downloadpdf') ?>" method="post">
                            <div class="mb-3">
                                <label for="twl">Tanggal Awal :</label>
                                <input type="date" class="form-control" name="ta">
                            </div>
                            <div class="mb-3">
                                <label for="takr">Tanggal Akhir :</label>
                                <input type="date" class="form-control" name="tar">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi-file-pdf"></i> PDF
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Card EXCEL -->
            <div class="col-lg-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">EXCEL</h5>
                        <form action="<?= base_url('home/excellaporan') ?>" method="post">
                            <div class="mb-3">
                                <label for="twl">Tanggal Awal :</label>
                                <input type="date" class="form-control" name="ta">
                            </div>
                            <div class="mb-3">
                                <label for="takr">Tanggal Akhir :</label>
                                <input type="date" class="form-control" name="tar">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi-file-excel"></i> Excel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->
