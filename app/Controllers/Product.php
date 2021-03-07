<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;



class Product extends BaseController
{
	public function __construct()
	{
		$this->ProdukModel = new ProdukModel();
		session();
	}
	public function index()
	{
		$data = [
			'title' => 'Product - Fgis Apps',
			'subtitle' => 'Halaman Produk',
			'getData' => $this->ProdukModel->findAll()
		];
		return view('Apps/Product/v_product', $data);
	}

	public function create()
	{
		$data = [
			'title' => 'Tambah Produk - Fgis Apps',
			'subtitle' => 'Halaman Tambah Produk',
			"validation" => \Config\Services::validation()
		];
		return view('Apps/Product/create', $data);
	}

	public function save()
	{
		if (!$this->validate([
			'produk_name' => [
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
		])) {
			return redirect()->to('/admin/product/create')->withInput();
		}


		$this->ProdukModel->save([
			'produk_name' => $this->request->getPost('produk_name'),
			'part_number' => $this->request->getPost('part_number'),
			'part_name' => $this->request->getPost('part_name'),
			'jenis' => $this->request->getPost('jenis'),

		]);
		session()->setFlashdata('berhasil', 'Data Berhasil di Simpan!');
		return redirect()->to(base_url('admin/product'));
	}

	public function edit($id)
	{
		$data = [
			'title' => 'Edit Produk - Fgis Apps',
			'subtitle' => 'Halaman Edit Produk'
		];
		return view('Apps/Product/edit', $data);
	}

	public function delete($id)
	{
		// return view();
	}
}
