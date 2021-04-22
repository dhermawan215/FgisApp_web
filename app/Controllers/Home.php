<?php

namespace App\Controllers;

use Config\Services;

class Home extends BaseController
{
	protected $session;


	public function __construct()
	{
		$this->session = Services::session();
	}
	public function index()
	{

		if ($this->session->loginSucces == null) {
			return redirect()->to(\base_url('login'));
		}

		$data = [
			'title' => 'Dashboard - Fgis Apps'
		];
		return view('Apps/v_dashboard', $data);
	}
}
