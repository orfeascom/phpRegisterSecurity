<?php
require "../private/autoload.php";
$errors = array('email'=>'','username'=>'','password'=>'');
$email = $username = "";

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(!preg_match("/^[\w\-]+@[\w\-]+.[\w]+$/", $email))
    {
        $errors['email'] = "Please enter a valid email...";
    } else 
    {
        $arr = false;
        $arr['email'] = $email;
        $query = "SELECT * FROM users_secure WHERE email = :email limit 1";
        $stmt = $conn->prepare($query);
        if($stmt->execute($arr))
        {
            $data = $stmt->fetchALL(PDO::FETCH_OBJ);
            if(is_array($data) && count($data) > 0)
            {
                $errors['email'] = "Email already in use...";
            }
        }

    }

    //Valid email
    if($errors['email'] == "")
    {
        if(!preg_match("/^[\w\_]+$/", $username))
        {
            $errors['username'] = "Please enter a valid username";
        } else 
        {
            //valid email and username
            $arr['email'] = esc($email);
            $arr['username'] = esc($username);
            $arr['password'] = esc($password);

            $query = "INSERT INTO users_secure (email,username,password) VALUES (:email,:username,:password)";
            $stmt = $conn->prepare($query);
            $stmt->execute($arr);

            header("Location: login.php");
            die;
        }
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
        <div style="color: red"><?php echo $errors['email'] ?></div>
        <input id="textbox" type="email" name="email" placeholder="Email address" value="<?=$email?>"required>
        <div style="color: red"><?php echo $errors['username'] ?></div>
        <input id="textbox" type="text" name="username" placeholder="Username" value="<?=$username?>"required>
        <input id="textbox" type="password" name="password" placeholder="Password" required>
        <input style="margin-top: 4px" type="submit" name="Sign up">
    </form>
</body>
</html>