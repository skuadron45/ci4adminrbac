<?php

namespace Ci4adminrbac\Database\Migrations;

use CodeIgniter\Database\Migration;

class FunctionGetModuleName extends Migration
{
	public function up()
	{
		$query = <<<EOD
		CREATE FUNCTION getModuleName(module_id INT, separatorpath VARCHAR(50))
		RETURNS text DETERMINISTIC
		BEGIN

		SET @res='';
		CALL getmoduleName(module_id, @res, separatorpath);
		RETURN @res;
		END;
EOD;
		$this->db->query("DROP FUNCTION IF EXISTS getModuleName");
		$this->db->query($query);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->query("DROP FUNCTION IF EXISTS getModuleName");
	}
}
