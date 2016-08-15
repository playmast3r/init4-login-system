<?php
//Edit these based on your mysql configuration
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'rollingsky');
   define('DB_DATABASE', 'Test');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);  //create connection
   mysqli_set_charset($db, "utf8");                                      //set charset for mysqli_real_escape_string()
?>
