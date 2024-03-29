<?php
if(file_exists('vendor/autoload.php')){
	require 'vendor/autoload.php';
} else {
	echo "<h1>Please install via composer.json</h1>";
	echo "<p>Install Composer instructions: <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>";
	echo "<p>Once composer is installed navigate to the working directory in your terminal/command promt and enter 'composer install'</p>";
	exit;
}

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
	define('ENVIRONMENT', 'development');
	define('CTRLR', '\controllers\\');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and production will hide them.
 */

if (defined('ENVIRONMENT')){

	switch (ENVIRONMENT){
		case 'development':
			error_reporting(E_ALL);
		break;
	
		case 'testing':
		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}

}

//create alias for Router
use \core\router as Router,
    \helpers\url as Url;

//define routes
Router::any('', CTRLR.'welcome@index');

Router::get('/koutiaonapnap', CTRLR.'user@setfakesession');

//users
Router::get('/sign', CTRLR.'user@index');
Router::post('/signup', CTRLR.'user@signup');
Router::post('/check_email', CTRLR.'user@checkemail');
Router::post('/check_username', CTRLR.'user@checkname');
Router::post('/signin', CTRLR.'user@signin');
Router::get('/logout', CTRLR.'user@logout');
//add
Router::get('/upload', CTRLR.'upload@form');
Router::post('/upload', CTRLR.'upload@confirm');
Router::post('/upload/save', CTRLR.'upload@save');
//monsters
Router::get('/monsters', CTRLR.'monster@index');
Router::get('/monsters/(:num)/(:num)', CTRLR.'monster@index');

Router::post('/monster/add', CTRLR.'monster@add');
Router::get('/monster/(:all)', CTRLR.'monster@show');
Router::post('/rune/saveset', CTRLR.'rune@saveset');
// vote
Router::post('/vote/rune', CTRLR.'vote@rune');

//if no route found
Router::error('\core\error@index');

//execute matched routes
Router::dispatch();
