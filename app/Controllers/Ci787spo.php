<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KmiModel;
use App\Models\ProdukModel;

class Ci787spo extends BaseController
{
	public function __construct()
	{
		$this->config    = new \Config\Encryption();      // load the configuration for the encryption service
		$this->encrypter = \Config\Services::encrypter($this->config); // start the encryption service
		session();
		$this->KmiModel = new KmiModel();
		$this->ProdukModel = new ProdukModel();
	}
	public function index()
	{
		$condition = "CI787(SPO)";
		$f_date = '2021-06-01';
		$e_date = '2021-06-03';
		$id = 5;

		$dateBulan = '06';
		$dateTahun = '2021';

		$p_name = $this->ProdukModel->getProductRow($condition)->product_name;
		$filterDate = $this->KmiModel->AllDatabyDate($p_name, $f_date, $e_date);
		$dataId = $this->KmiModel->getDataId($id, $p_name);
		$dataStokM = $this->KmiModel->StockMonth($p_name, $dateBulan, $dateTahun);
		$stokIn = $this->KmiModel->StockIn($p_name);
		$stokOut = $this->KmiModel->StockOut($p_name);
		$StockCard = (int) $stokIn['quantity'] - (int) $stokOut['quantity'];


		$data = [
			'title' => 'Cu44 - Fgis Apps',
			'subtitle' => 'Halaman Produk CU 44',
			'stock' => $StockCard,
			'getProductNumber' => $this->ProdukModel->getProductRow($condition),
			'allData' => $this->KmiModel->AllData($p_name),
			'encrypter' => \Config\Services::encrypter($this->config)
		];
		return view('CI787SPO/v_index', $data);
	}
}
