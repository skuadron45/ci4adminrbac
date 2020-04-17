<?php

namespace Ci4adminrbac\Config;

use Config\Filters as BaseConfig;

use CodeIgniter\Filters\CSRF;

use Ci4adminrbac\Filters\RedirectIfAuthenticated;
use Ci4adminrbac\Filters\RedirectIfNotAuthenticated;

class Filters extends BaseConfig
{
	public function __construct()
	{
		$this->aliases['redirectIfAuthenticated'] =  RedirectIfAuthenticated::class;
		$this->aliases['redirectIfNotAuthenticated'] =  RedirectIfNotAuthenticated::class;
	}
}
