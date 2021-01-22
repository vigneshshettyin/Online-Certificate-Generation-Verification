<?php
session_start();
require_once 'config/config.php';
$token = bin2hex(openssl_random_pseudo_bytes(16));

// If User has already logged in, redirect to dashboard page.
if (isset($_SESSION['user_logged_in']) && $_SESSION['user_logged_in'] === TRUE)
{
	header('Location: index.php');
}

// If user has previously selected "remember me option": 
if (isset($_COOKIE['series_id']) && isset($_COOKIE['remember_token']))
{
	// Get user credentials from cookies.
	$series_id = filter_var($_COOKIE['series_id']);
	$remember_token = filter_var($_COOKIE['remember_token']);
	$db = getDbInstance();
	// Get user By series ID: 
	$db->where('series_id', $series_id);
	$row = $db->getOne('admin_accounts');

	if ($db->count >= 1)
	{
		// User found. verify remember token
		if (password_verify($remember_token, $row['remember_token']))
        {
			// Verify if expiry time is modified. 
			$expires = strtotime($row['expires']);

			if (strtotime(date()) > $expires)
			{
				// Remember Cookie has expired. 
				clearAuthCookie();
				header('Location: login.php');
				exit;
			}

			$_SESSION['user_logged_in'] = TRUE;
			$_SESSION['admin_type'] = $row['admin_type'];
			header('Location: index.php');
			exit;
		}
		else
		{
			clearAuthCookie();
			header('Location: login.php');
			exit;
		}
	}
	else
	{
		clearAuthCookie();
		header('Location: login.php');
		exit;
	}
}
?>
<?php include BASE_PATH.'/includes/header.php'; ?>
<head>
<link href="css/login.css" rel="stylesheet">
</head>
	<!--  particles  -->
	<div id="particles-js"></div>
	<!-- //particles -->
	<div class="w3ls-pos">
		<h1 style="color: #F9A826;">Dashboard Login</h1>
		<div class="w3ls-login box">
			<!-- form starts here -->
			<form class="form loginform" method="POST" action="authenticate.php">
				<div class="agile-field-txt">
					<input type="email" name="username" placeholder="no-reply@cgv.in.net" required=""/>
				</div>
				<div class="agile-field-txt">
					<input type="password" name="password" placeholder="Password" id="myInput" required=""/>
				</div>

				<?php if (isset($_SESSION['login_failure'])): ?>
				<div class="alert alert-danger alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<?php
					echo $_SESSION['login_failure'];
					unset($_SESSION['login_failure']);
				?>
				</div>
				<?php endif; ?>
				<div class="w3ls-bot">
					<input type="submit" value="LOGIN">
				</div>
				<div class="w3ls-bot" style="padding: 10px;">
				<a style="color: black;" href="https://www.cgv.in.net"><button type="button" class="btn btn-outline-danger btn-lg" style="background-color: #F9A826;">Main Site</button></a>
				</div>
			</form>
		</div>
<?php include BASE_PATH.'/includes/footer.php'; ?>