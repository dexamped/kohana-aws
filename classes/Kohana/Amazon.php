<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Amazon {

	/**
	 * @var  string  default instance name
	 */
	public static $default = 'default';

	/**
	 * @var  array  AWS instances
	 */
	public static $instances = array();

	/**
	 * Get a singleton AWS instance.
	 *
	 * @param   string  instance name
	 * @return  Amazon
	 */
	public static function instance($name = NULL)
	{
		if ($name === NULL)
		{
			// Use the default instance name
			$name = Amazon::$default;
		}

		if ( ! isset(Amazon::$instances[$name]))
		{
			$config = Kohana::$config->load('aws')->$name;

			// Check that we have at least the AWS key defined
			if ( ! isset($config['key']))
				throw new Kohana_Exception('Amazon Web Services key not defined in :name configuration',
					array(':name' => $name));

			Amazon::$instances[$name] = Aws\Common\Aws::factory($config);
		}

		return Amazon::$instances[$name];
	}

} // End Kohana_Amazon
