<?php

require "../private/autoload.php";
//check_login();

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php if(check_login()): ?>
        <div style="float:right"><a href="logout.php">Logout</a></div>
        <p>Hello <?=htmlspecialchars($_SESSION['username'])?></p>
    <?php else: ?>
        <p style="text-align:center">You need to <a href="login.php">login in</a> first!</p>
    <?php endif; ?>
    <h3 style="text-align:center">This is the home page</h3>

</body>
</html>