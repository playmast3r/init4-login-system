<?php
//Sometimes I believe compiler ignores all my comments

 require("config.php");                      //It has your mysql connection credentials and creates the connection
 date_default_timezone_set('Asia/Kolkata');  //Change this to your preferred timezone to store login timestamp

// checking Captcha is passed successfully or not
if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        // site secret key
        $secret = 'xxxxxxxxxxxxx';       //Use google recaptcha secret key which u get when you sign up for google recaptcha
        // get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success){
// email and password sent from form 
$email=$_POST['email']; 
$password=$_POST['password']; 

// To protect MySQL injection 
$email = mysqli_real_escape_string($db,$email);
$password = mysqli_real_escape_string($db,$password);
$sql2 = "SELECT salt FROM User WHERE email='$email';";
$result2 = $db->query($sql2);
while($row2 = mysqli_fetch_assoc($result2)) {
         $salt = $row2["salt"];
}
$password2 = $salt;
$password2 .= $password;
$password2 = hash('sha256',$password2);     //I have used sha256, you can use sha512/bcrypt for more security
$sql="SELECT * FROM User WHERE email='$email' and password='$password2';";
$result = $db->query($sql);
$count=mysqli_num_rows($result);
while($row = mysqli_fetch_assoc($result)) {
         $role = $row["role"];
}
// If result matched $email and $password2, table row must be 1 row
if($count==1) {
    	// server should keep session data for AT LEAST 4 hour
    ini_set('session.gc_maxlifetime', 14400);

    // each client should remember their session id for EXACTLY 4 hour
    session_set_cookie_params(14400);
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['role'] = $role;         //you can remove this if you have only 1 type of account

//Get user IP
function getUserIP() {
    $client  = $_SERVER['HTTP_CLIENT_IP'];
    $forward = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)) {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP)) {
        $ip = $forward;
    }
    elseif(filter_var($remote, FILTER_VALIDATE_IP)) {
        $ip = $remote;
    }
    else {
        $ip = "Unknown";
    }
  return $ip;
}

$ip = getUserIP();
$time = date("Y-m-d h:i:s");

//Store the email id, IP address and timestamp in database
$sql3 = "INSERT INTO LoginLog (email, ip, time) VALUES ('$email', '$user_ip', '$time') ;";
$result3 = $db->query($sql3);
}

else { 
mysqli_close($db);      //kill connection before sleep
sleep(2);               //even php needs some sleep before you start making it do complex stuff!
                        //Kidding, just slowing down wrong attempts. *Evil Laugh*
header('Location: login.php?msg=invalid');   //Means invalid credentials
}
 if( $_SESSION['role'] == 'customer') {
   header('Location: index.html');      //redirect user to ur member area or you can have multiple if statements and redirect user based on their role
}
}
}
else {
     header('Location: login.php?msg=invalidcaptcha'); }
?>
