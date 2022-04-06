<?php


/**
 * Initialize the system
 */
define('TL_SCRIPT', 'api/index.php');
define('TL_MODE', 'FE');
define('BYPASS_TOKEN_CHECK', true);

require_once('../../../../../system/initialize.php');


/**
 * Run the controller
 */
$controller = new \Internethering\Isotope\OnlineTickets\Api\EntryPoint();
$controller->run();
