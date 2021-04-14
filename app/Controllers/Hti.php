<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Hti extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'HTI - Fgis Apps',
			'subtitle' => 'Halaman Produk HTI'
		];

		return view('categories/Hti/index', $data);
	}
}
