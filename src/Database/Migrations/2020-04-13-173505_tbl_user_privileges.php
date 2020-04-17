<?php

namespace Ci4adminrbac\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblUserPrivileges extends Migration
{
	public function up()
	{
		$fields = [
			'id' => [
				'type' => 'BIGINT',
				'unsigned' => true,
				'auto_increment' => true
			],
			'user_group_id' => [
				'type' => 'BIGINT',
				'null' => true,
				'default' => 1
			],
			'module_id' => [
				'type' => 'BIGINT',
				'null' => true,
				'default' => 4
			]
		];
		$this->forge->addField($fields);

		$this->forge->addField("can_add TINYINT(4) NULL DEFAULT '1'");
		$this->forge->addField("can_edit TINYINT(4) NULL DEFAULT '1'");
		$this->forge->addField("can_delete TINYINT(4) NULL DEFAULT '1'");
		$this->forge->addField("created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP");
		$this->forge->addField("updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
		$this->forge->addField("deleted_at TIMESTAMP NULL DEFAULT NULL");
		$this->forge->addField("restored_at TIMESTAMP NULL DEFAULT NULL");
		$this->forge->addField("created_by BIGINT(20) UNSIGNED NULL DEFAULT '0'");
		$this->forge->addField("updated_by BIGINT(20) UNSIGNED NULL DEFAULT '0'");
		$this->forge->addField("deleted_by BIGINT(20) UNSIGNED NULL DEFAULT '0'");
		$this->forge->addField("restored_by BIGINT(20) UNSIGNED NULL DEFAULT '0'");
		$this->forge->addField("is_deleted TINYINT(4) NULL DEFAULT NULL");

		$this->forge->addPrimaryKey('id');
		$this->forge->addUniqueKey(['user_group_id', 'module_id']);
		$this->forge->createTable('tbl_user_privileges', true);
	}

	//--------------------------------------------------------------------
	public function down()
	{
		$this->forge->dropTable('tbl_user_privileges', true);
	}
}
