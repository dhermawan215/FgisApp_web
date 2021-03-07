<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Member extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Member - Fgis Apps',
			'subtitle' => 'Halaman Member'
		];
		return view('Apps/Member/v_member', $data);
	}
	public function create()
	{
		$data = [
			'title' => 'Tambah Member - Fgis Apps',
			'subtitle' => 'Halaman Tambah Member'
		];
		return view('Apps/Member/create', $data);
	}
}
