<?php

session_start();

$email=$_SESSION['userMail'];
$name="";

$db = mysqli_connect('localhost','hemanth','hemanth@22','blogit') or die("could not connect to database");

$query = "SELECT * FROM users WHERE users.email = '$email'";
// $results = mysqli_query($db,$query);
$results = $db->query($query);
if($results->num_rows > 0){
$user = mysqli_fetch_assoc($results);
if($user){
$name=$user['name'];
}
}
else{
    echo "error";
}

$allQuery = "SELECT * FROM blogdata ORDER BY id Desc";
$allResults = $db->query($allQuery);

$myQuery = "SELECT * FROM blogdata WHERE blogdata.email = '$email' ORDER BY id Desc";
$myResults = $db->query($myQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post It</title>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Lobster+Two:ital,wght@1,700&family=Pacifico&family=Permanent+Marker&display=swap" rel="stylesheet">
    <!-- icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!-- Compiled and minified CSS -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body style="background-color:#000000af;width:100%;height:100%;">
    <div class="container" style="margin-top:10%">
        <div class="row">
            <div class="col l6 xs 6 m6 s12" style="color:#fff;text-align:center">
                <div class="card-panel" style="border-width: 20px;border-color: blue;background-color: transparent;padding: 10vh;">
                    <button class="btn waves-effect waves-light" style="float: right;margin-top: -50px;margin-right: -30px;background-color: transparent;"><a href="create.php"> Write New Blog</a>
                        <i class="material-icons right">create</i>
                    </button>
                    <a class="btn tooltipped" data-position="right" data-tooltip=<?php echo $name ?> style="float: left;background-color: cornflowerblue;padding-right:25px;padding-left: 25px;">Name</a>
                    <br/>
                    <a class="btn tooltipped" data-position="left" data-tooltip=<?php echo $email ?> style="float: right;margin-top: 30px;padding-right:25px;padding-left: 25px;">Email</a>
                    <button class="btn waves-effect waves-light" type="submit" name="action" style="margin-top: 90px;background-color: #ff0037;"><a href="index.php"> Log Out</a>
                        <i class="material-icons right">exit_to_app</i>
                    </button>
                </div>
                <div class="row center">
                    <h3>Your Blogs</h3>
                        <?php if ($myResults->num_rows > 0) {
                        // output data of each row
                        while($row = $myResults->fetch_assoc()) {?>
                        <div class="col l6 xs 6 m6 s12" style="color:#000;text-align:center">
                        <ul class="collapsible">
                            <li>
                            <div class="collapsible-header center" ><i class="material-icons">person</i><?php echo $row["head"] ?></div>
                            <div class="collapsible-body">
                                <?php echo $row["body"] ?>
                                <hr/>
                                mail: <?php echo $row["email"] ?>
                                <br/>
                                time: <?php echo $row["time"] ?>
                            </div>
                            </li>
                        </ul>
                        </div>
                        <?php
                        }
                        } 
                        else {
                        echo "No Blogs";
                        }
                        ?>
                </div>
            </div>
            <div class="col l1 xs1 m1 s0"></div>
            <div class="col l5 xs 5 m5 s12 center">
                <h3 style="color:#fff;">Latest Blogs</h3>
                <?php if ($allResults->num_rows > 0) {
                // output data of each row
                while($row = $allResults->fetch_assoc()) {
                    ?>
                <ul class="collapsible">
                    <li>
                      <div class="collapsible-header center" ><i class="material-icons">subtitles</i><?php echo $row["head"] ?></div>
                      <div class="collapsible-body">
                        <?php echo $row["body"] ?>
                        <hr/>
                        mail: <?php echo $row["email"] ?>
                        <br/>
                        time: <?php echo $row["time"] ?>
                      </div>
                    </li>
                </ul>
                <?php
                }
                } 
                else {
                echo "No Blogs";
                }
                ?>
            </div>
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