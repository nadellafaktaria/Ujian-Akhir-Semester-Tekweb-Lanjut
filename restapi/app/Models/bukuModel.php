<?php namespace App\Models;

use CodeIgniter\Model;

class bukuModel extends Model
{
    protected $table = 'buku';
    protected $id = 'id';
    protected $allowedFields = ['nama_buku','nama_penulis','desbuku'];
    public function ubahData($data, $id) {
        return $this->db->table($this->table)->update($data);
    }
    public function hapusData($id) {
        return $this->db->table($this->table)->delete($data);
    }
}