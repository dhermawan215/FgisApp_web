<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomersModel extends Model
{

	protected $table                = 'customers';
	protected $primaryKey           = 'id_customers';
	protected $useAutoIncrement     = true;
	protected $allowedFields        = ['customers_name'];
}
