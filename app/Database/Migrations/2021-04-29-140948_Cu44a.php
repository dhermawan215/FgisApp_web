<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Cu44a extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_44a'          => [
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
				'constraint' => '10',
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
		$this->forge->addKey('id_44a', true);
		$this->forge->createTable('cu44a');
	}

	public function down()
	{
		$this->forge->dropTable('cu44a');
	}
}
