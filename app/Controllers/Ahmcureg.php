<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Ahmcureg extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'AHM Cu Reg - Fgis Apps',
			'subtitle' => 'Halaman Produk AHM CU'
		];

		return view('categories/Ahm_Cu_Reg/v_data', $data);
	}
}
