<?php
    if(!isset($_SESSION)){
        highlight_file(__FILE__);
        die("no session");
    }
    include("./php/check_ip.php");
    error_reporting(0);
    $url = $_GET['url'];
    if(check_inner_ip($url)){
        if($url){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
            $output = curl_exec($ch);
            $result_info = curl_getinfo($ch);
            curl_close($ch);
            }
    }else{
        echo "Your IP is internal yoyoyo";
    }
    
?>