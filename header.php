<?php
  // header.php -- chain include functions.php -- ChillAxe
  // From: LPMJ(Nixon 4th)

  session_start();

  echo "<!doctype html>\n<html>\n\t<head>\n\t<meta lang='en-us'>\n<meta charset='utf-8'>\n";
  echo "<script async src='https://www.googletagmanager.com/gtag/js?id=UA-90046683-1'></script>".
       "<script>".
       "window.dataLayer = window.dataLayer || [];".
       "function gtag(){dataLayer.push(arguments);}".
       "gtag('js', new Date());".
       "gtag('config', 'UA-90046683-1');".
       "</script>";

  require_once 'functions.php';

  $userstr = ' (Guest)';

  if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $logged_in = true;
    $userstr = " ($user)";
  }
  else $logged_in = false;

  echo  "<title>$appname$userstr</title><link rel='stylesheet' href='../css/styles.css' type='text/css'>" .
        "</head><body><center><canvas id='logo'>$appname</canvas></center>" .
        "<div class='appname'>$appname</div><script src='javascript.js'></script>".
        "<br><span class='subtitle'>A social network project by <b>SparkOne() Labs&copy;</b></span>";


      if ($logged_in)
        echo "<br><ul class='menu'>" .
             "<li><a href='members.php?view=$user'>Home</a></li>" .
             "<li><a href='members.php'>Members</a></li>" .
             "<li><a href='friends.php'>Friends</a></li>" .
             "<li><a href='messages.php'>Messages</a></li>" .
             "<li><a href='profile.php'>Edit Profile</a></li>" .
             "<li><a href='logout.php'>Log Out</a></li></ul><br>";
      else
        echo ("<br><ul class='menu'>".
              "<li><a href='index.php'>Home</a></li>".
              "<li><a href='signup.php'>Sign Up</a></li>".
              "<li><a href='login.php'>Log In</a></li>".
              "<li><span class='info'>&#8658; You must be logged in to ".
              "view this page.</span><br><br>");

    // ...

?>
