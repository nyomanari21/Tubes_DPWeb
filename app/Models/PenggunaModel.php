<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'username', 'password', 'nama', 'email', 'tgllahir', 'role'];

    public function getPengguna($id = false)
    {
        if($id == false)
        {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getPenggunaByUsername($username)
    {
        return $this->where(['username' => $username])->first();
    }

    public function updatePengguna($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deletePengguna($id)
    {
        return $this->where('id', $id)->delete();
    }

    public function savePengguna($data)
    {
        return $this->insert($data);
    }
}

?>