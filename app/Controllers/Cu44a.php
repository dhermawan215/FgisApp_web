<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cu44aModel;
use App\Models\ProdukModel;
use Config\Services;
use Mpdf\Mpdf;

class Cu44a extends BaseController
{
	protected $session;

	public function __construct()
	{
		$this->Cu44aModel = new Cu44aModel();
		$this->ProdukModel = new ProdukModel();
		$this->config    = new \Config\Encryption();      // load the configuration for the encryption service
		$this->encrypter = \Config\Services::encrypter($this->config); // start the encryption service
		session();
		$this->session = Services::session();
		$this->Mpdf = new Mpdf();
	}

	public function index() //home page cu 44a
	{
		if ($this->session->loginSucces == null) {
			return redirect()->to(\base_url('login'));
		}

		$condition = "CU-44A";

		$inData = $this->Cu44aModel->getInData();
		$outData = $this->Cu44aModel->getOutData();
		$allDataDesc = $this->Cu44aModel->allDataDesc();

		$inDataArray = (int)$inData['quantity'];
		$outDataArray = (int)$outData['quantity'];
		$stock44 = $inDataArray - $outDataArray;

		$data = [
			'title' => 'Cu44A - Fgis Apps',
			'subtitle' => 'Halaman Produk CU 44A',
			'stock' => $stock44,
			'getProductNumber' => $this->ProdukModel->getProductRow($condition),
			'allData' => $allDataDesc,
			'encrypter' => \Config\Services::encrypter($this->config)
		];
		return view('cu44A/v_44A', $data);
	}

	public function SearchLimit()
	{
		$limit = $this->request->getPost('limit');
		$condition = "CU-44A";
		$inData = $this->Cu44aModel->getInData();
		$outData = $this->Cu44aModel->getOutData();

		$inDataArray = (int)$inData['quantity'];
		$outDataArray = (int)$outData['quantity'];
		$stock44 = $inDataArray - $outDataArray;

		$data = [
			'title' => 'Cu44A - Fgis Apps',
			'subtitle' => 'Halaman Produk CU 44A',
			'stock' => $stock44,
			'getProductNumber' => $this->ProdukModel->getProductRow($condition),
			'allData' => $this->Cu44aModel->allDataDesc($limit),
			'encrypter' => \Config\Services::encrypter($this->config)
		];
		return view('cu44A/v_44A', $data);
	}

	public function SearchDate()
	{
		$firstDate = $this->request->getPost('firstDate');
		$endDate = $this->request->getPost('endDate');
		$condition = "CU-44A";
		$inData = $this->Cu44aModel->getInData();
		$outData = $this->Cu44aModel->getOutData();

		$inDataArray = (int)$inData['quantity'];
		$outDataArray = (int)$outData['quantity'];
		$stock44 = $inDataArray - $outDataArray;

		$data = [
			'title' => 'Cu44A - Fgis Apps',
			'subtitle' => 'Halaman Produk CU 44A',
			'stock' => $stock44,
			'getProductNumber' => $this->ProdukModel->getProductRow($condition),
			'allData' => $this->Cu44aModel->getDatabyDateFilter($firstDate, $endDate),
			'encrypter' => \Config\Services::encrypter($this->config)
		];
		return view('cu44A/v_44A', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Input Assy Entry - Fgis Apps',
			'subtitle' => 'Halaman Input Stock Card CU 44A',
			'breadcumb' => 'Input Assy Entry Stock Card CU 44A',
			"validation" => \Config\Services::validation()
		];
		return view('cu44A/v_create', $data);
	}

	public function save()
	{
		if (!$this->validate([
			'date_transaction' => [
				'rules' => 'required',
				'errors' => ['required' => 'Tanggal harus di isi !']
			],
			'quantity' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'input' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'remark' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'fill_by' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'checked_by' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
		])) {
			return redirect()->to('/cu44A/create')->withInput();
		}

		$this->Cu44aModel->save([
			'date_transaction' => $this->request->getPost('date_transaction'),
			'quantity' => $this->request->getPost('quantity'),
			'input' => $this->request->getPost('input'),
			'remark' => $this->request->getPost('remark'),
			'fill_by' => $this->request->getPost('fill_by'),
			'checked_by' => $this->request->getPost('checked_by'),
		]);
		session()->setFlashdata('berhasil', 'Data Berhasil di Simpan!');
		return redirect()->to(route_to('cu44A'));
	}

	public function preparation()
	{
		$data = [
			'title' => 'Input Persiapan - Fgis Apps',
			'subtitle' => 'Halaman Input Persiapan Stock Card CU 44A',
			'breadcumb' => 'Input Persiapan Stock Card CU 44A',
			"validation" => \Config\Services::validation()
		];
		return view('cu44A/v_preparation', $data);
	}


