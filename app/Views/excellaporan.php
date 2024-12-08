<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pesanan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: center;
        }
        td {
            text-align: left;
        }
    </style>
</head>
<body>
    <h3>Laporan Pesanan</h3>
    <table class="table table-striped" id="my-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Metode Pembayaran</th>
                <th>Status</th>
                <th>Tanggal Pesan</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($takdirestui)): ?>
                <?php $no = 1; ?>
                <?php foreach ($takdirestui as $order): ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $order->nama_pelanggan ?></td>
                        <td><?= $order->menu ?></td>
                        <td><?= $order->jumlah ?></td>
                        <td>Rp.<?= number_format($order->total_harga, 0, ',', '.') ?></td>
                        <td><?= ucfirst($order->metode_pembayaran) ?></td>
                        <td><?= ucfirst($order->status) ?></td>
                        <td><?= $order->tanggal_pesan ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="8" class="text-center">Tidak ada data pesanan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <script>
    window.onload = () => {
      const table = document.getElementById('my-table');
        exportTable(table, 'laporan.xls');
    };

      function exportTable(table, filename) {
        const tableHTML = encodeURIComponent(table.outerHTML);
        const downloadLink = document.createElement('a');

        downloadLink.href =  `data:application/vnd.ms-excel,${tableHTML}`;
        downloadLink.download = filename;
        document.body.appendChild(downloadLink);
        downloadLink.click();
        document.body.removeChild(downloadLink);
        window.close();
    }
    </script>
</body>
</html>
