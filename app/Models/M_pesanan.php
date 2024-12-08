<?php

namespace App\Models;

use CodeIgniter\Model;

class M_pesanan extends Model
{
    protected $table = 'order'; // Pastikan ini sesuai dengan nama tabel yang digunakan
    protected $primaryKey = 'id_order'; 
    protected $allowedFields = ['id_order', 'status', 'bukti']; // Daftar kolom yang diizinkan untuk diupdate
    
    // Metode untuk mendapatkan semua pesanan yang masih dalam status 'pending'
    public function getPendingOrders()
    {
        return $this->where('status', 'pending')->findAll();
    }

    // Metode untuk memperbarui status pesanan menjadi 'selesai'
    public function updateStatusToSelesai($id_order)
    {
        return $this->update($id_order, ['status' => 'selesai']);
    }

    // Metode untuk mengupdate bukti pembayaran (jika diperlukan)
    public function updateBuktiPembayaran($id_order, $data)
    {
        return $this->update($id_order, ['bukti' => $data['bukti']]);
    }
    public function edit($table, $data, $where)
    {
        return $this->db->table($table)->update($data, $where);
    }
    public function updateStatusOrder($id_order, $data)
{
    return $this->update($id_order, $data); // Memperbarui status pesanan
}
}