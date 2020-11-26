<?php
session_start();

$email=$_SESSION['userMail'];
$title=$_SESSION['title'];
$content=$_SESSION['body'];
$temp=date("Y-m-d");

$db = mysqli_connect('localhost','hemanth','hemanth@22','blogit') or die("could not connect to database");
$query = "INSERT INTO blogdata(head, body, time, email) VALUES ('$title','$content','$temp','$email')";

if(isset($_POST['preview'])){
    if(isset($_POST['formSubmit'])){mysqli_query($db,$query);}
header('location: home.php');
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Post It</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Lobster+Two:ital,wght@1,700&family=Pacifico&family=Permanent+Marker&display=swap" rel="stylesheet">
    <!-- icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body style="background-color:#000000af;width:100%;height:100%;">

    <div class="container">
        <div class="card-panel" style="margin-top:10%;background-color: transparent;padding: 10vh;color:#fff">
        <form action="preview.php" method="post">
            <div class="row">
                <div class="col xl5 l5 s5 m5">
                    <h5>Title</h5>
                </div>
                <div class="col xl1 l1 s1 m1">
                    <h5>:</h5>
                </div>
                <div class="col xl6 l6 s6 m6">
                    <h5>
                        <?php echo $title?>
                    </h5> 
                </div>
            </div>
            <div class="row">
                <div class="col xl5 l5 s5 m5">
                    <h5>Body</h5>
                </div>
                <div class="col xl1 l1 s1 m1">
                    <h5>:</h5>
                </div>
                <div class="col xl6 l6 s6 m6">
                    <h5>
                        <?php echo $content?>
                    </h5> 
                </div>
            </div>
            <div class="row">
                <div class="col xl5 l5 s5 m5">
                    <h5>Email</h5>
                </div>
                <div class="col xl1 l1 s1 m1">
                    <h5>:</h5>
                </div>
                <div class="col xl6 l6 s6 m6">
                    <h5>
                        <?php echo $email?>
                    </h5> 
                </div>
            </div>
            <div class="row">
                <div class="col xl5 l5 s5 m5">
                    <h5>Date</h5>
                </div>
                <div class="col xl1 l1 s1 m1">
                    <h5>:</h5>
                </div>
                <div class="col xl6 l6 s6 m6">
                    <h5>
                        <?php echo $temp?>
                    </h5> 
                </div>
            </div>
        <p>
        <label>
            <input type="checkbox"  name="formSubmit" />
            <span>All Set</span>
        </label>
        </p>
        <button type="submit" class="btn waves-effect waves-light"style="color: #fff;" name="preview">Continue</button>
  </form>
        </div>
    </div>



</body>
<!-- j-query -->
<script src="https://code.jquery.com/jquery-3.5.1.js"
 integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" 
 crossorigin="anonymous"></script>

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<!-- coustomjs -->
<script >
    $(document).ready(function(){
    $('.tooltipped').tooltip();
    $('.collapsible').collapsible();
  });
</script>
</html>
