<?php
    require ('koneksi.php');

	session_start();

    if (isset ($_POST['submit'])) {
        $email  = $_POST['logemail'];
        $pass   = $_POST['logpass'];

        $emailCheck = mysqli_real_escape_string($koneksi, $email);
        $passCheck  = mysqli_real_escape_string($koneksi, $pass);

        if (!empty (trim($email)) && !empty (trim($pass))) {
            $query  = "SELECT * FROM user_detail WHERE user_email = '$email'";
            $result = mysqli_query($koneksi, $query);
            $num    = mysqli_num_rows($result);

            while ($row = mysqli_fetch_array($result)) {
                $id         = $row['id'];
                $userMail   = $row['user_email'];
                $userPass   = $row['user_password'];
                $userName   = $row['user_fullname'];
                $level      = $row['level'];
            }

            if ($num != 0) {
                if ($userMail == $email && $userPass == $pass) {
                    // header('Location: index.php?user_fullname=' . urlencode($userName));
                    $_SESSION['id'] = $id;
                    $_SESSION['name'] = $userName;
                    $_SESSION['level'] = $level;
                    header('Location: index.php');
                } else {
                    $error = 'Username atau Password Salah!!!';
                    header('Location: login.php');
                }
            } else {
                $error = 'User Tidak Ditemukan!!!';
                header('Location: login.php');
            }
        } else {
            $error = 'Data Tidak Boleh Kosong!!!';
            echo $error;
        }
    }

    if (isset ($_POST['register'])) {
        $userMail   = $_POST['logemail'];
        $userPass   = $_POST['logpass'];
        $userName   = $_POST['logname'];

        $query  = "INSERT INTO user_detail VALUES (NULL, '$userMail', '$userPass', '$userName', '2')";
        $result = mysqli_query($koneksi, $query);

        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  	<meta charset="UTF-8">
  	<title>Login Page</title>
  	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
	<link rel="stylesheet" href="login.css">
	<link href="assets/img/logo-dark.png" rel="shortcut icon">
</head>

<body>
	<!-- partial:index.partial.html -->
	<a href="https://front.codes/" class="logo" target="_blank">
		<img src="img/logo-dark.png" alt="logo" style="height: 50px;">
	</a>

	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
											<form action="login.php" method="post" class="user">
												<div class="form-group">
													<input type="email" name="logemail" class="form-style" placeholder="Email" id="logemail" autocomplete="off">
													<i class="input-icon uil uil-at"></i>
												</div>	
												<div class="form-group mt-2">
													<input type="password" name="logpass" class="form-style" placeholder="Password" id="logpass" autocomplete="off">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<button type="submit" name="submit"  class="btn mt-4">Login</button>
											</form>
                            				<p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p>
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Sign Up</h4>
											<form action="login.php" method="post" class="user">
												<div class="form-group">
													<input type="text" name="logname" class="form-style" placeholder="Full Name" id="logname" autocomplete="off" required>
													<i class="input-icon uil uil-user"></i>
												</div>	
												<div class="form-group mt-2">
													<input type="email" name="logemail" class="form-style" placeholder="Email" id="logemail" autocomplete="off" required>
													<i class="input-icon uil uil-at"></i>
												</div>	
												<div class="form-group mt-2">
													<input type="password" name="logpass" class="form-style" placeholder="Password" id="logpass" autocomplete="off" required>
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<button type="submit" name="register" class="btn mt-4">Sign Up</button>
											</form>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){		
			$('.form-checkbox').click(function(){
				if($(this).is(':checked')){
					$('.form-password').attr('type','text');
				}else{
					$('.form-password').attr('type','password');
				}
			});
		});

		$(document).ready(function(){  
			$('#show_password').on('click', function(){  
				var passwordField = $('#password');  
				var passwordFieldType = passwordField.attr('type');
				if(passwordField.val() != '')
				{
					if(passwordFieldType == 'password')  
					{  
						passwordField.attr('type', 'text');  
						$(this).text('Hide Password');  
					}  
					else  
					{  
						passwordField.attr('type', 'password');  
						$(this).text('Show Password');  
					}
				}
				else
				{
					alert("Please Enter Password");
				}
			});  
		}); 
	</script>
</body>
</html>