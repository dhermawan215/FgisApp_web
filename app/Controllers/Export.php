<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Export extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Export - Fgis Apps',
			'subtitle' => 'Halaman Produk Export'
		];

		return view('categories/Exports/index', $data);
	}
}
