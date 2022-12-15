<?php
    require ('koneksi.php');

	session_start();

    if (isset ($_POST['login'])) {
        $email  = $_POST['logemail'];
        $pass   = $_POST['logpass'];

        $emailCheck = mysqli_real_escape_string($koneksi, $email);
        $passCheck  = mysqli_real_escape_string($koneksi, $pass);

        if (!empty (trim($email)) && !empty (trim($pass))) {
            $query  = "SELECT * FROM user WHERE email = '$email'";
            $result = mysqli_query($koneksi, $query);
            $num    = mysqli_num_rows($result);

            while ($row = mysqli_fetch_array($result)) {
                $idUser     = $row['id_user'];
                $userName   = $row['nama_user'];
                $userMail   = $row['email'];
                $userPass   = $row['password'];
                $akses      = $row['id_akses'];
            }

            if ($num != 0) {
                if ($userMail == $email && $userPass == $pass) {
                    // header('Location: index.php?user_fullname=' . urlencode($userName));
                    header('Location: home.php');
                    if($akses==1){
						session_start();
						$_SESSION['id'] = $idUser;
                    	$_SESSION['name'] = $userName;
                    	$_SESSION['akses'] = $akses;
						header('location:dashboard/');
					}elseif($akses==2){
						session_start();
						$_SESSION['id'] = $idUser;
                    	$_SESSION['name'] = $userName;
                    	$_SESSION['akses'] = $akses;
						header('location:index.php');
					}
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

        $query  = "INSERT INTO user VALUES (NULL, '$userName', '$userMail', '$userPass', 2)";
        $result = mysqli_query($koneksi, $query);

        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
  	<title>Log In / Sign Up</title>
  	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css'>
	<link rel='stylesheet' href='https://unicons.iconscout.com/release/v2.1.9/css/unicons.css'>
	<link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
<!-- partial:index.partial.html -->
<a href="#" class="logo" target="_blank">
		<img src="assets/img/logo/logo.png" style="height: 40px;" alt="">
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
											<form action="login.php" method="POST" class="user">
											<div class="form-group">
												<input type="email" name="logemail" class="form-style" placeholder="Email" id="logemail" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="logpass" class="form-style" placeholder="Password" id="logpass" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<button type="submit" name="login" class="btn mt-4">Log In</button>
											</form>
                            				<p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p>
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Sign Up</h4>
											<form action="login.php" method="POST" class="user">
											<div class="form-group">
												<input type="text" name="logname" class="form-style" placeholder="Full Name" id="logname" autocomplete="off">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="email" name="logemail" class="form-style" placeholder="Email" id="logemail" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="logpass" class="form-style" placeholder="Password" id="logpass" autocomplete="off">
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
<!-- partial -->
  <script  src="./script.js"></script>

</body>
</html>