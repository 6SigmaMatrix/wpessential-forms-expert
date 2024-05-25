<?php

use WPEssential\Plugins\FormsExpert\DataBase\DatabaseInit;

if ( ! \defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
function wpe_subsciber_install ()
{
	DatabaseInit::constructor();
}
