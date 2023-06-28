<?php

namespace App\Controllers;

use App\Models\KontakModel;

class Kontak extends BaseController
{
    protected $KontakModel;
    public function __construct()
    {
        $this->kontakModel = new KontakModel();
    }

    public function viewkontak()
	{
		return view('contact');
	}

	public function save($id = null)
	{
		$data = [
			'email' => $this->request->getVar('email'),
			'subjek' => $this->request->getVar('subjek'),
			'pesan' => $this->request->getVar('pesan'),
		];
		if ($id == null) {
			$this->kontakModel->saveKontak($data);
            session()->setFlashdata('success', "Pesan berhasil terkirim!");
		} else {
			$this->kontakModel->updateKontak($id, $data);
            session()->setFlashdata('success', "Pesan berhasil terkirim!");
		}
		return redirect()->to(base_url('/contact'));
	}
}

?>