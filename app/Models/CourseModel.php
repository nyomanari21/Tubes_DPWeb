<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'kreator', 'kategori', 'judul', 'subjudul', 'durasivideo', 'jumlahpelajaran', 'level', 'deskripsi', 'harga', 'foto'];

    public function getCourse($id = false)
    {
        if($id == false)
        {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getCourseAdmin($category, $username)
    {
        return $this->where(['kategori' => $category, 'kreator' => $username])->findAll();
    }

    public function getCourseByCategory($category)
    {
        return $this->where('kategori', $category)->findAll();
    }

    public function updateCourse($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteCourse($id)
    {
        return $this->where('id', $id)->delete();
    }

    public function saveCourse($data)
    {
        return $this->insert($data);
    }
}

?>