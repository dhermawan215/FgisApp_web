<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Cu44Model;
use phpDocumentor\Reflection\Types\Float_;
use App\Models\ProdukModel;
use Config\Services;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;



class Cu44 extends BaseController
{
	protected $session;

	public function __construct()
	{
		$this->Cu44Model = new Cu44Model();
		$this->ProdukModel = new ProdukModel();
		$this->config    = new \Config\Encryption();      // load the configuration for the encryption service
		$this->encrypter = \Config\Services::encrypter($this->config); // start the encryption service
		session();
		$this->session = Services::session();
		$this->routes = Services::routes();
	}

	public function index()
	{
		if ($this->session->loginSucces == null) {
			return redirect()->to(\base_url('login'));
		}
		$condition = "CU-44";
		$inData = $this->Cu44Model->getInData();
		$outData = $this->Cu44Model->getOutData();
		$allDataDesc = $this->Cu44Model->allDataDesc();

		$inDataArray = (int)$inData['quantity'];
		$outDataArray = (int)$outData['quantity'];
		$stock44 = $inDataArray - $outDataArray;

		$data = [
			'title' => 'Cu44 - Fgis Apps',
			'subtitle' => 'Halaman Produk CU 44',
			'stock' => $stock44,
			'getProductNumber' => $this->ProdukModel->getProductRow($condition),
			'allData' => $allDataDesc,
			'encrypter' => \Config\Services::encrypter($this->config)
		];
		return view('cu44views/v_44', $data);
	}

	public function SearchDate()
	{
		$condition = "CU-44";
		$endDate = $this->request->getPost('endDate');
		$firstDate = $this->request->getPost('firstDate');

		$inData = $this->Cu44Model->getInData();
		$outData = $this->Cu44Model->getOutData();

		$inDataArray = (int)$inData['quantity'];
		$outDataArray = (int)$outData['quantity'];
		$stock44 = $inDataArray - $outDataArray;

		$data = [
			'title' => 'Cu44 - Fgis Apps',
			'subtitle' => 'Halaman Produk CU 44',
			'stock' => $stock44,
			'getProductNumber' => $this->ProdukModel->getProductRow($condition),
			'allData' => $this->Cu44Model->getDatabyDateFilter($firstDate, $endDate),
			'encrypter' => \Config\Services::encrypter($this->config)
		];
		return view('cu44views/v_44', $data);
	}
	public function SearchLimit()
	{
		$condition = "CU-44";
		$limit = $this->request->getPost('limit');

		$inData = $this->Cu44Model->getInData();
		$outData = $this->Cu44Model->getOutData();

		$inDataArray = (int)$inData['quantity'];
		$outDataArray = (int)$outData['quantity'];
		$stock44 = $inDataArray - $outDataArray;

		$data = [
			'title' => 'Cu44 - Fgis Apps',
			'subtitle' => 'Halaman Produk CU 44',
			'stock' => $stock44,
			'getProductNumber' => $this->ProdukModel->getProductRow($condition),
			'allData' => $this->Cu44Model->allDataDesc($limit),
			'encrypter' => \Config\Services::encrypter($this->config)
		];
		return view('cu44views/v_44', $data);
	}

	public function create()
	{

		$data = [
			'title' => 'Input Assy Entry - Fgis Apps',
			'subtitle' => 'Halaman Input Stock Card CU 44',
			'breadcumb' => 'Input Assy Entry Stock Card CU 44',
			"validation" => \Config\Services::validation(),

		];
		return view('cu44views/v_create', $data);
	}

	public function preparation()
	{
		$data = [
			'title' => 'Input Persiapan - Fgis Apps',
			'subtitle' => 'Halaman Input Persiapan Stock Card CU 44',
			'breadcumb' => 'Input Persiapan Stock Card CU 44',
			"validation" => \Config\Services::validation(),

		];
		return view('cu44views/v_preparation', $data);
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
			return redirect()->to('/cu44/create')->withInput();
		}

