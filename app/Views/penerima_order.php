<?php if (session()->get('level') == 4 || session()->get('level') == 1 ): ?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Daftar Orderan</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List Order</h5>

                        <!-- List Order -->
                        <ul class="list-group">
                            <?php foreach ($takdirestui as $order): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>Nama Pelanggan:</strong> <?= $order->nama_pelanggan ?><br>
                                        <strong>Menu:</strong> <?= $order->menu ?><br>
                                        <strong>Total Harga:</strong> Rp. <?= number_format($order->total_harga, 0, ',', '.') ?><br>
                                        <strong>Status:</strong> <?= ucfirst($order->status) ?><br>
                                        <strong>Tanggal Pesan:</strong> <?= $order->tanggal_pesan ?><br>
                                        <strong>Bukti Pembayaran:</strong>
                                        <?php if (!empty($order->bukti)): ?>
                                            <img src="<?= base_url('uploads/' . $order->bukti) ?>" alt="Bukti Pembayaran" width="100">
                                        <?php else: ?>
                                            Belum ada bukti pembayaran
                                        <?php endif; ?>
                                    </div>

                                    <div>
                                        <?php if ($order->status == 'pending'): ?>
                                            <!-- Form untuk mengunggah bukti pembayaran -->
                                            <form action="<?= base_url('home/uploadBukti') ?>" method="post" enctype="multipart/form-data" style="display:inline;">
                                                <?= csrf_field() ?> <!-- CSRF Token -->
                                                <input type="hidden" name="id_order" value="<?= $order->id_order ?>">
                                                
                                                <label for="bukti">Upload Bukti Pembayaran:</label>
                                                <input type="file" name="bukti" id="bukti" accept="image/*" required>
                                                
                                                <button type="submit" class="btn btn-primary btn-sm">Kirim Bukti</button>
                                            </form>

                                            <!-- Tombol untuk mengubah status menjadi selesai -->
                                            <form action="<?= base_url('home/selesai') ?>" method="post" style="display:inline;">
                                                <?= csrf_field() ?> <!-- CSRF Token -->
                                                <input type="hidden" name="id_order" value="<?= $order->id_order ?>">
                                                <button type="submit" class="btn btn-success btn-sm">Selesai</button>
                                            </form>
                                        <?php else: ?>
                                            <span class="text-success">Selesai</span>
                                        <?php endif; ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php else: ?>
<!-- Jika bukan kurir -->
<div class="alert alert-danger">
    <p>Anda tidak memiliki akses ke halaman ini!</p>
</div>
<?php endif; ?>