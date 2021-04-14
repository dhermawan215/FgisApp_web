<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;
use App\Models\CategoryModel;
use App\Models\CustomersModel;

class Product extends BaseController
{
	public function __construct()
	{
		$this->ProdukModel = new ProdukModel();
		$this->CategoryModel = new CategoryModel();
		$this->CustomersModel = new CustomersModel();
		session();
	}
	public function index()
	{
		// $dataJoin = $this->ProdukModel->getProduct();
		// // $dataOk = $dataJoin->paginate(3'product');
		// dd($dataJoin);
		$currentPage = $this->request->getVar('page_product') ? $this->request->getVar('page_product') : 1;
		$data = [
			'title' => 'Product - Fgis Apps',
			'subtitle' => 'Halaman Produk',
			'getData' =>  $this->ProdukModel->getProduct()->paginate(20, 'product'),
			'pager' => $this->ProdukModel->getProduct()->pager,
			'page' => $currentPage
		];
		return view('Apps/Product/v_product', $data);
	}

	public function create()
	{
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
		return redirect()->to(base_url('admin/product'));
	}

	public function edit($id)
	{

		$data = [
			'title' => 'Edit Produk - Fgis Apps',
			'subtitle' => 'Halaman Edit Produk',
			"validation" => \Config\Services::validation(),
			'editProduct' => $this->ProdukModel->getProduct($id),
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
		return redirect()->to(base_url('admin/product'));
	}

	public function delete($id)
	{
		$this->ProdukModel->delete($id);
		session()->setFlashdata('berhasil', 'Data Berhasil di Hapus!');
		return redirect()->to(base_url('admin/product'));
	}
}
