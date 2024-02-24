<?php
// DB Params
// if($_SERVER['SERVER_NAME'] == 'localhost'){
//     define('DB_HOST','localhost');
//     define('DB_USER','root');
//     define('DB_PASS','');
//     define('DB_NAME','iqube');
//     define('DBDRIVER','mysql');
//     define('URLROOT','http://localhost/iqube');
// }

    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','Priuscaa4025');
    define('DB_NAME','iqube');
    define('DBDRIVER','mysql');
    define('URLROOT','https://groupproject.duckdns.org');

// app root - use something in app root
define('APPROOT',dirname(dirname(__FILE__)));
// URL root - use something in public root

// Site name
define('SITENAME','IQube');