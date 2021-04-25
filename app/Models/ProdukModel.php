<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{

	protected $table                = 'product';
	protected $primaryKey           = 'product_id';
	protected $useAutoIncrement     = true;
	protected $allowedFields        = ['product_name', 'part_number', 'part_name', 'jenis', 'category_id', 'customers_id'];

	public function getProduct($id = false)
	{
		if ($id === false) {
			$dataDb = $this->table('product')
				->join('category', 'category.id_category=product.category_id')
				->join('customers', 'customers.id_customers=product.customers_id');


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
	public function getProductRow($condition)
	{
		// $condition = "CU-44";
		$cu44 = $this->table('product')->where('product_name', $condition)->get()->getFirstRow();
		return $cu44;
	}

	public function getAllProduct()
	{
		$dataAll = $this->table('product')->countAll();
		return $dataAll;
	}

	public function dashboardData()
	{
		$getDataDashboard = $this->table('product')->select('product_name, part_number, part_name')->limit(6)->get()
			->getResultArray();
		return $getDataDashboard;
	}
}
