<?php namespace core;
/*
 * config - setup system wide settings
 *
 * @author David Carr - dave@daveismyname.com - http://www.daveismyname.com
 * @version 2.1
 * @date June 27, 2014
 */
class Config {

	public function __construct(){

		//turn on output buffering
		ob_start();

		//start sessions
		\helpers\session::init();

		//turn on custom error handling
		set_exception_handler('core\logger::exception_handler');
		set_error_handler('core\logger::error_handler');

		//set timezone
		date_default_timezone_set('Europe/London');

		//site address
		define('DIR','http://swdb.wslol/');

		//database details ONLY NEEDED IF USING A DATABASE
		define('DB_TYPE','mysql');
		define('DB_HOST','localhost');
		define('DB_NAME','swdb');
		define('DB_USER','root');
		define('DB_PASS','');
		define('PREFIX','swdb_');
		define('PREFIX_DB','swdb_');
		define('PREFIX_WS','swdbws_');
		define('SALT','koutiao');

		//set prefix for sessions
		define('SESSION_PREFIX','swdb_');

		//optionall create a constant for the name of the site
		define('SITETITLE','v0.1');

		//set the default template
		\helpers\session::set('template','default');

	}

}