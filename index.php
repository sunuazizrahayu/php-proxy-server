<?php
/**
 * ======================================================================================
 * PHP PROXY SERVER
 * ======================================================================================
 * Please Keep This Credit
 * --------------------------------------------------------------------------------------
 * Repository   : https://github.com/sunuazizrahayu/php-proxy-server
 *
 * ======================================================================================
 */
$application_server = '1.2.3.4';
$uri = $_SERVER['REQUEST_URI'];


$curl = curl_init("http://{$application_server}{$uri}");

// HANDLE REQUEST
if($_POST){
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl,CURLOPT_POSTFIELDS,$_POST);
}
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);

$data = curl_exec($curl);


// do something with $data, transform it however you want...
//OUTPUT SETTINGS
$httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE); //SET STATUS CODE
http_response_code($httpcode);

$contentType = curl_getinfo($curl, CURLINFO_CONTENT_TYPE); //SET CONTENT-TYPE
header('Content-Type: '.$contentType);

//output
echo $data;
