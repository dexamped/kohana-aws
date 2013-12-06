<?php defined('SYSPATH') or die('No direct script access.');

// Auto-loader for Amazon
class Amazon_Autoload {

	public static function autoload($class)
	{
		return Kohana::auto_load($class, 'vendor/aws-sdk-php/src/Aws');
	}
}

// Register the autoloader
spl_autoload_register(array('Amazon_Autoload', 'autoload'));

// Autoload vendor dependencies
require_once Kohana::find_file('vendor/aws-sdk-php', 'vendor/autoload');
