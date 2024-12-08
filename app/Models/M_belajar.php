<?php
namespace App\Models;

use CodeIgniter\Model;

class M_belajar extends Model
{
    protected $table = 'makanan'; 
    protected $primaryKey = 'id_makanan'; 
    protected $allowedFields = ['id_makanan', 'nama_menu', 'harga', 'foto', 'status', 'kode_menu']; 
    
    public function tampil($table, $by)
    {
        return $this->db->table($table)
        ->orderBy($by, 'desc')
        ->get()
        ->getResult();
    }

    public function join($table, $table2, $on)
    {
        return $this->db->table($table)
        ->join($table2, $on)
        ->get()
        ->getResult();
    }

    // public function filter($table, $table2, $on, $filter1, $filter2, $awal, $akhir)
    // {
    //     return $this->db->table($table)
    //     ->join($table2, $on)
    //     ->where($filter1, $awal)
    //     ->where($filter2, $akhir)
    //     ->get()
    //     ->getResult();
    // }


    public function filterByDate($table, $columnDate, $startDate, $endDate)
    {
        return $this->db->table($table)
        ->where("DATE($columnDate) >=", $startDate)
        ->where("DATE($columnDate) <=", $endDate)
        ->get()
        ->getResult();
    }





    public function joinw($table, $table2, $on, $w)
    {
        return $this->db->table($table)
        ->join($table2, $on)
        ->where($w)
        ->get()
        ->getRow();
    }

    public function input($table, $data)
    {
        return $this->db->table($table)->insert($data);
    }

    public function hapus($table, $where)
    {
        return $this->db->table($table)->delete($where);
    }

    public function getWhere($table, $where)
    {
        return $this->db->table($table)->getWhere($where)->getRow();
    }

    public function edit($table, $data, $where)
    {
        return $this->db->table($table)->update($data, $where);
    }

    public function getMenuItems()
    {
        return $this->findAll();
    }
    // public function getOrderById($id_order)
    // {
    //     return $this->where('id_order', $id_order)->first();
    // }
    public function updateBuktiPembayaran($id_order, $data)
    {
    return $this->db->table('orders') // Sesuaikan dengan nama tabel yang benar untuk tabel order
    ->update($data, ['id_order' => $id_order]);
}

public function getOrdersNotSelesai()
{
    return $this->db->table('order')
    ->where('status !=', 'selesai')
    ->orderBy('id_order', 'desc')
    ->get()
    ->getResult();
}

}
