<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cu44 extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_44'          => [
				'type'           => 'INT',
				'constraint'     => 15,
				'unsigned'       => true,
				'auto_increment' => true,
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
		$this->forge->addKey('id_44', true);
		$this->forge->createTable('cu44');
	}

	public function down()
	{
		$this->forge->dropTable('cu44');
	}
}
