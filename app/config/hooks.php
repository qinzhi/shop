<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/

/* End of file hooks.php */
/* Location: ./system/application/config/hooks.php */


$hook['post_controller_constructor'][] = array(
                                'class'    => 'CheckPermition',
                                'function' => 'baseJudgeAdminUserLogin',
                                'filename' => 'CheckPermition.php',
                                'filepath' => 'hooks',
                                'params'   => array()
                                );

/*$hook['post_controller_constructor'][] = array(
                                'class'    => 'pagespeed',
                                'function' => 'pagespeedperfix',
                                'filename' => 'pagespeed.php',
                                'filepath' => '../include',
                                'params'   => array()
                                );  
                                */

 /*
$hook['post_controller'][] = array(
										'class'    => 'htmlclear',
										'function' => 'html_clear',
										'filename' => 'htmlclear.php',
										'filepath' => '../include',
										'params'   => array()
									);      */

$hook['post_controller'][] = array(
                                'class'    => 'CheckPermition',
                                'function' => 'reponse',
                                'filename' => 'CheckPermition.php',
                                'filepath' => 'hooks',
                                'params'   => array()
                                ); 