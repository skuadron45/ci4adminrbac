<?php

namespace Ci4adminrbac\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblUsers extends Migration
{
	public function up()
	{
		$fields = [
			'id' => [
				'type' => 'BIGINT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'username' => [
				'type' => 'VARCHAR',
				'constraint' => 100,
			],
			'user_group_id' => [
				'type' => 'BIGINT',
				'null' => true,
				'default' => 1
			]
		];
		$this->forge->addField($fields);

		$this->forge->addField("password TEXT NOT NULL");
		$this->forge->addField("fullname VARCHAR(100) NULL DEFAULT NULL");
		$this->forge->addField("email VARCHAR(100) NULL DEFAULT NULL");
		$this->forge->addField("url VARCHAR(100) NULL DEFAULT NULL");
		$this->forge->addField("type TINYINT(4) NULL DEFAULT '1' COMMENT '-1 (super), 1 (admin)'");
		$this->forge->addField("biography TEXT NULL");
		$this->forge->addField("forgot_password_key VARCHAR(100) NULL DEFAULT NULL");
		$this->forge->addField("forgot_password_request_date TIMESTAMP NULL DEFAULT NULL");
		$this->forge->addField("last_logged_in TIMESTAMP NULL DEFAULT NULL");
		$this->forge->addField("last_logged_out TIMESTAMP NULL DEFAULT NULL");
		$this->forge->addField("ip_address VARCHAR(45) NULL DEFAULT NULL");
		$this->forge->addField("home_module_id BIGINT(20) UNSIGNED NULL DEFAULT '4'");
		$this->forge->addField("created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP");
		$this->forge->addField("updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
		$this->forge->addField("deleted_at TIMESTAMP NULL DEFAULT NULL");
		$this->forge->addField("restored_at TIMESTAMP NULL DEFAULT NULL");
		$this->forge->addField("created_by BIGINT(20) NULL DEFAULT '1'");
		$this->forge->addField("updated_by BIGINT(20) NULL DEFAULT '0'");
		$this->forge->addField("deleted_by BIGINT(20) NULL DEFAULT '0'");
		$this->forge->addField("restored_by BIGINT(20) NULL DEFAULT '0'");
		$this->forge->addField("is_deleted TINYINT(4) NULL DEFAULT '0'");
		$this->forge->addField("is_active TINYINT(4) NULL DEFAULT '1'");

		$this->forge->addPrimaryKey('id');
		$this->forge->addUniqueKey('username');
		$this->forge->addKey('user_group_id');

		$this->forge->createTable('tbl_users', true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tbl_users', true);
	}
}
