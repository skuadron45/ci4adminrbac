<?php

namespace Ci4adminrbac\Database\Migrations;

use CodeIgniter\Database\Migration;

class VUserGroups extends Migration
{
	public function up()
	{

		$query = <<<EOD
		CREATE VIEW v_user_groups AS
		SELECT 
			* 
		FROM 
			tbl_user_groups 
		WHERE 
			is_deleted=0  
EOD;
		$this->db->query("DROP VIEW if EXISTS v_user_groups");
		$this->db->query($query);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->query("DROP VIEW if EXISTS v_user_groups");
	}
}
