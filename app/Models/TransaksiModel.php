<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'username', 'kreator', 'id_course', 'judul_course', 'harga', 'metode', 'tanggal', 'status', 'bukti'];

    public function getTransaksi($id = false)
    {
        if($id == false)
        {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getTransaksiByUsername($username)
    {
        return $this->where(['username' => $username])->findAll();
    }

    public function getTransaksiByCreator($username)
    {
        return $this->where(['kreator' => $username])->findAll();
    }

    public function getSpecificTransaksi($id, $username)
    {
        return $this->where(['id_course' => $id, 'username' => $username])->first();
    }

    public function updateTransaksi($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteTransaksi($id)
    {
        return $this->where('id', $id)->delete();
    }

    public function saveTransaksi($data)
    {
        return $this->insert($data);
    }
}

?>