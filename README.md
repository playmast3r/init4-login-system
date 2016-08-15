# init4-login-system
A secure open-source login system using core php and mysql as backend. Built from scratch and with love.

# Features:
  1.SHA-256 with variable salt to store password
  
  2.Safe from:
  
    a.Brute-force (Used Google reCAPTCHA v2)
    b.SQL injection (mysqli_real_escape_string())
    c.XSS Scripting
    d.Birthday attack
  3.Login Log for each user with their IP address and timestamp
  
  4.Variable salt custom function using openssl_random_pseudo_bytes()
  
  5.Session variables for checking logged in status
  
  6.Designed with security in mind

#Live demo: 

Link: https://www.iamsid.tk/init4/login.php

Email: test

Password: password
