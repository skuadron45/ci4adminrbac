<?php

namespace Ci4adminrbac\Config;

use CodeIgniter\Config\BaseService;

use Ci4adminrbac\Libraries\Auth;

class Services extends BaseService
{

	public static function auth($getShared = true)
	{
		if ($getShared) {
			return static::getSharedInstance('auth');
		}
		return new Auth();
	}
}
