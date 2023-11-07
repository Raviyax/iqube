<?php
function set_value($key){
    if(isset($_POST[$key])){
        return $_POST[$key];
    }
    return '';
}

