<?php

namespace Ci4adminrbac\Config;

use Config\Services as BaseService;

use Ci4adminrbac\Libraries\Auth;

use CodeIgniter\Encryption\Encryption;
use CodeIgniter\Validation\Validation;

class Services extends BaseService
{

	public static function auth($getShared = true)
	{
		if ($getShared) {
			return static::getSharedInstance('auth');
		}
		return new Auth();
	}

	public static function encrypter($config = null, $getShared = false)
	{
		if ($getShared === true) {
			return static::getSharedInstance('encrypter', $config);
		}

		if (empty($config)) {
			$config = new \Ci4adminrbac\Config\Encryption();
		}

		$encryption = new Encryption($config);
		return $encryption->initialize($config);
	}

	public static function validation(\Config\Validation $config = null, bool $getShared = true)
	{
		if ($getShared)
		{
			return static::getSharedInstance('validation', $config);
		}

		if (is_null($config))
		{
			$config = config('Ci4adminrbac\Config\Validation');
		}

		return new Validation($config, static::renderer());
	}
}
