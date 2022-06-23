<?php

include("connect.php");


$username_err = $mail_err = $password_err = "";
$username = $mail = $password = "";

function CheckUsername(){
	global $username,$username_err;
	if(empty($_POST["usernametext"]))
		$username_err = "Username cannot be empty";
	elseif (strlen($_POST["usernametext"])<6) 
		$username_err = "Username must be at least 6 characters ";
	else if (preg_match('/^[a-z\d_]{5,20}$/i',$_POST["usernametext"])) #email regex php tarayıcı
		$username_err = "Username consists of upper and lower case letters and numbers";	
	else
		$username = $_POST["usernametext"];
	}


function CheckMail(){
	global $mail_err,$mail;
	if(empty($_POST["mail"]))
		$mail_err = "mail field cannot be empty";
	else if (!filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL))
	  $email_err = "Invalid email format";
	else
		$mail = $_POST["mail"];}

function CheckPassword(){
	global  $password_err,$password ;
	if(empty($_POST["password"]))
		$password_err = "Password cannot be empty";
	else
		$password = $_POST["password"];}

function AddDatabase(){

	global $username,$mail,$password,$connect;
	//echo $username;
	
	if(isset($username) && isset($mail) && isset($password)){
		$command = "INSERT INTO kullanicilar (kullanici_adi,email,parola) VALUES ('$username','$mail','$password')";
		$commandrun = mysqli_query($connect,$command);
		if($commandrun)
			echo "KAYIT başarılı";
		else
			echo "KAYIT başarısız";
		mysqli_close($connect);
	}
}

if(isset($_POST["submit"]))
{
	CheckUsername();
	CheckMail();
	CheckPassword();
	AddDatabase();
}
?>







<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>MEMBER REGISTER SYSTEM</title>
</head>
<body>

	
<div class="container p-5">
	<div class="card text-white bg-info mb-3 " style="max-width: 18rem;">
  <div class="card-header">REGISTER FORM</div>
  <div class="card-body">
    <p class="card-text">

   <form action="register.php" method="POST">
   	  <div class="form-group">
	    <label for="exampleInputEmail1">Username</label>
	    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" , name="usernametext">
	    <?php
		    echo '<small id="emailHelp" class="form-text text-muted">'.$username_err.'</small>';
		?>
	  </div>

	  <div class="form-group">
	    <label for="exampleInputEmail1">Email address</label>
	    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="mail">
	    <?php
		    echo '<small id="emailHelp" class="form-text text-muted">'.$mail_err.'</small>';
		?>
	  </div>


	  <div class="form-group">
	    <label for="exampleInputPassword1">Password</label>
	    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
	    <?php
		    echo '<small id="emailHelp" class="form-text text-muted">'.$password_err	.'</small>';
		?>	  
	   </div>


	  <div class="form-group form-check">
	    <input type="checkbox" class="form-check-input" id="exampleCheck1">
	    <label class="form-check-label" for="exampleCheck1">Check me out</label>
	  </div>
	  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</form>

	    </p>
	  </div>
</div>
</div>






</body>
</html>






