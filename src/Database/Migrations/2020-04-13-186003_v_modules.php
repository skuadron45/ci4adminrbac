<?php

namespace Ci4adminrbac\Database\Migrations;

use CodeIgniter\Database\Migration;

class VModules extends Migration
{
	public function up()
	{
		$query = <<<EOD
		CREATE VIEW v_modules AS
		SELECT 
			getModuleIdPath(modules.id, ',') AS module_id_path,
			getModuleName(modules.id, ' > ') AS module_name_path,
			modules.*	
		FROM 
			tbl_modules modules
		WHERE 
			modules.is_active=1
			OR modules.need_privilege=0
		ORDER BY 
			modules.parent_module_id, 
			modules.module_order 
EOD;
		$this->db->query("DROP VIEW if EXISTS v_modules");
		$this->db->query($query);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->query("DROP VIEW if EXISTS v_modules");
	}
}
