<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{

	protected $table                = 'produk';
	protected $primaryKey           = 'id_produk';
	protected $useAutoIncrement     = true;
	protected $allowedFields        = ['produk_name', 'part_number', 'part_name', 'jenis'];
}
