<?php
session_start();
require_once 'common_table_function.php';
require_once 'config.php';
require_once '/var/gmcs_config/staff.conf';
if(isset($_POST['action']))		//always after config.php
{
	$GLOBALS['nojunk']=TRUE;
}


//my_print_r($_POST);

set_session_without_expiry(); 
head();
menu();
if(isset($_POST['action']))
{
	if($_POST['action']=='change_password')
	{
		//check if two new paswords are same
		if($_POST['password_1']!=$_POST['password_2'])
		{
			$message="message=Change password failed!!... New Password mismatch";
			header("location:index.php?".$message);
			exit(0);
		}
		//check for password requirements
		if(!is_valid_password($_POST['password_1']))
		{
			$message="message=Change password failed!!... >8, 1Cap, 1Num, 1 Special";
			header("location:index.php?".$message);
			exit(0);
		}
		
		//check old password
		if  (
				!verify_ap_user_without_expiry 
				(
					$GLOBALS['main_user'],$GLOBALS['main_pass'],"",
					$GLOBALS['user_database'],$GLOBALS['user_table'],
					$GLOBALS['user_id'],$_SESSION['login'],
					$GLOBALS['user_pass'],$_POST['old_password']
				)
			)
		{
			$message="message=Change password failed!!... old password was wrong";
			header("location:index.php?".$message);
			exit(0);
		}

		//update
		if(!update_password
									(
									$GLOBALS['main_user'],$GLOBALS['main_pass'],"",
									$GLOBALS['user_database'],$GLOBALS['user_table'],
									$GLOBALS['user_id'],$_SESSION['login'],
									$GLOBALS['user_pass'],$_POST['password_1'],
									$GLOBALS['expiry_period']
									)
						)
		{
			$message="message=Password update failed!Use old password and retry";
			header("location:index.php?".$message);
			exit(0);
		}
		else
		{
			$message="message=Password changed successfully. Re login!!";
			header("location:index.php?".$message);
			exit(0);
		}
	}
}
else
{
	read_password();	
}

tail();
?>
