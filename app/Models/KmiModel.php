<?php

namespace App\Models;

use CodeIgniter\Model;


class KmiModel extends Model
{
	protected $table                = 'kmi_stock';
	protected $primaryKey           = 'id_stock';
	protected $useAutoIncrement     = true;
	protected $allowedFields        = ['product_id, date_transaction, quantity, input, remark, fill_by, checked_by'];


	public function AllData($p_name, $limit = \false) // view all data by product and limit
	{
		$condition = ['product_name' => $p_name];
		if ($limit == false) {

			$dataDb1 = $this->table('kmi_stock')
				->select('id_stock, date_transaction, quantity, input, remark, fill_by, checked_by, product.product_name, product.jenis, category.category_name')
				->join('product', 'product.product_id=kmi_stock.product_id')
				->join('category', 'category.id_category=product.category_id')
				->where($condition)
				->orderBy('date_transaction', 'DESC')
				->limit(20)
				->get()->getResultArray();

			return $dataDb1;
		} else {
			$dataDb = $this->table('kmi_stock')
				->select('id_stock,date_transaction, quantity, input, remark, fill_by, checked_by, product.product_name, product.jenis, category.category_name')
				->join('product', 'product.product_id=kmi_stock.product_id')
				->join('category', 'category.id_category=product.category_id')
				->where($condition)
				->orderBy('date_transaction', 'DESC')
				->limit($limit)
				->get()->getResultArray();

			return $dataDb;
		}
	}

	public function AllDatabyDate($p_name, $f_date, $e_date) //search data by date
	{
		// $condition = "date_transaction BETWEEN" . "'" . $f_date . "'" . " AND " . "'" . $e_date . "'";
		$dataDb = $this->table('kmi_stock')
			->select('id_stock,date_transaction, quantity, input, remark, fill_by, checked_by, product.product_name, product.jenis, category.category_name')
			->join('product', 'product.product_id=kmi_stock.product_id')
			->join('category', 'category.id_category=product.category_id')
			->where("date_transaction BETWEEN '$f_date' AND '$e_date' AND product_name = '$p_name'")
			->get()->getResultArray();

		return $dataDb;
	}

	public function StockIn($p_name) // sum stock in data
	{
		$array = ['product_name' => $p_name, 'input' => 'in'];
		$inData = $this->table('kmi_stock')->selectSum('quantity')
			->join('product', 'product.product_id=kmi_stock.product_id')
			->where($array)->get()->getRowArray();
		return $inData;
	}

	public function StockOut($p_name) // sum stock out data
	{
		$array = ['product_name' => $p_name, 'input' => 'out'];
		$outData = $this->table('kmi_stock')->selectSum('quantity')
			->join('product', 'product.product_id=kmi_stock.product_id')
			->where($array)->get()->getRowArray();
		return $outData;
	}

	public function StockInMY($p_name, $dateBulan, $dateTahun) // sum stock in where month and year condition
	{
		$array1 = ['product_name' => $p_name, 'input' => 'IN', 'MONTH(date_transaction)' => $dateBulan, 'YEAR(date_transaction)' => $dateTahun];
		$outData = $this->table('kmi_stock')->selectSum('quantity')
			->select('date_transaction, product_name')
			->join('product', 'product.product_id=kmi_stock.product_id')
			->where($array1)->get()->getRowArray();
		return $outData;
	}

	public function StockOutMY($p_name, $dateBulan, $dateTahun) // sum stock out where month and year condition
	{
		$array1 = ['product_name' => $p_name, 'input' => 'OUT', 'MONTH(date_transaction)' => $dateBulan, 'YEAR(date_transaction)' => $dateTahun];
		$outData = $this->table('kmi_stock')->selectSum('quantity')
			->select('date_transaction, product_name')
			->join('product', 'product.product_id=kmi_stock.product_id')
			->where($array1)->get()->getRowArray();
		return $outData;
	}

	public function StockMonth($p_name, $dateBulan, $dateTahun) // sum stock where month and year condition
	{
		$array1 = ['product_name' => $p_name, 'MONTH(date_transaction)' => $dateBulan, 'YEAR(date_transaction)' => $dateTahun];
		$outData = $this->table('kmi_stock')
			->select('date_transaction, product_name, remark, quantity')
			->join('product', 'product.product_id=kmi_stock.product_id')
			->where($array1)->get()->getResultArray();
		return $outData;
	}


	public function getDataId($id = false, $p_name) // edit function
	{
		$condition = ['product_name' => $p_name];
		if ($id == false) {
			$dataDb1 = $this->table('kmi_stock')

				->join('product', 'product.product_id=kmi_stock.product_id')
				->join('category', 'category.id_category=product.category_id')
				->where($condition)
				->orderBy('date_transaction', 'DESC')
				->limit(20)
				->get()->getResultArray();

			return $dataDb1;
		} else {
			$db1 = $this->table('kmi_stock')

				->join('product', 'product.product_id=kmi_stock.product_id')
				->where('kmi_stock.id_stock', $id)
				->get()->getRowArray();

			return $db1;
		}
	}
}
