<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ionauth extends Migration
{
    public function up()
	{
		// Drop table 'groups' if it exists
		$this->forge->dropTable('groups', true);

		// Table structure for table 'groups'
		$this->forge->addField([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'name' => [
				'type'       => 'VARCHAR',
				'constraint' => '20',
			],
			'description' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
			],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('groups');

		// Drop table 'users' if it exists
		$this->forge->dropTable('users', true);

		// Table structure for table 'users'
		$this->forge->addField([
			'id' => ['type' => 'int', 'constraint' => 6, 'unsigned' => true, 'auto_increment' => true],
			'ip_address' => ['type' => 'varchar', 'constraint' => 45, 'null' => false],
			'username' => ['type' => 'varchar', 'constraint' => 100, 'null' => true],
			'password' => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
			'email' => ['type' => 'varchar', 'constraint' => 254, 'null' => false],
			'activation_selector' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'activation_code' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'forgotten_password_selector' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'forgotten_password_code' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'forgotten_password_time' => ['type' => 'int', 'constraint' => 11, 'null' => true],
			'remember_selector' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'remember_code' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
			'created_on' => ['type' => 'int', 'constraint' => 11, 'null' => false],
			'last_login' => ['type' => 'int', 'constraint' => 11, 'null' => true],
			'active' => ['type' => 'tinyint', 'constraint' => 1, 'null' => true],
			'nama_user' => ['type' => 'varchar', 'constraint' => 50, 'null' => true],
			'img' => ['type' => 'varchar', 'constraint' => 50, 'null' => true],
			'phone' => ['type' => 'varchar', 'constraint' => 20, 'null' => true],
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('users', true);

		// Drop table 'users_groups' if it exists
		$this->forge->dropTable('users_groups', true);

		// Table structure for table 'users_groups'
		$this->forge->addField([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'user_id' => [
				'type'       => 'INT',
				'constraint' => '6',
				'unsigned'   => true,
			],
			'group_id' => [
				'type'       => 'MEDIUMINT',
				'constraint' => '8',
				'unsigned'   => true,
			],
		]);
		$this->forge->addKey('id', true);

		$this->forge->addForeignKey('user_id', 'users', 'id', 'NO ACTION', 'CASCADE');
		$this->forge->addForeignKey('group_id', 'groups', 'id', 'NO ACTION', 'CASCADE');

		$this->forge->createTable('users_groups');

		// Drop table 'login_attempts' if it exists
		$this->forge->dropTable('login_attempts', true);

		// Table structure for table 'login_attempts'
		$this->forge->addField([
			'id' => [
				'type'           => 'MEDIUMINT',
				'constraint'     => '8',
				'unsigned'       => true,
				'auto_increment' => true,
			],
			'ip_address' => [
				'type'       => 'VARCHAR',
				'constraint' => '45',
			],
			'login' => [
				'type'       => 'VARCHAR',
				'constraint' => '100',
				'null'       => true,
			],
			'time' => [
				'type'       => 'INT',
				'constraint' => '11',
				'unsigned'   => true,
				'null'       => true,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('login_attempts');
	}

	/**
	 * Down
	 *
	 * @return void
	 */
	public function down()
	{
		$this->forge->dropTable('users', true);
		$this->forge->dropTable('groups', true);
		$this->forge->dropTable('users_groups', true);
		$this->forge->dropTable('login_attempts', true);
	}
}
