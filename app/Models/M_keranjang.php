<?php

namespace App\Models;

use CodeIgniter\Model;

class M_keranjang extends Model
{
    protected $table = 'order'; // Nama tabel pesanan
    protected $primaryKey = 'id_order'; // Primary key tabel orders
    protected $allowedFields = ['id_order', 'nama_pelanggan', 'menu', 'jumlah', 'total_harga', 'status'];

    // Menampilkan semua pesanan
    public function getAllOrders()
    {
        return $this->findAll(); // Mengambil semua data order
    }
}
