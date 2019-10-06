<?php

spl_autoload_register(function($class){
   include_once "system/libs/".$class.".php"; 
});

include_once "app/config/config.php";
$main = new Main();


/* $url = isset($_GET['url']) ? $_GET['url'] : NULL;

 if ($url != NULL) {
 	 $url = rtrim($url, "/");
     $url = explode("/", filter_var($url, FILTER_SANITIZE_URL));
 }else{
 	unset($url);
 }


if (!empty($url[0])) {

	include "app/controllers/".$url[0].".php";
     $cont = new $url[0]();

     if (!empty($url[2])) {

     	$method = $url[1];
        $cont->$method($url[2]);

     } else {
     	if (!empty($url[1])) {

     		$method = $url[1];
            $cont->$method();

     	} else {
     		
     	}
     	
     }
     
} else {

	include "app/controllers/Index.php";
	$cont = new Index();
	$cont->home();
}
*/
?>
