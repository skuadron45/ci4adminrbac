<?php

namespace Ci4adminrbac\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProcedureGetModuleIdPath extends Migration
{
	public function up()
	{
		$query = <<<EOD
		CREATE PROCEDURE getmoduleIdPath(
			IN module_id BIGINT,
			OUT path TEXT,
			IN separator_path VARCHAR(50)
		)

		BEGIN

		DECLARE modId BIGINT;
		DECLARE tempPath TEXT;
		DECLARE tempParent BIGINT;

		SET max_sp_recursion_depth=258;
		SELECT id, parent_module_id FROM tbl_modules WHERE id=module_id INTO modId, tempParent;

		if tempParent IS NULL
		then
			SET path=modId;
		ELSE
			CALL getModuleIdPath(tempParent, tempPath, separator_path);
			SET path = CONCAT(tempPath,separator_path,modId);	
		END if;

		END;
EOD;
		$this->db->query("DROP PROCEDURE IF EXISTS getmoduleIdPath");
		$this->db->query($query);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->query("DROP PROCEDURE IF EXISTS getmoduleIdPath");
	}
}
