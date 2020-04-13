<?php

namespace Ci4adminrbac\Database\Migrations;

use CodeIgniter\Database\Migration;

class VUsers extends Migration
{
	public function up()
	{

		$query = <<<EOD
		CREATE VIEW v_users AS
		SELECT 
			users.*, 
			modules.module_url AS home_module_url
		FROM 
			tbl_users users 
		LEFT JOIN 
			tbl_modules modules
		ON 
			users.home_module_id=modules.id
		WHERE TYPE=-1
		UNION
		SELECT 
			users.*, 
			modules.module_url AS home_module_url 
		FROM 
			tbl_users users 
		LEFT JOIN 
			tbl_modules modules
		ON 
			users.home_module_id=modules.id
		WHERE 
			users.is_deleted=0 
		AND users.is_active=1;
EOD;
		$this->db->query("DROP VIEW if EXISTS v_users");
		$this->db->query($query);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->query("DROP VIEW if EXISTS v_users");
	}
}
