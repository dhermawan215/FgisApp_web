<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Adptw extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'ADP & TW - Fgis Apps',
			'subtitle' => 'Halaman Produk ADP - TW'
		];

		return view('categories/Adp_Tw/index', $data);
	}
}
