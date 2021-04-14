<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customers extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_customers'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'customers_name' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
		]);
		$this->forge->addKey('id_customers', true);
		$this->forge->createTable('customers');
	}

	public function down()
	{
		$this->forge->dropTable('customers');
	}
}
