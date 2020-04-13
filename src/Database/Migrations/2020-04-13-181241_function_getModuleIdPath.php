<?php

namespace Ci4adminrbac\Database\Migrations;

use CodeIgniter\Database\Migration;

class FunctionGetModuleIdPath extends Migration
{
	public function up()
	{
		$query = <<<EOD
CREATE FUNCTION getModuleIdPath(module_id BIGINT, separator_path VARCHAR(50))
RETURNS text
BEGIN

SET @res='';
CALL getmoduleIdPath(module_id, @res, separator_path);
RETURN @res;

END;
EOD;

		$this->db->query("DROP FUNCTION IF EXISTS getModuleIdPath");
		$this->db->query($query);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->query("DROP FUNCTION IF EXISTS getModuleIdPath");
	}
}
