<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table                = 'users';
	protected $primaryKey           = 'id_users';
	protected $useAutoIncrement     = true;
	// protected $returnType           = 'array';
	// protected $useSoftDelete        = false;
	// // protected $protectFields        = true;
	protected $allowedFields        = ['name', 'email', 'password', 'level'];

	public function get_data_login($email)
	{

		$loginData = $this->table('users')
			->where('email', $email)
			->get()->getRowArray();

		return $loginData;
	}

	public function dataDashboard()
	{
		$dashboardData = $this->table('users')->select('name')->where('level', 'user')->limit(6)->get()->getResultArray();
		return $dashboardData;
	}
}
