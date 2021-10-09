<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Result;
use CodeIgniter\Model;


class Cu44Model extends Model
{

	protected $table                = 'cu44';
	protected $primaryKey           = 'id_44';
	protected $useAutoIncrement     = true;
	protected $allowedFields        = ['date_transaction', 'quantity', 'input', 'remark', 'fill_by', 'checked_by'];

	public function getInData()
	{
		$in = "IN";
		$data = $this->table('cu44')->selectSum('quantity')->where('input', $in)->get()->getRowArray();
		return $data;
	}
	public function getOutData()
	{
		$out = "OUT";
		return $this->table('cu44')->selectSum('quantity')->where('input', $out)->get()->getRowArray();
	}
	public function allDataDesc($limit = false)
	{
		if ($limit === false) {
			$allData = $this->table('cu44')->orderBy("date_transaction", "DESC")->limit(20)->get()->getResultArray();
			return $allData;
		} else {
			$allData = $this->table('cu44')->orderBy("date_transaction", "DESC")->limit($limit)->get()->getResultArray();
			return $allData;
		}
	}

	public function getDatabyDateFilter($firstDate, $endDate)
	{
		$dataDate = $this->table('cu44')->where("date_transaction BETWEEN" . "'" . $firstDate . "'" . " AND " . "'" . $endDate . "'")->get()->getResultArray();
		return $dataDate;
	}
	public function StokMAsukIn($dateMounth, $dateYear)
	{
		$db      = \Config\Database::connect();
		$query = $db->query("SELECT date_transaction, SUM(quantity)
		FROM cu44 WHERE input='IN' AND MONTH(date_transaction) ='$dateMounth' AND YEAR(date_transaction)='$dateYear' ");
		$dataIb = $query->getRowArray();

		return $dataIb;
	}
	public function StokMAsukOut($dateMounth, $dateYear)
	{
		$db      = \Config\Database::connect();
		$query = $db->query("SELECT date_transaction, SUM(quantity)
		FROM cu44 WHERE input='OUT' AND MONTH(date_transaction) ='$dateMounth' AND YEAR(date_transaction)='$dateYear' ");
		$dataIb = $query->getRowArray();

		return $dataIb;
	}

	public function stockBulan($dateMounth, $dateYear)
	{

		// $db      = \Config\Database::connect();
		// $query = $db->query("SELECT date_transaction, quantity, remark
		// FROM cu44 WHERE MONTH(date_transaction) ='$dateMounth' AND YEAR(date_transaction)='$dateYear' ORDER BY 'ASC' ");
		// $dataIb2 = $query->getResultArray();

		$array = ['MONTH(date_transaction)' => $dateMounth, 'YEAR(date_transaction)' => $dateYear];
		$dB1 = $this->table('cu44')->select('date_transaction, quantity, remark')->where($array)
			->orderBy("date_transaction", "ASC")
			->get()->getResultArray();


		return $dB1;
	}

	public function getDataId($id = false)
	{
		if ($id === false) {
			$dataid = $this->Cu44Model->allDataDesc();
			return $dataid;
		} else {
			$db = $this->table('cu44')
				->where('cu44.id_44', $id)
				->get()->getRowArray();
			return $db;
		}
	}
}
