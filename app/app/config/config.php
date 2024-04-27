<?php
if($_SERVER['SERVER_NAME'] == 'localhost'){
    define('PATH_MYSQLDUMP','C:\\xampp\\mysql\\bin\\mysqldump.exe');
    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','iqube');
    define('DBDRIVER','mysql');
    define('URLROOT','http://localhost/iqube');
}



define('APPROOT',dirname(dirname(__FILE__)));
// URL root - use something in public root
// Site name
define('SITENAME','IQube');