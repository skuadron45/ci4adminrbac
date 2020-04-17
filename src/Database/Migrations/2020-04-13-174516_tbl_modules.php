<?php

namespace Ci4adminrbac\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblModules extends Migration
{
	public function up()
	{
		$fields = [
			'id' => [
				'type' => 'BIGINT',
				'unsigned' => true,
				'auto_increment' => true
			]
		];
		$this->forge->addField($fields);
		
		$this->forge->addField("module_name VARCHAR(255) NOT NULL");
		$this->forge->addField("module_description VARCHAR(255) NULL DEFAULT NULL");
		$this->forge->addField("module_url VARCHAR(255) NULL DEFAULT NULL");
		$this->forge->addField("module_type TINYINT(4) NULL DEFAULT '1' COMMENT '1 untuk module admin'");
		$this->forge->addField("parent_module_id BIGINT(20) NULL DEFAULT NULL");
		$this->forge->addField("module_order TINYINT(4) NULL DEFAULT NULL");
		$this->forge->addField("module_icon VARCHAR(200) NULL DEFAULT 'far fa-circle'");
		$this->forge->addField("need_privilege TINYINT(4) NULL DEFAULT '1'");
		$this->forge->addField("super_admin TINYINT(4) NOT NULL DEFAULT '1'");
		$this->forge->addField("is_active TINYINT(4) NULL DEFAULT '1'");
		$this->forge->addField("show_on_privilege TINYINT(4) NULL DEFAULT '1'");
		$this->forge->addField("need_view TINYINT(4) NULL DEFAULT '1'");
		$this->forge->addField("need_add TINYINT(4) NULL DEFAULT '1'");
		$this->forge->addField("need_delete TINYINT(4) NULL DEFAULT '1'");
		$this->forge->addField("need_edit TINYINT(4) NULL DEFAULT '1'");

		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('tbl_modules', true);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('tbl_modules', true);
	}
}
