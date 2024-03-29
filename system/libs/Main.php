<?php
/**
 * Main Class
 */
class Main{

	public $url;
	public $controllerName = "Index";
	public $methodName = "Index";
	public $controllerPath = "app/controllers/";
	public $controller;

	public function __construct()
	{
		$this->getUrl();
		$this->loadController();
		$this->callMethod();
	}


	 public function getUrl(){
        $this->url = isset($_GET['url']) ? $_GET['url'] : NULL;

		 if ($this->url != NULL) {
		 	 $this->url = rtrim($this->url, "/");
		     $this->url = explode("/", filter_var($this->url, FILTER_SANITIZE_URL));
		 } else{
		 	unset($this->url);
		 }
	 }

    public function loadController(){
    	if(!isset($this->url[0])){
          include $this->controllerPath . $this->controllerName . ".php";
          $this->controller = new $this->controllerName();
    	} else{
    		$this->controllerName = $this->url[0];
    		$filename = $this->controllerPath . $this->controllerName . ".php";
    		if(file_exists($filename)){
               include $filename;
               if (class_exists($this->controllerName)) {
               	  $this->controller = new $this->controllerName();
               } else{ header("Location:".BASE_URL."/Index/notFound"); }
    		} else{ header("Location:".BASE_URL."/Index/notFound"); }
    	}
    }

    public function callMethod(){
    	if(isset($this->url[2])){
            $this->methodName = $this->url[1];
          if (method_exists($this->controller, $this->methodName)) {
          	$this->controller->{$this->methodName}($this->url[2]);
          } else{
            header("Location:".BASE_URL."/Index/notFound");
          }
    	} else{
    		if (isset($this->url[1])) {
    			$this->methodName = $this->url[1];
    			if (method_exists($this->controller, $this->methodName)) {
	          	$this->controller->{$this->methodName}();
	           } else{
	            header("Location:".BASE_URL."/Index/notFound");
	           }
    		} else{

    			if (method_exists($this->controller, $this->methodName)) {
	          	$this->controller->{$this->methodName}();
	           } else{
	            header("Location:".BASE_URL."/Index/notFound");
              // header("Location:".BASE_URL);
	           }

    		}
    	}
    }
}