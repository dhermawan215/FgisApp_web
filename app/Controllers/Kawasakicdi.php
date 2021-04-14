<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Kawasakicdi extends BaseController
{
	public function index()
	{

		$data = [
			'title' => 'CDI KMI - Fgis Apps',
			'subtitle' => 'Halaman Produk CDI Kawasaki'
		];

		return view('categories/Kawasaki/index', $data);
	}
}
