<?php
require "../private/autoload.php";
$error = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(!preg_match("/^[\w\-]+@[\w\-]+.[\w]+$/", $email)){
        $error = "Please enter a valid email...";
    }
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
</head>
<body style="font-family: verdana">
    <style type="text/css">
        form{
            margin: auto;
            border: solid thin #aaa;
            padding: 6px;
            max-width: 400px;
        }
        #title{
            color: white;
            background-color: #50aabd;
            padding: 1em;
            text-align: center;
        }
        #textbox{
            border: solid thin #aaa;
            margin-top: 6px;
            width: 98%;
        }
    </style>
    <form action="" method="POST">
        <div id="title">Signup</div>
        <div style="color: red"><?php echo "$error" ?></div>
        <input id="textbox" type="email" name="email" required>
        <input id="textbox" type="password" name="password" required>
        <input style="margin-top: 4px" type="submit" name="Sign up">
    </form>
</body>
</html>