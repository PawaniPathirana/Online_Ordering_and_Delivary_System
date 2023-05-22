<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customer Feedback Page</title>
    <link rel="stylesheet" href="CSS/customerfeedback.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  </head>
  <body>

<?php

$host="localhost";
$user="root";
$pass="";
$db="webmit";

$con = new mysqli($host,$user,$pass,$db);

if(!$con)
{
echo "There are some problem while connecting the database";
}


?>

    <div class="container">
      <div class="post">
        <div class="text">Thanks for rating us!</div>
        <div class="edit">EDIT</div>
      </div>
      <div class="star-widget">
        <input type="radio" name="rate" id="rate-5">
        <label for="rate-5" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-4">
        <label for="rate-4" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-3">
        <label for="rate-3" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-2">
        <label for="rate-2" class="fas fa-star"></label>
        <input type="radio" name="rate" id="rate-1">
        <label for="rate-1" class="fas fa-star"></label>
        <form action="feedbackval.php" method="post">
          <header></header>
          <div class="textarea">
            <textarea name="REVIEW" cols="30" placeholder="Describe your experience.."></textarea>
          </div>
          <div class="btn">
            <button type="submit">Post</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>