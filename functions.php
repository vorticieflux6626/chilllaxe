<?php
// From: Learning PHP, MySQL & Javascript (Nixon 4th edition) //
// functions.php -- ChillAxe social media site                //
// @author: vorticieflux6626@gmail.com, @touch: 03-14-2018    //

  $dbhost = 'localhost';
  $dbname = 'chillaxe';
  $dbuser = 'chillaxe';
  $dbpass = 'vortexangularinertia';
  $appname = "ChillAxe";

  $connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  if ($connection->connect_error) die($connection->connect_error); // TODO: Failed connection handling

  function createTable($name, $query) {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Table '$name' created or already exists.<br>";
  }

  function queryMysql($query){
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
  }

  function destroySession() {
    $_SESSION=array();

    if(session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

    session_destroy();
  }

  function sanitizeString($var){
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
  }

  function showProfile($user){
    echo "test";
    if (file_exists("$user.jpg"))
      echo "<img src='$user.jpg' style='float: left;'>";
    else {
      echo "<span style='background: darkblue; border-radius: 20px; color: orange;'>No Profile Image Found</span>";
    }


    $result = queryMysql("SELECT * FROM profiles WHERE user='$user'");

    if ($result->num_rows){
      $row = $result->fetch_array(MYSQLI_ASSOC);
      echo "".stripslashes($row['text'])."<br style='clear: left;'><br>";
    }
  }

?>