		$this->Cu44Model->save([
			'date_transaction' => $this->request->getPost('date_transaction'),
			'quantity' => $this->request->getPost('quantity'),
			'input' => $this->request->getPost('input'),
			'remark' => $this->request->getPost('remark'),
			'fill_by' => $this->request->getPost('fill_by'),
			'checked_by' => $this->request->getPost('checked_by'),
		]);
		session()->setFlashdata('berhasil', 'Data Berhasil di Simpan!');
		return redirect()->to(route_to('cu44'));
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
			return redirect()->to('/cu44/preparation')->withInput();
		}

		$this->Cu44Model->save([
			'date_transaction' => $this->request->getPost('date_transaction'),
			'quantity' => $this->request->getPost('quantity'),
			'input' => $this->request->getPost('input'),
			'remark' => $this->request->getPost('remark'),
			'fill_by' => $this->request->getPost('fill_by'),
			'checked_by' => $this->request->getPost('checked_by'),
		]);
		session()->setFlashdata('berhasil', 'Data Berhasil di Simpan!');
		return redirect()->to(route_to('cu44'));
	}

	public function edit($id)
	{
		if ($this->session->loginSucces == null) {
			return redirect()->to(\base_url('login'));
		}

		$encrypter = \Config\Services::encrypter($this->config);
		$decrypted_data = $encrypter->decrypt(hex2bin($id));

		$data = [
			'title' => 'Edit Stok CU-44 - Fgis Apps',
			'subtitle' => 'Halaman Edit Stock Card CU 44',
			'breadcumb' => 'Edit Stock Card CU 44',
			"validation" => \Config\Services::validation(),
			'editStock' => $this->Cu44Model->getDataId($decrypted_data),
			'encrypter' => \Config\Services::encrypter($this->config)
		];
		return view('cu44views/v_edit', $data);
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
			return redirect()->to('/cu44/edit/' . $id)->withInput();
		} else {
			$id2 = $encrypter->decrypt(hex2bin($id));
			$this->Cu44Model->save([
				'id_44' => $id2,
				'date_transaction' => $this->request->getPost('date_transaction'),
				'quantity' => $this->request->getPost('quantity'),
				'input' => $this->request->getPost('input'),
				'remark' => $this->request->getPost('remark'),
				'fill_by' => $this->request->getPost('fill_by'),
				'checked_by' => $this->request->getPost('checked_by'),
			]);
			session()->setFlashdata('info', 'Data Berhasil di Perbarui!');
			return redirect()->to(route_to('cu44'));
		}
	}

	public function delete($id)
	{
		$this->Cu44Model->delete($id);
		session()->setFlashdata('gagal', 'Data Berhasil di Hapus!');
		return redirect()->to(route_to('cu44'));
	}

	public function generate()
	{

		$dateMounth = $this->request->getPost('month');
		$dateYear = $this->request->getPost('year');

		$stokMasuk = $this->Cu44Model->StokMAsukIn($dateMounth, $dateYear);
		$stokKeluar = $this->Cu44Model->StokMAsukOut($dateMounth, $dateYear);
		$stokBulan = $this->Cu44Model->stockBulan($dateMounth, $dateYear);

		$btnPdf = $this->request->getPost('pdf');
		$btnXls = $this->request->getPost('excel');



		if ($stokBulan == null) {
			session()->setFlashdata('warning', 'Maaf Data Tidak ada!');
			return redirect()->to(route_to('cu44'));
		}
		if ($stokKeluar == null) {
			session()->setFlashdata('warning', 'Maaf Data Tidak ada!');
			return redirect()->to(route_to('cu44'));
		}
		if ($stokMasuk == null) {
			session()->setFlashdata('warning', 'Maaf Data Tidak ada!');
			return redirect()->to(route_to('cu44'));
		}

		if ($btnPdf == "pdfmake") {
			return $this->pdf($stokMasuk, $stokKeluar, $stokBulan, $dateMounth, $dateYear);
		} elseif ($btnXls == "excelmake") {
			return $this->excel($stokMasuk, $stokKeluar, $stokBulan, $dateMounth, $dateYear);
		} else {
			return \false;
		}
	}

	private function pdf($stokMasuk, $stokKeluar, $stokBulan, $dateMounth, $dateYear)
	{
		$mpdf = new \Mpdf\Mpdf();
		$data = [
			'StokMasuk' => $stokMasuk,
			'StokKeluar' => $stokKeluar,
			'StokBulan' => $stokBulan,
			'bulan' => $dateMounth,
			'tahun' => $dateYear
		];

		$mpdf->WriteHTML(\view('cu44views/v_pdf', $data));
		$outputPdf = $mpdf->Output('laporan_stok_CU44_bulan_' . $dateMounth . '-' . $dateYear . '.pdf', "D");
		return $outputPdf;
	}

	private function excel($stokMasuk, $stokKeluar, $stokBulan, $dateMounth, $dateYear)
	{
		$data = [
			'StokMasuk' => $stokMasuk,
			'StokKeluar' => $stokKeluar,
			'StokBulan' => $stokBulan,
			'bulan' => $dateMounth,
			'tahun' => $dateYear
		];
		return \view('cu44views/v_excel', $data);
	}
}
