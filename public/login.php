<?php
require "../private/autoload.php";
$error = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $arr['email'] = $_POST['email'];
    $arr['password'] = $_POST['password'];

    $query = "SELECT * FROM users_secure WHERE email = :email && password = :password limit 1";
    $stmt = $conn->prepare($query);
    if($stmt->execute($arr))
    {
        $data = $stmt->fetchALL(PDO::FETCH_OBJ);
        if(is_array($data) && count($data) > 0)
        {
            $_SESSION['username'] = $data[0]->username;
            header("Location: index.php");
            die;
        }

    }


}
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
        <div id="title">Signup</div>
        <input id="textbox" type="email" name="email" placeholder="Email address" required>
        <input id="textbox" type="password" name="password" placeholder="Password" required>
        <input style="margin-top: 4px" type="submit" name="Login">
    </form>
</body>
</html>