<?php

namespace Ci4adminrbac\Database\Migrations;

use CodeIgniter\Database\Migration;

class VUserPrivileges extends Migration
{
	public function up()
	{
		$query = <<<EOD
		CREATE VIEW v_user_privileges AS
		SELECT 
			getModuleIdPath(priv.module_id, ',') AS module_id_path,
			modules.module_name,
			modules.module_url,
			priv.* 
		FROM 
			tbl_user_privileges priv
		LEFT JOIN 
			tbl_modules modules
		ON
			priv.module_id=modules.id
		WHERE	
			modules.is_active=1
			OR modules.need_privilege=0
		ORDER BY 
			modules.parent_module_id, 
			modules.module_order
EOD;

		$this->db->query("DROP VIEW if EXISTS v_user_privileges");
		$this->db->query($query);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->query("DROP VIEW if EXISTS v_user_privileges");
	}
}
