<?php

namespace App\Models;

use CodeIgniter\Model;

class KontakModel extends Model
{
    protected $table = 'kontak';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'email', 'subjek', 'pesan'];

    public function getKontak($id = false)
    {
        if($id == false)
        {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function updateKontak($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteKontak($id)
    {
        return $this->where('id', $id)->delete();
    }

    public function saveKontak($data)
    {
        return $this->insert($data);
    }
}

?>