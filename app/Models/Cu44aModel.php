<?php

namespace App\Models;

use CodeIgniter\Model;

class Cu44aModel extends Model
{
	protected $table                = 'cu44a';
	protected $primaryKey           = 'id_44a';
	protected $useAutoIncrement     = true;
	protected $protectFields        = true;

	protected $allowedFields        = ['date_transaction', 'quantity', 'input', 'remark', 'fill_by', 'checked_by'];

	public function getInData()
	{
		$in = "IN";
		$data = $this->table('cu44a')->selectSum('quantity')->where('input', $in)->get()->getRowArray();
		return $data;
	}
	public function getOutData()
	{
		$out = "OUT";
		return $this->table('cu44a')->selectSum('quantity')->where('input', $out)->get()->getRowArray();
	}
	public function allDataDesc($limit = false)
	{
		if ($limit === false) {
			$allData = $this->table('cu44a')->orderBy("date_transaction", "DESC")->limit(20)->get()->getResultArray();
			return $allData;
		} else {
			$allData = $this->table('cu44a')->orderBy("date_transaction", "DESC")->limit($limit)->get()->getResultArray();
			return $allData;
		}
	}

	public function getDatabyDateFilter($firstDate, $endDate)
	{
		$dataDate = $this->table('cu44a')->where("date_transaction BETWEEN" . "'" . $firstDate . "'" . " AND " . "'" . $endDate . "'")->get()->getResultArray();
		return $dataDate;
	}

	public function getDataId($id = false)
	{
		if ($id === false) {
			$dataid = $this->Cu44aModel->allDataDesc();
			return $dataid;
		} else {
			$db = $this->table('cu44a')
				->where('cu44a.id_44a', $id)
				->get()->getRowArray();
			return $db;
		}
	}

	public function Stok44AIn($dateBulan, $dateTahun)
	{
		$In = "IN";
		$array = ['input' => $In, 'MONTH(date_transaction)' => $dateBulan, 'YEAR(date_transaction)' => $dateTahun];
		$dataTb = $this->table('cu44a')
			->selectSum('quantity')
			->select('date_transaction')
			->where($array)
			->get()
			->getResult();
		return $dataTb;
	}

	public function Stok44AOut($dateBulan, $dateTahun)
	{
		$Out = "OUT";
		$array2 = ['input' => $Out, 'MONTH(date_transaction)' => $dateBulan, 'YEAR(date_transaction)' => $dateTahun];
		$dataTb2 = $this->table('cu44a')
			->selectSum('quantity')
			->select('date_transaction')
			->where($array2)
			->get()
			->getResult();
		return $dataTb2;
	}

	public function Stok44ABulan($dateBulan, $dateTahun)
	{
		$array3 = ['MONTH(date_transaction)' => $dateBulan, 'YEAR(date_transaction)' => $dateTahun];
		$dataTb3 = $this->table('cu44a')
			->select('date_transaction, quantity, remark')
			->where($array3)
			->orderBy('date_transaction', 'DESC')
			->get()
			->getResult();
		return $dataTb3;
	}
}
