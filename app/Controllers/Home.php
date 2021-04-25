<?php

namespace App\Controllers;

use App\Models\CustomersModel;
use App\Models\ProdukModel;
use App\Models\UserModel;
use Config\Services;

class Home extends BaseController
{
	protected $session;


	public function __construct()
	{
		$this->session = Services::session();
		$this->CustomersModel = new CustomersModel();
		$this->ProdukModel = new ProdukModel();
		$this->UserModel = new UserModel();
	}
	public function index()
	{
		// dd($this->session->level);
		if ($this->session->loginSucces == null) {
			return redirect()->to(\base_url('login'));
		}
		// dd($this->ProdukModel->dashboardData());

		$data = [
			'title' => 'Dashboard - Fgis Apps',
			'customer' => $this->CustomersModel->findAll(),
			'produkTotal' => $this->ProdukModel->getAllProduct(),
			'produkDashboard' => $this->ProdukModel->dashboardData(),
			'user' => $this->UserModel->countAll(),
			'users' => $this->UserModel->dataDashboard()
		];
		return view('Apps/v_dashboard', $data);
	}
}
