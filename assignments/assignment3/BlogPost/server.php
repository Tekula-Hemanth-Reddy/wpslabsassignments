<?php

session_start();//when ever we enter into website we have to track by some one for email etc;

//initialising variables

$firstName="";
$lastName="";
$space=" ";
$email="";
$userName="";

$errors = array();

//connect to db

$db = mysqli_connect('localhost','hemanth','hemanth@22','blogit') or die("could not connect to database");

//register user
if (isset($_POST['signUp_user'])){
    $firstName= mysqli_real_escape_string($db,$_POST['firstName']);
    $lastName= mysqli_real_escape_string($db,$_POST['lastName']);
    $email= mysqli_real_escape_string($db,$_POST['mailSignUp']);
    $password= mysqli_real_escape_string($db,$_POST['passwordSignUp']);

    $userName=$firstName.$space.$lastName;

    if(empty($userName)){array_push($errors,"userName is Required");}
    if(empty($email)){array_push($errors,"Email is Required");}
    if(empty($password)){array_push($errors,"Password is Required");}

    //checking db for existing user

    $user_check_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $results = mysqli_query($db,$user_check_query);
    $user = mysqli_fetch_assoc($results);

    if($user){
        array_push($errors,"User Already Exist");
    }

    //register the user

    if(count($errors)==0){
        $query = "INSERT INTO users(name, email, password) VALUES ('$userName','$email','$password')";
        mysqli_query($db,$query);
        $_SESSION['userMail']=$email;

        header('location: home.php');
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