<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require("configdbconnect.php");
$configuration = $globleConnectDB;

$config['seo_title'] =$configuration['seo_title'];
$config['seo_desc'] =$configuration['seo_desc'];
$config['seo_imgurl'] = base_url().'assets/images/logo73.jpg';
$config['seo_keywords'] = $configuration['seo_keywords'];