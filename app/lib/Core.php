<?php
/* App core class
 * Creates URL & loads core controller
 * URL FORMAT - /controller/method/params
 */

class core {
    protected $currentController = '_404';
    protected $currentMethod = 'index';
    protected $params = [];
  

   public function __construct()
   {
   
    $url = $this->getUrl();

    if(isset($url[0])){
    // Look in controllers for first value (capitalizing first letter because , the naming convention of the controller class)
    if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
        unset($url[0]);

    }
}
    // Require the controller
    require_once '../app/controllers/' . $this->currentController . '.php';
 
    // Instantiate controller class
    $this->currentController = new $this->currentController;
  


    // Check for second part of url
    if(isset($url[1])){
        // Check to see if method exists in controller
        if(method_exists($this->currentController, $url[1])){
            $this->currentMethod = strtolower($url[1]);
            // Unset 1 index
            unset($url[1]);
        }
    }
       // Get params
         $this->params = $url ? array_values($url) : [];
            // Call a callback with array of params
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

   }
   
    
    public function getUrl(){
            $url = $_GET['url']??'Landing';
           
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
           
            return $url;

       
         
    }
}