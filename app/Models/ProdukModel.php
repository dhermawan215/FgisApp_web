<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{

	protected $table                = 'product';
	protected $primaryKey           = 'product_id';
	protected $useAutoIncrement     = true;
	protected $allowedFields        = ['product_name', 'part_number', 'part_name', 'jenis', 'category_id', 'customers_id'];

	public function getProduct($id = false) //edit and view data product
	{
		if ($id === false) {
			$dataDb = $this->table('product')
				->join('category', 'category.id_category=product.category_id')
				->join('customers', 'customers.id_customers=product.customers_id')
				->orderBy('product_id', 'ASC');
			return $dataDb;
		} else {
			return $this->table('product')
				->join('category', 'category.id_category=product.category_id')
				->join('customers', 'customers.id_customers=product.customers_id')
				->where('product.product_id', $id)
				->get()
				->getRowArray();
		}
	}
	public function getProductRow($condition) // seacrh product and part number
	{
		$cu44 = $this->table('product')->where('product_name', $condition)->get()->getFirstRow();
		return $cu44;
	}

	public function getAllProduct() //hitung jumlah produk
	{
		$dataAll = $this->table('product')->countAll();
		return $dataAll;
	}

	public function dashboardData() // data dashboard
	{
		$getDataDashboard = $this->table('product')->select('product_name, part_number, part_name')->limit(6)->get()
			->getResultArray();
		return $getDataDashboard;
	}

	public function getKmiIgniter() //kawasaki igniter reguler
	{
		$array = ['jenis' => 'IDF', 'category.category_name' => 'IGNITER', 'customers.customers_name' => 'PT KMI'];
		$dataDb = $this->table('product')
			->select('product_id,product_name, jenis, category.category_name')
			->join('category', 'category.id_category=product.category_id')
			->join('customers', 'customers.id_customers=product.customers_id')
			->where($array)
			->get()->getResultArray();
		return $dataDb;
	}

	public function getKmiIgniterSpo() //kawasaki igniter spo
	{
		$array = ['jenis' => 'SPO', 'category.category_name' => 'IGNITER', 'customers.customers_name' => 'PT KMI'];
		$dataDb = $this->table('product')
			->select('product_id,product_name, jenis, category.category_name')
			->join('category', 'category.id_category=product.category_id')
			->join('customers', 'customers.id_customers=product.customers_id')
			->where($array)
			->get()->getResultArray();
		return $dataDb;
	}

	public function getKmiRegulator() //kawasaki regulator reguler
	{
		$array = ['jenis' => 'IDF', 'category.category_name' => 'REGULATOR', 'customers.customers_name' => 'PT KMI'];
		$dataDb = $this->table('product')
			->select('product_id,product_name, jenis, category.category_name')
			->join('category', 'category.id_category=product.category_id')
			->join('customers', 'customers.id_customers=product.customers_id')
			->where($array)
			->get()->getResultArray();
		return $dataDb;
	}

	public function getKmiRegSpo() //kawasaki regulator spo
	{
		$array = ['jenis' => 'SPO', 'category.category_name' => 'REGULATOR', 'customers.customers_name' => 'PT KMI'];
		$dataDb = $this->table('product')
			->select('product_id,product_name, jenis, category.category_name')
			->join('category', 'category.id_category=product.category_id')
			->join('customers', 'customers.id_customers=product.customers_id')
			->where($array)
			->get()->getResultArray();
		return $dataDb;
	}

	public function getExport() //export part
	{
		$array = ['jenis' => 'EXPORT', 'customers.customers_name' => 'EXPORT'];
		$dataDb = $this->table('product')
			->select('product_id,product_name, jenis, category.category_name')
			->join('category', 'category.id_category=product.category_id')
			->join('customers', 'customers.id_customers=product.customers_id')
			->where($array)
			->get()->getResultArray();
		return $dataDb;
	}
}
