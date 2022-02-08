<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Reset Password</title>
	<!-- CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link href="../public/assets/css/plugins.css" rel="stylesheet">
    <link href="../public/assets/css/style.css" rel="stylesheet">
    <link href="../public/assets/css/custom.css?var=123" rel="stylesheet">
</head>
<body>
	<div class="container position-absolute top-50 start-50 translate-middle w-50">
		<h4 class="evenboxinnerShop m-l-20">Reset Password</h4>
		<div class="card box5">
			<div class="card-body">
				<?php
				if($_GET['key'] && $_GET['token']){
					require ('../modele/connexion_bdd.php');
					$email = $_GET['key'];
					$token = $_GET['token'];
					$curDate = date("Y-m-d H:i:s");

					$query = $bdd->prepare("SELECT * FROM user WHERE user_email=:user_email");
					$query -> execute([":user_email" => $email]);
					$row=$query->fetch();

					if (count($row) > 0) {
						if($row['exp_date'] >= $curDate){ ?>
							<form action="../controller/update_forget_password.php" method="POST">
								<input type="hidden" name="email" value="<?php echo $email;?>">
								<input type="hidden" name="reset_link_token" value="<?php echo $token;?>">
								<div class="form-group">
									<label for="password">New Password</label>
									<input type="password" name='password' class="form-control">
								</div>                
								<div class="form-group">
									<label for="cpassword">Confirm Password</label>
									<input type="password" name='cpassword' class="form-control">
								</div>
								<input type="submit" name="new_password" class="btn btn-primary" value="Submit">
							</form>
						<?php } 
					} else{ ?>
					<div class="text-center">
						<h2>This forget password link has been expired.</h2>
						<h3>To return to the site:</h3> 
						<h3><a href="https://unpeudefrancais.com/"><img src="../public/assets/images/logo.png" class="logo">unpeudefrancais.com</a></h3>
					</div>
					<?php }
				}?>
			</div>
		</div>
	</div>
</body>
</html>