	public function prepare()
	{
		if (!$this->validate([
			'date_transaction' => [
				'rules' => 'required',
				'errors' => ['required' => 'Tanggal harus di isi !']
			],
			'quantity' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'input' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'remark' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'fill_by' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'checked_by' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
		])) {
			return redirect()->to('/cu44A/preparation')->withInput();
		}

		$this->Cu44aModel->save([
			'date_transaction' => $this->request->getPost('date_transaction'),
			'quantity' => $this->request->getPost('quantity'),
			'input' => $this->request->getPost('input'),
			'remark' => $this->request->getPost('remark'),
			'fill_by' => $this->request->getPost('fill_by'),
			'checked_by' => $this->request->getPost('checked_by'),
		]);
		session()->setFlashdata('berhasil', 'Data Berhasil di Simpan!');
		return redirect()->to(route_to('cu44A'));
	}

	public function edit($id)
	{
		if ($this->session->loginSucces == null) {
			return redirect()->to(\base_url('login'));
		}

		$encrypter = \Config\Services::encrypter($this->config);
		$decrypted_data = $encrypter->decrypt(hex2bin($id));

		$data = [
			'title' => 'Edit Stok CU-44A - Fgis Apps',
			'subtitle' => 'Halaman Edit Stock Card CU 44A',
			'breadcumb' => 'Edit Stock Card CU 44A',
			"validation" => \Config\Services::validation(),
			'editStock' => $this->Cu44aModel->getDataId($decrypted_data),
			'encrypter' => \Config\Services::encrypter($this->config)
		];
		return view('cu44A/v_44A_edit', $data);
	}

	public function update($id)
	{
		$encrypter = \Config\Services::encrypter($this->config);
		if (!$this->validate([
			'date_transaction' => [
				'rules' => 'required',
				'errors' => ['required' => 'Tanggal harus di isi !']
			],
			'quantity' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'input' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'remark' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'fill_by' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'checked_by' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
		])) {
			return redirect()->to('/cu44A/edit/' . $id)->withInput();
		} else {
			$id2 = $encrypter->decrypt(hex2bin($id));

			$this->Cu44aModel->save([
				'id_44a' => $id2,
				'date_transaction' => $this->request->getPost('date_transaction'),
				'quantity' => $this->request->getPost('quantity'),
				'input' => $this->request->getPost('input'),
				'remark' => $this->request->getPost('remark'),
				'fill_by' => $this->request->getPost('fill_by'),
				'checked_by' => $this->request->getPost('checked_by'),
			]);
			session()->setFlashdata('info', 'Data Berhasil di Perbaharui!');
			return redirect()->to(route_to('cu44A'));
		}
	}

	public function delete($id)
	{
		$this->Cu44aModel->delete($id);
		session()->setFlashdata('gagal', 'Data Berhasil di Hapus!');
		return redirect()->to(route_to('cu44A'));
	}

	public function generate()
	{

		$dateBulan = $this->request->getPost('month');
		$dateTahun = $this->request->getPost('year');
		$btnPdf = $this->request->getPost('pdf');
		$btnXls = $this->request->getPost('excel');

		$stokMasuk = $this->Cu44aModel->Stok44AIn($dateBulan, $dateTahun);
		$stokKeluar = $this->Cu44aModel->Stok44AOut($dateBulan, $dateTahun);
		$stokBulan = $this->Cu44aModel->Stok44ABulan($dateBulan, $dateTahun);


		if ($stokBulan == null) {
			session()->setFlashdata('warning', 'Maaf Data Tidak ada!');
			return redirect()->to(route_to('cu44A'));
		}
		if ($stokKeluar == null) {
			session()->setFlashdata('warning', 'Maaf Data Tidak ada!');
			return redirect()->to(route_to('cu44A'));
		}
		if ($stokMasuk == null) {
			session()->setFlashdata('warning', 'Maaf Data Tidak ada!');
			return redirect()->to(route_to('cu44A'));
		}

		if ($btnPdf == "pdfmake") {
			return $this->pdf($stokMasuk, $stokKeluar, $stokBulan, $dateBulan, $dateTahun);
		} elseif ($btnXls == "excelmake") {
			return $this->excel($stokMasuk, $stokKeluar, $stokBulan, $dateBulan, $dateTahun);
		} else {
			return \false;
		}
	}

	private function pdf($stokMasuk, $stokKeluar, $stokBulan, $dateBulan, $dateTahun)
	{

		$data = [
			'StokMasuk' => $stokMasuk,
			'StokKeluar' => $stokKeluar,
			'StokBulan' => $stokBulan,
			'bulan' => $dateBulan,
			'tahun' => $dateTahun
		];

		$this->Mpdf->WriteHTML(\view('cu44A/v_44A_pdf', $data));
		$outputPdf = $this->Mpdf->Output('laporan_stok_cu44a_bulan_' . $dateBulan . '-' . $dateTahun . '.pdf', "D");
		return $outputPdf;
	}

	private function excel($stokMasuk, $stokKeluar, $stokBulan, $dateBulan, $dateTahun)
	{
		$data = [
			'StokMasuk' => $stokMasuk,
			'StokKeluar' => $stokKeluar,
			'StokBulan' => $stokBulan,
			'bulan' => $dateBulan,
			'tahun' => $dateTahun
		];
		return \view('cu44A/v_44A_excel', $data);
	}
}
