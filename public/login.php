<?php
require "../private/autoload.php";
$error = "";

if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['token']) && isset($_POST['token']) && $_SESSION['token'] == $_POST['token'])
{
    $arr['email'] = $_POST['email'];

    $query = "SELECT * FROM users_secure WHERE email = :email limit 1";
    $stmt = $conn->prepare($query);
    if($stmt->execute($arr))
    {
        $data = $stmt->fetchALL(PDO::FETCH_OBJ);
        if(is_array($data) && count($data) > 0)
        {
            if(password_verify($_POST['password'], $data[0]->password))
            {
                $_SESSION['username'] = $data[0]->username;
                header("Location: index.php");
                die;
            }
        }

    }

    //General error message, security through obscurity
    $error = "Wrong credentials...";

}

//CSRF Token for our form
$_SESSION['token'] = get_random_token();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <div style="color: red"><?php echo $error ?></div>
        <div id="title">Log in</div>
        <input id="textbox" type="email" name="email" placeholder="Email address" required>
        <input id="textbox" type="password" name="password" placeholder="Password" required>
        <input type="hidden" name="token" value="<?=$_SESSION['token']?>">
        <input style="margin-top: 4px" type="submit" name="Login">
    </form>
</body>
</html>