<?php

namespace Ci4adminrbac\Config;

use Config\Services as BaseServices;

use Ci4adminrbac\Libraries\Auth;

class Services extends BaseServices
{

	public static function auth($getShared = true)
	{
		if ($getShared) {
			return static::getSharedInstance('auth');
		}
		return new Auth();
	}
}
