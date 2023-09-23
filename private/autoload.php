<?php

session_start();

//Disable error messages, 1 for developing envs 0 for production
ini_set("display_errors", 1);

require "database.php";
require "functions.php";