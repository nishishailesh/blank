<?php
$GLOBALS['login_message']='Mobile number is your Login';
$GLOBALS['user_database']='ogdc';
$GLOBALS['user_table']='user';
$GLOBALS['user_id']='id';
$GLOBALS['user_pass']='epassword';
$GLOBALS['expiry_period']='+ 6 months';
$GLOBALS['nojunk']=false;

$GLOBALS['textarea_size']=70;	//for input vs textarea
$GLOBALS['limit']=10;			//for show all
$GLOBALS['search_limit']=50;	//for search

/* config for upload

$GLOBALS['menu']=array
					(
						'upload'=>array(
											'Search'=>array('search|myupload|upload','main.php'),
											'Show All'=>array('show_all_rows|myupload|upload','main.php'),
											'New'=>array('new|myupload|upload','main.php')
										)
					);
					
$GLOBALS['default']=array('user_id'=>$_SESSION['login']);


*/

$GLOBALS['menu']=array
					(
						'OG DC'=>array(
											'Search'=>array('search|ogdc|Client_Detail','main.php'),
											'Show All'=>array('show_all_rows|ogdc|Client_Detail','main.php'),
											'New'=>array('new|ogdc|Client_Detail','main.php')
										),
						'Help'=>array(
											'Help'=>array('show_all_rows|ogdc|Help','main.php'),
											'About'=>array('show_all_rows|ogdc|About','main.php')
										)
					);
					
$GLOBALS['default']=array();
?>
