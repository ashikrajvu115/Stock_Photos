<?php
	 include '../lib/Session.php';
	 Session::init();
?>



<?php include '../config/config.php'; ?>
<?php include '../helperse/Formate.php'; ?>
<?php include '../lib/Database.php'; ?>


<?php
	$bd = new Database();
	$fm = new Format();
?>



<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>password Recover</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<?php
			if( $_SERVER['REQUEST_METHOD'] == 'POST') {
				$email = $fm->validation($_POST['email']);
				$email = mysqli_real_escape_string($bd->link, $email);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					echo "Invalid email Addres";
				}
			else{
			$query = "SELECT * from tbl_user where email='$email' limit 1";
			$mailcheck = $bd->select($query);

			if ($mailcheck != false) {
				while ($value=$mailcheck->ferch_assoc()) {
					$userid = $value['id'];
					$username= $value['username'];
				}

				$text=substr($email, 0,3);
				$rand=rand(10000, 99999);
				$newpass="$text$rand";
				$password = md5($newpass);
				$updatequery="UPDATE tbl_user
					set
					password='$password'
					where id='$userid'";
					$result=$bd->update($updatequery);

					$to=$email;
					$from="morshalinislam61@gamiil.com";
					$headers="From: $from\n";
					$headers .= 'From: webmaster@example.com' . "\r\n" .
						    'Reply-To: webmaster@example.com' . "\r\n" .
						    'X-Mailer: PHP/' . phpversion();
					$subject="Your Password";
					$message="Your user id is".$userid."and you user name is ".$username."and your password is".$newpass.". Please login use your useername and password";

					$sendmail=mail($to, $subject, $message, $headers);
					if($sendmail){
						echo "<span style='color:green; font-size:20px;'>Please Check Your Email Address!!!</span>";
					}else{
						echo "<span style='color:green; font-size:20px;'>Password not send. Please Try aggain!!!</span>";
					}

				}
			else{
				echo "<span style='color:red; font-size:20px;'>Username and password not match!!!</span>";
			}
		}
	}

		?>
		<form action="" method="post">
			<h1>Password Recover</h1>
			<div>
				<input type="text" placeholder="Valide Email"  name="email" />
			</div>
			
			<div>
				<input type="submit"  value="Send Mail " />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="login.php">Forgot Password</a>
		</div>
		<div class="button">
			<a href="../index.php">Visite Web Site</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>