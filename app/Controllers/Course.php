<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\TransaksiModel;

class Course extends BaseController
{
    protected $CourseModel;
	protected $TransaksiModel;
    public function __construct()
    {
        $this->courseModel = new CourseModel();
		$this->transaksiModel = new TransaksiModel();
    }

    public function index()
	{
		$course = $this->courseModel->getCourse();
		$data = [
			'course' => $course
		];
		return view('courselist', $data);
	}

    public function list($category)
    {
        $course = $this->courseModel->getCourseByCategory($category);
		$data = [
			'kategori' => $category,
			'course' => $course
		];
		return view('courselist', $data);
    }

    public function listAdmin($category, $username)
    {
        $course = $this->courseModel->getCourseAdmin($category, $username);
		$data = [
			'kategori' => $category,
			'course' => $course
		];
		return view('courselist', $data);
    }

	public function detail($id)
	{
		$course = $this->courseModel->getCourse($id);
		$data = [
			'course' => $course
		];
		return view('coursedetail', $data);
	}

	public function viewpayment($id){
		if(session()->get('logged_in'))
		{
			$course = $this->courseModel->getCourse($id);
			$data = [
				'course' => $course
			];
			return view('payment', $data);
		}
		else
		{
			return redirect()->to(base_url('/home'));
		}
	}

	public function create()
	{
		if(session()->get('logged_in'))
		{
			if(session()->get('role') == "admin")
			{
				return view('Admin/create');
			}
			return redirect()->to(base_url('/home'));
		}
		else
		{
			return redirect()->to(base_url('/home'));
		}
	}

	public function save($id = null)
	{
		$foto = $this->request->getFile('foto');
		
        if(!file_exists($foto))
		{
            $filename = $this->request->getVar('foto2');
        }
        else{
            $filename = $foto->getRandomName();
        }

		$data = [
			'kreator' => $this->request->getVar('kreator'),
			'kategori' => $this->request->getVar('kategori'),
			'judul' => $this->request->getVar('judul'),
			'subjudul' => $this->request->getVar('subjudul'),
			'durasivideo' => $this->request->getVar('durasivideo'),
			'jumlahpelajaran' => $this->request->getVar('jumlahpelajaran'),
			'level' => $this->request->getVar('level'),
			'harga' => $this->request->getVar('harga'),
			'deskripsi' => $this->request->getVar('deskripsi'),
			'foto' => $filename,
		];

		if(file_exists($foto))
		{
			$foto->move('../public/Assets', $filename);
		}
		
		if ($id == null) {
			$this->courseModel->saveCourse($data);
		} else {
			$this->courseModel->updateCourse($id, $data);
		}
		return redirect()->to(base_url('/home'));
	}

	public function delete($id)
	{
		$this->courseModel->deleteCourse($id);
		return redirect()->to(base_url('/home'));
	}

	public function update($id)
	{
		$data = [
			'title' => 'Form Update Course',
			'course' => $this->courseModel->getCourse($id),
		];

		return view('Admin/update', $data);
	}
}

?>