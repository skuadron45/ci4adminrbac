<?php

namespace Ci4adminrbac\Database\Migrations;

use CodeIgniter\Database\Migration;

class VAdministrators extends Migration
{
	public function up()
	{
		$query = <<<EOD
		CREATE VIEW v_administrators AS
		SELECT 
			users.*
		FROM 
			tbl_users users
		WHERE 
			users.type=1
			AND users.is_active=1
			AND users.is_deleted=0 
EOD;
		$this->db->query("DROP VIEW if EXISTS v_administrators");
		$this->db->query($query);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->query("DROP VIEW if EXISTS v_administrators");
	}
}
