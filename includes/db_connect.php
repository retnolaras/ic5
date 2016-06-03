<?php
include_once 'psl-config.php';   // As functions.php is not included
$mysqli = new mysqli("localhost", "root", "", "icrpv");
if(!defined('URL_HOST'))define('URL_HOST', 'http://'. $_SERVER['HTTP_HOST'].'/icrpv5/');
define('TODAY', time());