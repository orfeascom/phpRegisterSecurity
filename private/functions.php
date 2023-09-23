<?php

function esc($word)
{
    //that way we can add more functionality
    return addslashes($word);
}

function check_login()
{
    if(isset($_SESSION['username']))
    {
        return true;
    }

    return false;
}

function get_random_token()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*()';
    $token = '';
    
    for($i=0; $i<64; $i++)
    {
        $index = rand(0, strlen($characters) - 1);
        $token .= $characters[$index];
    }

    return $token;
}