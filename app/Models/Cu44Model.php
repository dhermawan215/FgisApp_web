<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Result;
use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\Integer;

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
