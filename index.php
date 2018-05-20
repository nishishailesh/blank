<?php
if(isset($_SESSION))
{
	session_unset();
	session_destroy();
}
session_start();
unset($_SESSION['login']);
unset($_SESSION['password']);

require_once 'config.php';
require_once 'common_table_function.php';

head(); 
$message='Close this window, if not required. <br>Otherwise somebody may press back button and access your data!<br>';
if(isset($_GET['message']))
{
	$message=$message.$_GET['message'];
}

	echo "<div class='row'>
			<div class='col-*-6 mx-auto'>
				<div class='text-danger text-center'><h1>".$message."</h1></div>
			</div>
		</div>";

echo'<div class="row">
			<div class="col-sm-3 bg-light mx-auto">
				<form method=post action=start.php>
					<div class="form-group">
						<h2 class="text-info text-center  bg-dark">Login</h2>
					</div>
					<div class="form-group">
						<label for=user>Login ID</label>
						<input  class="form-control" id=user type=text name=login placeholder=Username>
					</div>
					<div class="form-group">						
						<label for=password>Password</label>
						<input  class="form-control" id=password type=password name=password placeholder=Password>
					</div>
					<div class="form-group">						
						<button class="btn btn-info btn-block" type=submit name=action value=Login>Login</button>
					</div>
					<h5 class="text-info text-center  bg-dark">'.$GLOBALS['login_message'].'</h5>
				</form>
			</div>
		</div>	
';

tail();
?>
