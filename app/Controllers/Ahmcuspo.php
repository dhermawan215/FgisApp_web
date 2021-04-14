<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Ahmcuspo extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'AHM Cu SPO - Fgis Apps',
			'subtitle' => 'Halaman Produk AHM CU SPO'
		];

		return view('categories/Ahm_Cu_Spo/index', $data);
	}
}
