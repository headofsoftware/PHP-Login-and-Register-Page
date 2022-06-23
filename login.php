
<?php



?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>MEMBER LOGIN SYSTEM</title>
  </head>
  <body>
  
<div class="container p-5">
 <div class="card p-5">
		<form action="login.php" method="POST">
		 

		  <div class="mb-3">
		    <label for="exampleInputEmail1" class="form-label">Username:</label>
		    <input type="text" class="form-control 
			<?php
		    if (!empty($username_err))
		    {
		    	echo "is-invalid";
		    }
		    ?>
		    " id="exampleInputEmail1" name="usernametext">
		    <div class="invalid-feedback">
          		<?php
          		echo $username_err;
          		?>
        	</div>
		  </div>
		  <div class="mb-3">
		    <label for="exampleInputPassword1" class="form-label">Password</label>
		    <input type="password" class="form-control 
		    <?php
		    if (!empty($parola_err))
		    {
		    	echo "is-invalid";
		    }
		    ?>
		    " id="exampleInputPassword1" name="passwordtext">
		    <div class="invalid-feedback">
          		<?php
					echo $parola_err;
          		?>
        	</div> 
		  </div>

		  
		  <div class="mb-3 form-check">
		    <input type="checkbox" class="form-check-input" id="exampleCheck1">
		    <label class="form-check-label" for="exampleCheck1">Check me out</label>
		  </div>
		  <button type="submit"  class="btn btn-primary" name="Enter">Login</button>
		</form>
	</div>
</div>



</div>

</body>
</html>