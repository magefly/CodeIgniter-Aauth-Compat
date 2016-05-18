<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| Aauth-Compat Config
| -------------------------------------------------------------------
| a CodeIgniter-Aauth Compatibility Pack for deleted functions after v2.5.0
|
| -------------------------------------------------------------------
| EXPLANATION
| -------------------------------------------------------------------
|
| 	['system_variables']               	The table which contains Aauth system variables
|
*/
$config_aauth_compat = array();

$config_aauth_compat["default"] = array(
	'system_variables' => 'aauth_system_variables',
);

$config['aauth_compat'] = $config_aauth_compat['default'];

/* End of file aauth.php */
/* Location: ./application/config/aauth.php */