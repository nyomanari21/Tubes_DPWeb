<?php

namespace App\Controllers;

use App\Models\PenggunaModel;

class Pengguna extends BaseController
{
    protected $PenggunaModel;
    public function __construct()
    {
        $this->penggunaModel = new PenggunaModel();
    }

    public function viewlogin()
	{
		if(session()->get('logged_in'))
		{
			return redirect()->to(base_url('/home'));
		}
		else
		{
			return view('login');
		}
    }

    public function viewsignup()
	{
		if(session()->get('logged_in'))
		{
			return redirect()->to(base_url('/home'));
		}
		else
		{
			return view('signup');
		}
    }

	public function viewsignupadmin()
	{
		if(session()->get('logged_in'))
		{
			return redirect()->to(base_url('/home'));
		}
		else
		{
			return view('signup-admin');
		}
    }

	public function profile($username)
	{
		if(session()->get('logged_in'))
		{
			$account = $this->penggunaModel->getPenggunaByUsername($username);
			$data = [
				'account' => $account
			];
			return view('profile', $data);
		}
		else
		{
			return redirect()->to(base_url('/home'));
		}
	}

	public function login()
	{
		$username = $this->request->getVar('username');
		$password = $this->request->getVar('password');
		$account = $this->penggunaModel->getPenggunaByUsername($username);
		
		if($account)
		{
			if($password == $account['password'])
			{
				session()->set([
					'username' => $account['username'],
					'name' => $account['nama'],
					'role' => $account['role'],
					'logged_in' => TRUE
				]);
				return redirect()->to(base_url('/home'));
			}
			else
			{
				session()->setFlashdata('error', "Password yang dimasukkan salah");
				return redirect()->to(base_url('/login'));
			}
		}
		else
		{
			session()->setFlashdata('error', "Username yang dimasukkan salah");
			return redirect()->to(base_url('/login'));
		}
	}

	public function logout()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(base_url('/home'));
	}

    public function save($id = null)
	{
		$data = [
			'username' => $this->request->getVar('username'),
			'password' => $this->request->getVar('password'),
			'nama' => $this->request->getVar('nama'),
			'email' => $this->request->getVar('email'),
			'tgllahir' => $this->request->getVar('tgllahir'),
			'role' => $this->request->getVar('role'),
		];
		$username = $this->penggunaModel->getPenggunaByUsername($data['username']);
		if ($id == null) {
			if(!$username)
			{
				$this->penggunaModel->savePengguna($data);

				session()->setFlashdata('success', "Proses Pendaftaran Akun Berhasil!");
				if($data['role'] == "admin"){
					return redirect()->to(base_url('/signup-admin'));
				}
				else{
					return redirect()->to(base_url('/signup'));
				}
			}
			else
			{
				session()->setFlashdata('error', "Username telah terdaftar, silahkan gunakan username yang lain.");
				return redirect()->to(base_url('/signup'));
			}
		} else {
			$this->penggunaModel->updatePengguna($id, $data);
		}
	}

	public function delete($id)
	{
		// $this->penggunaModel->deletePengguna($id);
		// return redirect()->to(base_url('/mahasiswa'));
	}

	public function update($id)
	{
		// $data = [
		// 	'title' => 'Form Update Data Mahasiswa',
		// 	'mahasiswa' => $this->penggunaModel->getMahasiswa($id),
		// ];

		// return view('Mahasiswa/view_update', $data);
	}
}

?>