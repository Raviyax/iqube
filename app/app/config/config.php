<?php
if($_SERVER['SERVER_NAME'] == 'localhost'){
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','iqube');
    define('DBDRIVER','mysql');
    define('URLROOT','http://localhost/iqube');
}
    // define('DB_HOST','db:3306');
    // define('DB_USER','root');
    // define('DB_PASS','Priuscaa4025');
    // define('DB_NAME','iqube');
    // define('DBDRIVER','mysql');
    // define('URLROOT','https://iqube.me');


// define('DB_HOST','168.138.182.121');
// define('DB_USER','root');
// define('DB_PORT','10984');
// define('DB_PASS','xvhblk123');
// define('DB_NAME','iqube');
// define('DBDRIVER','mysql');
// define('URLROOT','http://localhost/iqube');

// define('DB_HOST','150.230.141.154');
// define('DB_USER','root');
// define('DB_PORT','3306');
// define('DB_PASS','Priuscaa4025');
// define('DB_NAME','iqube');
// define('DBDRIVER','mysql');
// define('URLROOT','http://localhost/iqube');


define('APPROOT',dirname(dirname(__FILE__)));
// URL root - use something in public root
// Site name
define('SITENAME','IQube');