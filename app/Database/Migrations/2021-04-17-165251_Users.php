<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_users'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name' => [
				'type' => 'VARCHAR',
				'constraint' => '30',
			],
			'email' => [
				'type' => 'VARCHAR',
				'constraint' => '40',
			],
			'password' => [
				'type' => 'VARCHAR',
				'constraint' => '100',
			],
		]);
		$this->forge->addKey('id_users', true);
		$this->forge->createTable('users');
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
