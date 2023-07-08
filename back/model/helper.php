<?php

function check_session()
{
    // check if there is an active session
    return isset($_SESSION['user']);
}

function printData($data, $die = true)
{
    // debug
    echo '<pre>';
    if(is_object($data) || is_array($data)){
        print_r($data);
    } else {
        echo $data;
    }

    if($die){
        die('<br>FIM</br>');
    }
}