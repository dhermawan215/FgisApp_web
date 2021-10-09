<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class KawasakiProduk extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_stock'          => [
				'type'           => 'INT',
				'constraint'     => 15,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'product_id'       => [
				'type'       => 'INT',
				'constraint' => '11'

			],
			'date_transaction'       => [
				'type'       => 'DATE'
			],
			'quantity' => [
				'type' => 'INT',
				'constraint' => '8',
			],
			'input' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'remark' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'fill_by' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
			'checked_by' => [
				'type' => 'VARCHAR',
				'constraint' => '50',
			],
		]);
		$this->forge->addKey('id_stock', true);
		$this->forge->createTable('kmi_stock');
	}

	public function down()
	{
		//
	}
}
