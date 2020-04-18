<?php

namespace Ci4adminrbac\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblUserGroups extends Migration
{
	public function up()
	{
		$this->forge->dropTable('tbl_user_groups', true);

		$fields = [
			'id' => [
				'type' => 'BIGINT',
				'unsigned' => true,
				'auto_increment' => true,
			],
			'group_name' => [
				'type' => 'VARCHAR',
				'constraint' => 255,
			]
		];
		$this->forge->addField($fields);

		$this->forge->addField("created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP");
		$this->forge->addField("updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");
		$this->forge->addField("deleted_at TIMESTAMP NULL DEFAULT NULL");
		$this->forge->addField("restored_at TIMESTAMP NULL DEFAULT NULL");
		$this->forge->addField("created_by BIGINT(20) UNSIGNED NULL DEFAULT '1'");
		$this->forge->addField("updated_by BIGINT(20) UNSIGNED NULL DEFAULT '1'");
		$this->forge->addField("deleted_by BIGINT(20) UNSIGNED NULL DEFAULT '1'");
		$this->forge->addField("restored_by BIGINT(20) UNSIGNED NULL DEFAULT '1'");
		$this->forge->addField("is_deleted TINYINT(4) NULL DEFAULT '0'");

		$this->forge->addPrimaryKey('id');
		$this->forge->addUniqueKey('group_name');

		$this->forge->createTable('tbl_user_groups', true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tbl_user_groups', true);
	}
}
