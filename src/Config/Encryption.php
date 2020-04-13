<?php

namespace Ci4adminrbac\Config;

use Config\Encryption as BaseConfig;

/**
 * Encryption configuration.
 *
 * These are the settings used for encryption, if you don't pass a parameter
 * array to the encrypter for creation/initialization.
 */
$key = hex2bin('e3464c731115cf50ab1b29de0ff4c3ce');
defined("ENCRYPTKEY") or define("ENCRYPTKEY", $key);
class Encryption extends BaseConfig
{
	public function __construct()
	{
		$this->key = ENCRYPTKEY;
	}
}
