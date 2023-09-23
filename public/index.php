<?php

require "../private/autoload.php";
check_login();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h4>This is the home page</h4>
    <p>Hello <?=$_SESSION['username']?></p>
</body>
</html>