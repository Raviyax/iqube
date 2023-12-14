<?php
// DB Params 
if($_SERVER['SERVER_NAME'] == 'localhost'){
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','Priuscaa4025');
    define('DB_NAME','iqube');
    define('DBDRIVER','mysql');
}else{

}

// app root - use something in app root
define('APPROOT',dirname(dirname(__FILE__)));
// URL root - use something in public root
define('URLROOT','http://localhost/iqube');
// Site name
define('SITENAME','IQube');