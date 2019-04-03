<?php
date_default_timezone_set('Asia/Jakarta');
require_once("sdata-modules.php");
/**
 * @Author: Eka Syahwan (sdata), Dani Hidayat
 * @Date:   2018-08-21
 * @Last Modified by:  Dani Hidayat
 * @Last Modified time: Pandeglang, 2018-08-21
*/
include ("config.php");
	$url 	= array(); 
	for ($i=0; $i <$config['worker']; $i++) { 
        $urls[] = array(
            'url' 	=> 'http://freebitcoincash.cryptoplanets.org/'.$config['urls'].'/ajax.php',
            'note' 	=> 'optional', 
        );
        $headers[] = array(
            'header' => array(
                "Accept: */*",
                "Accept-Encoding: gzip,deflate",
                "Accept-Language: en-US",
                "Cache-Control: no-cache",
                "Connection: keep-alive",
                "Content-Type: application/x-www-form-urlencoded; charset=UTF-8",
                "Cookie: PHPSESSID=".$config['sessid']."; _ga=GA1.2.2039004794.1535154359; _gid=GA1.2.1210565528.1535154359; _gat_gtag_UA_115295872_1=1",
                "Host: freebitcoincash.cryptoplanets.org",
                "Origin: http://freebitcoincash.cryptoplanets.org",
                "Referer: ".$config['urls']."/index.php",
                "User-Agent: Mozilla/5.0 (Linux; Android 4.4.2; SM-G9350 Build/JLS36C) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36",
                "X-Requested-With: XMLHttpRequest"
                        ),
            'post' => 'claim_daily_profit=button6'
          );
    //
    }
    while(TRUE){
    $respons = $sdata->sdata($urls , $headers);
    foreach ($respons as $key => $value) {
        //$rjson = json_decode($value[respons],true);
        $rhttp = json_decode($value[info][http_code],true);
        if($rhttp == "200"){
            echo "\033[0m[".$key."] Points Earned!\033[32m +100 \033[0m\n";
        }elseif ($rhttp == "0") {
            echo "\033[0m[".$key."]\033[31m FAILED! \033[0m (Fail Code : $rhttp)\n";
        }elseif ($rhttp == "503") {
            echo "\033[0m[".$key."]\033[31m FAILED! \033[0m (Fail Code : $rhttp)\n";
        }else{
            print_r($respons);
        }
    }
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://freebitcoincash.cryptoplanets.org/'.$config['urls'].'/index.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8",
    "Accept-Encoding: gzip,deflate",
    "Accept-Language: en-US",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Cookie: PHPSESSID=".$config['sessid']."; _ga=GA1.2.2039004794.1535154359; _gid=GA1.2.1210565528.1535154359",
    "Host: freebitcoincash.cryptoplanets.org",
    "Referer: ".$config['urls']."/index.php",
    "User-Agent: Mozilla/5.0 (Linux; Android 4.4.2; SM-G9350 Build/JLS36C) AppleWebKit/537.36 (KHTML, like Gecko) Version/4.0 Chrome/30.0.0.0 Mobile Safari/537.36",
    "X-Requested-With: org.com.bchdiamonds"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
    $re = '/<div class="fa fa-diamond"><\/div> (.*?)<\/font>/';
preg_match($re, $response, $matches, PREG_OFFSET_CAPTURE, 0);
// Print the entire match result
    echo "====== Task Completed | Balance : ".number_format($matches[1][0])." =====\n";
    sleep(30);
}
}
