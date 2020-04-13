<?php

namespace Ci4adminrbac\Config;

use Config\Validation as BaseValidation;

class Validation extends BaseValidation
{
	public function __construct()
	{
		$this->templates['alert'] =  'Ci4adminrbac\Views\alert\list';
	}
}
