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
    if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
        $this->currentController = ucwords($url[0]);
        unset($url[0]);
    }
}
    require_once '../app/controllers/' . $this->currentController . '.php';
    $this->currentController = new $this->currentController;
    if(isset($url[1])){
        if(method_exists($this->currentController, $url[1])){
            $this->currentMethod = strtolower($url[1]);
            unset($url[1]);
        }
    }
         $this->params = $url ? array_values($url) : [];
            call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
   }
    public function getUrl(){
            $url = $_GET['url']??'Landing';
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
           
            return $url;
    }
}