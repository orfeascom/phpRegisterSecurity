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
    <div style="float:right"><a href="logout.php">Logout</a></div>
    <h3>This is the home page</h3>
    <?php if(check_login()): ?>
        <p>Hello <?=htmlspecialchars($_SESSION['username'])?></p>
    <?php else: ?>
        <p style="text-align:center">You need to <a href="login.php">login in</a> first!</p>
    <?php endif; ?>

</body>
</html>