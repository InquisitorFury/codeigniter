<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['abouts'] = 'Welcome/about';
$route['home'] = 'Quizgame/quiz';
$route['Quizgame/questions/(:num)'] = 'quizgame/questions/$1';