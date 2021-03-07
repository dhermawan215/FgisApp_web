<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Dashboard - Fgis Apps'
		];
		return view('Apps/v_dashboard', $data);
	}
}
