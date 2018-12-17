<?php
	require "../config/config.php";


    function showUserInfo($connection){

         $query = mysqli_query($connection, "SELECT * FROM members");

         while ($results = mysqli_fetch_array($query) ) {

            $id = $results['id'];
            $fname = $results['fname'];
            $lname = $results['lname'];
            $email = $results['email'];
            $country = $results['country'];
            $number = $results['number'];

             echo" <div class='row'>
                        <div class='col'>" . $id ." </div>
                        <div class='col'> <span class='col-title'> Name : </span>" . $fname . "</div>
                        <div class='col'>" . $lname . "</div>
                        <div class='col'> <span class='col-title'> Email : </span> " . $email . "</div>
                        <div class='col'> <span class='col-title'> Country : </span> " . $country . "</div>
                        <div class='col'> <span class='col-title'> Numbere : </span> " . $number . "</div>
                    </div> <hr> ";


         }

      }

 ?>

<!DOCTYPE html>
<html>
  <head>
    <title>INTERNATIONAL TRAINING INSTITUTE & CONSULTANCY(ITIC)</title>
    <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content="">
      <meta name="keyword" content="" >
      <link href="img/logo.png" rel="shortcut icon" >
      <link rel="stylesheet" href="../css/page-style.css" type="text/css">
  </head>
  <body>
    <div class="main-wrapper-body">
      <div class="list-head" >List of Registered Trainees </div>
      <?php showUserInfo($connection); ?>
    </div>
  </body>
</html>
