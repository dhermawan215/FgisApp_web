<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\CategoryModel;
use App\Models\CustomersModel;
use Config\Services;

class Product extends BaseController
{
	public function __construct()
	{
		$this->ProdukModel = new ProdukModel();
		$this->CategoryModel = new CategoryModel();
		$this->CustomersModel = new CustomersModel();
		$this->config    = new \Config\Encryption();      // load the configuration for the encryption service
		$this->encrypter = \Config\Services::encrypter($this->config); // start the encryption service
		session();
		$this->session = Services::session();
	}
	public function index()
	{
		// $dataJoin = $this->ProdukModel->getProduct();
		// // $dataOk = $dataJoin->paginate(3'product');
		// dd($dataJoin);
		if ($this->session->loginSucces == null) {
			return redirect()->to(\base_url('login'));
		}
		if ($this->session->level != "admin") {
			return redirect()->to(\base_url());
		}


		$currentPage = $this->request->getVar('page_product') ? $this->request->getVar('page_product') : 1;
		$data = [
			'title' => 'Product - Fgis Apps',
			'subtitle' => 'Halaman Produk',
			'getData' =>  $this->ProdukModel->getProduct()->paginate(20, 'product'),
			'pager' => $this->ProdukModel->getProduct()->pager,
			'page' => $currentPage,
			'encrypter' => \Config\Services::encrypter($this->config)
		];
		return view('Apps/Product/v_product', $data);
	}

	public function create()
	{
		if ($this->session->loginSucces == null) {
			return redirect()->to(\base_url('login'));
		}
		if ($this->session->level != "admin") {
			return redirect()->to(\base_url());
		}
		$data = [
			'title' => 'Tambah Produk - Fgis Apps',
			'subtitle' => 'Halaman Tambah Produk',
			"validation" => \Config\Services::validation(),
			"Kategori" => $this->CategoryModel->findAll(),
			"Customers" => $this->CustomersModel->findAll()
		];
		return view('Apps/Product/create', $data);
	}

	public function save()
	{
		// dd($this->request->getPost());
		if (!$this->validate([
			'product_name' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'part_number' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'part_name' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'jenis' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'category' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'customers' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			]
		])) {
			return redirect()->to('/admin/product/create')->withInput();
		}

		$this->ProdukModel->save([
			'product_name' => strtoupper($this->request->getPost('product_name')),
			'part_number' => strtoupper($this->request->getPost('part_number')),
			'part_name' => strtoupper($this->request->getPost('part_name')),
			'jenis' => $this->request->getPost('jenis'),
			'category_id' => $this->request->getPost('category'),
			'customers_id' => $this->request->getPost('customers')
		]);
		session()->setFlashdata('berhasil', 'Data Berhasil di Simpan!');
		return redirect()->to(route_to('product'));
	}

	public function edit($id)
	{
		if ($this->session->loginSucces == null) {
			return redirect()->to(\base_url('login'));
		}
		if ($this->session->level != "admin") {
			return redirect()->to(\base_url());
		}

		$encrypter = \Config\Services::encrypter($this->config);
		$decrypted_data = $encrypter->decrypt(hex2bin($id));

		$data = [
			'title' => 'Edit Produk - Fgis Apps',
			'subtitle' => 'Halaman Edit Produk',
			"validation" => \Config\Services::validation(),
			'editProduct' => $this->ProdukModel->getProduct($decrypted_data),
			"Kategori" => $this->CategoryModel->findAll(),
			"Customers" => $this->CustomersModel->findAll()
		];
		return view('Apps/Product/edit', $data);
	}

	public function update($id)
	{
		if (!$this->validate([
			'product_name' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'part_number' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'part_name' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'category' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			],
			'customers' => [
				'rules' => 'required',
				'errors' => ['required' => '{field} harus di isi !']
			]
		])) {
			return redirect()->to('/admin/product/edit/' . $id)->withInput();
		}

		$this->ProdukModel->save([
			'product_id' => $id,
			'product_name' => strtoupper($this->request->getPost('product_name')),
			'part_number' => strtoupper($this->request->getPost('part_number')),
			'part_name' => strtoupper($this->request->getPost('part_name')),
			'jenis' => $this->request->getPost('jenis'),
			'category_id' => $this->request->getPost('category'),
			'customers_id' => $this->request->getPost('customers')
		]);
		session()->setFlashdata('berhasil', 'Data Berhasil di Perbaharui!');
		return redirect()->to(route_to('product'));
	}

	public function delete($id)
	{
		$this->ProdukModel->delete($id);
		session()->setFlashdata('berhasil', 'Data Berhasil di Hapus!');
		return redirect()->to(route_to('product'));
	}
}
