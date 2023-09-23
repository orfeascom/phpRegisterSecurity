<?php

require "../private/autoload.php";

if(isset($_SESSION['username']))
{
    unset($_SESSION['username']);
}

header("Location: index.php");