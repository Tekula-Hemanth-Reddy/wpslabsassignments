<?php

session_start();//when ever we enter into website we have to track by some one for email etc;

//initialising variables

$title="";
$body="";

$errors = array();

//connect to db

$db = mysqli_connect('localhost','hemanth','hemanth@22','blogit') or die("could not connect to database");

//register user
if (isset($_POST['preview'])){
    $title= mysqli_real_escape_string($db,$_POST['title']);
    $body= mysqli_real_escape_string($db,$_POST['body']);

    if(empty($title)){array_push($errors,"title is Required");}
    if(empty($body)){array_push($errors,"Body is Required");}

    if(count($errors)==0){
        $_SESSION['title']=$title;
        $_SESSION['body']=$body;

        header('location: preview.php');
    }
}

if(isset($_POST['logIn_user'])){
    $dbc = mysqli_connect('localhost','hemanth','hemanth@22','blogit') or die("could not connect to database");

    $email= mysqli_real_escape_string($db,$_POST['mailLogin']);
    $password= mysqli_real_escape_string($db,$_POST['passwordLogin']);
    if(empty($email)){array_push($errors,"Email is Required");}
    if(empty($password)){array_push($errors,"Password is Required");}
    echo $email. $password;
    $query = "SELECT * FROM users WHERE users.email = '$email' AND users.password = '$password'";
    $results = $dbc->query($query);

    if($results->num_rows > 0){
        $_SESSION['userMail']=$email;

        header('location: home.php');
    }
    else{
        array_push($errors,"user not found");
    }
}

?>