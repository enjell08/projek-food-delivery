<main id="main" class="main">

    <div class="pagetitle">
        <h1>Table Orderan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('home') ?>">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order</h5>
                        
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Menu</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Status</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Bukti Pembayaran</th>
                                    <?php if (session()->get('level') == 4 || session()->get('level') == 1 || session()->get('level') == 0): ?>
                                    <th>Aksi</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Check if there are no orders -->
                            <?php if (empty($takdirestui)): ?>
                                <tr>
                                    <td colspan="10" class="text-center">Tidak ada data pesanan</td>
                                </tr>
                            <?php else: ?>
                                <?php $ms = 1; ?>
                                <?php foreach ($takdirestui as $key => $value): ?>
                                    <tr>
                                        <td><?= $ms++ ?></td>
                                        <td><?= $value->nama_pelanggan ?></td>
                                        <td><?= $value->menu ?></td>
                                        <td><?= $value->jumlah ?></td>
                                        <td>Rp.<?= is_numeric($value->total_harga) ? number_format($value->total_harga, 0, ',', '.') : '0' ?></td>
                                        <td><?= ucfirst($value->metode_pembayaran) ?></td>
                                        <td><?= ucfirst($value->status) ?></td>
                                        <td><?= $value->tanggal_pesan ?></td>
                                        <td>
                                            <?php if (!empty($value->bukti)): ?>
                                                <img src="<?= base_url('uploads/' . $value->bukti) ?>" alt="Bukti Pembayaran" width="100" height="auto">
                                            <?php else: ?>
                                                Belum ada bukti pembayaran
                                            <?php endif; ?>
                                        </td>



                                        <!-- Aksi -->
                                        <td>
                                            <div class="d-flex">
                                                <!-- Button for "Bayar & Cetak Nota" -->
                                                <?php if (session()->get('level') == 4 || session()->get('level') == 1): ?>
                                                <button type="button" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#bayarModal<?= $value->id_order ?>">
                                                    Bayar & Cetak Nota
                                                </button>
                                            <?php endif; ?>

                                            <!-- Button for "Masukan Bukti Pembayaran" -->
                                            <?php if (session()->get('level') == 0): ?>
                                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#buktiModal<?= $value->id_order ?>">
                                                Masukan Bukti Pembayaran
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal untuk "Bayar & Cetak Nota" -->
                            <div class="modal fade" id="bayarModal<?= $value->id_order ?>" tabindex="-1" aria-labelledby="bayarModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="bayarModalLabel">Pembayaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?= base_url('home/print_nota') ?>" method="post" target="_blank">
                                            <input type="hidden" name="id_order" value="<?= $value->id_order ?>">
                                            <button type="submit" class="btn btn-primary">Cetak Nota</button>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <!-- Modal untuk "Masukan Bukti Pembayaran" -->
                            <div class="modal fade" id="buktiModal<?= $value->id_order ?>" tabindex="-1" aria-labelledby="buktiModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="buktiModalLabel">Masukan Bukti Pembayaran</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="<?= base_url('home/upload_bukti') ?>" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <input type="hidden" name="ido" value="<?= $value->id_order ?>">
                                                <label for="bukti_pembayaran">Pilih Foto Bukti Pembayaran</label>
                                                <input type="file" class="form-control" name="bukti_pembayaran" accept="image/*" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Unggah Bukti Pembayaran</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <!-- End Table with stripped rows -->
        </div>
    </div>
</div>
</div>
</section>
</main><!-- End #main -->

<script>
// Optional JS for pagination or other logic if needed
</script>
