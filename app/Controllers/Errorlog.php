<?php
namespace App\Controllers;

class Errorlog extends BaseController
{
	public function index($dateNow = "") {

        $dateNow = $dateNow == "" ? date("Y-m-d") : $dateNow;
        // $dateNow = '2022-03-21';
        $path = WRITEPATH."logs/log-".$dateNow.".log";
        // echo $path;exit();
        if(file_exists($path)){
            $string = nl2br(file_get_contents($path));
        } else {
            $string = "No error";
        }
        
        echo $string;
        exit();

    }
    
    
}
