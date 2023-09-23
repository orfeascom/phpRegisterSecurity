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
        return ;
    }

    header("Location: login.php");
}