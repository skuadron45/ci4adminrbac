<?php

namespace Ci4adminrbac\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProcedureGetModuleName extends Migration
{
	public function up()
	{
		$query = <<<EOD
		CREATE PROCEDURE getmoduleName(
			IN module_id INT,
			OUT path TEXT,
			IN separator_path TEXT
		)
		BEGIN

		DECLARE modName TEXT;
		DECLARE tempPath TEXT;
		DECLARE tempParent BIGINT;

		SET max_sp_recursion_depth=258;
		SELECT module_name, parent_module_id FROM tbl_modules WHERE id=module_id INTO modName, tempParent;

		if tempParent IS NULL
		then
			SET path=modName;
		ELSE
			CALL getModuleName(tempParent, tempPath, separator_path);
			SET path = CONCAT(tempPath,separator_path,modName);	
		END if;

		END;
EOD;
		$this->db->query("DROP PROCEDURE IF EXISTS getmoduleName");
		$this->db->query($query);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->db->query("DROP PROCEDURE IF EXISTS getmoduleName");
	}
}
