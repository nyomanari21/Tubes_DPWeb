<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use TCPDF;

class Transaksi extends BaseController
{
    protected $TransaksiModel;
    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }

    public function index($username = null, $role = null)
	{
		if(session()->get('logged_in'))
		{
			if($role == "admin")
			{
				$transaksi = $this->transaksiModel->getTransaksiByCreator($username);
			}
			else
			{
				$transaksi = $this->transaksiModel->getTransaksiByUsername($username);
			}

			$data = [
				'transaksi' => $transaksi
			];
			return view('transaction', $data);
		}
		else
		{
			return redirect()->to(base_url('/home'));
		}
	}

	

	public function payment()
	{
		date_default_timezone_set("Asia/Jakarta");
		$data = [
			'username' => $this->request->getVar('username'),
			'kreator' => $this->request->getVar('kreator'),
			'id_course' => $this->request->getVar('id_course'),
			'judul_course' => $this->request->getVar('judul_course'),
			'harga' => $this->request->getVar('harga'),
			'metode' => $this->request->getVar('metode'),
			'tanggal' => date("Ymd"),
			'status' => "Belum Bayar",
			'bukti' => "none",
		];
		$check = $this->transaksiModel->getSpecificTransaksi($data['id_course'], $data['username']);
		if(!$check)
		{
			$this->transaksiModel->saveTransaksi($data);
			return redirect()->to(base_url('/transaksi/afterpayment/success'));
		}
		else
		{
			return redirect()->to(base_url('/transaksi/afterpayment/fail'));
		}
	}

    public function afterpayment($status)
    {
		$data = [
			'status' => $status
		];
        return view('afterpayment', $data);
    }

	public function exportPDF($username)
	{
		if(session()->get('role') == "admin"){
            $data['transaksi'] = $this->transaksiModel->getTransaksiByCreator($username);
            $html_view = view('Admin/report', $data);

            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor(session()->get('username'));
            $pdf->SetTitle('Daftar Transaksi');
            $pdf->SetSubject('Tugas Besar Desain Web');

            $pdf->SetPrintHeader(false);
            $pdf->SetPrintFooter(false);

            $pdf->AddPage();
            $pdf->writeHTML($html_view, true, false, true, false, '');
            $this->response->setContentType('application/pdf');
            $pdf->Output('ReportTransaction.pdf', 'I');
        }
        else{
            return redirect()->to(base_url('/'));
        }
	}

	public function bukti($id)
	{
		$foto = $this->request->getFile('bukti');
		$filename = $foto->getRandomName();

		$data = [
			'bukti' => $filename,
		];

		if(file_exists($foto))
		{
			$foto->move('../public/Assets', $filename);
		}

		$this->transaksiModel->updateTransaksi($id, $data);
		return redirect()->to(base_url('/home'));
	}

	public function konfirmasi($id)
	{
		$data = [
			'status' => "Sudah Bayar"
		];

		$this->transaksiModel->updateTransaksi($id, $data);
		return redirect()->to(base_url('/home'));
	}

	public function create()
	{
		// $data = [
		// 	'title' => 'Form Tambah Data Mahasiswa'
		// ];

		// return view('Mahasiswa/view_create', $data);
	}

	public function save($id = null)
	{
		// $data = [
		// 	'nim' => $this->request->getVar('nim'),
		// 	'nama' => $this->request->getVar('nama'),
		// 	'kelas' => $this->request->getVar('kelas'),
		// 	'email' => $this->request->getVar('email'),
		// 	'alamat' => $this->request->getVar('alamat'),
		// ];
		// if ($id == null) {
		// 	$this->mahasiswaModel->saveMahasiswa($data);
		// } else {
		// 	$this->mahasiswaModel->updateMahasiswa($id, $data);
		// }
		// return redirect()->to(base_url('/mahasiswa'));
	}

	public function delete($id)
	{
		// $this->mahasiswaModel->deleteMahasiswa($id);
		// return redirect()->to(base_url('/mahasiswa'));
	}

	public function update($id)
	{
		// $data = [
		// 	'title' => 'Form Update Data Mahasiswa',
		// 	'mahasiswa' => $this->mahasiswaModel->getMahasiswa($id),
		// ];

		// return view('Mahasiswa/view_update', $data);
	}
}

?>