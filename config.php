<?php
$GLOBALS['login_message']='Mobile number is your Login';
$GLOBALS['user_database']='hod';
$GLOBALS['user_table']='user';
$GLOBALS['user_id']='id';
$GLOBALS['user_pass']='epassword';
$GLOBALS['expiry_period']='+ 6 months';
$GLOBALS['nojunk']=false;

$GLOBALS['textarea_size']=70;	//for input vs textarea
$GLOBALS['limit']=10;			//for show all
$GLOBALS['search_limit']=50;	//for search


$GLOBALS['menu']=array
					(
						'up to 2 lacs'=>array(
											'Edit'=>array('new|hod|up_to_two_lakhs','main.php',''),
											'Print'=>array('print_pdf|hod|up_to_two_lakhs','main.php','formtarget=_blank')
											//,
											//'Print'=>array('print_horizontal|hod|up_to_two_lakhs','main.php'),
										)
					);


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

/*
$GLOBALS['menu']=array
					(
						'up to 2 lacs'=>array(
											'Search'=>array('search|hod|up_to_two_lakhs','main.php'),
											'Show All'=>array('show_all_rows|hod|up_to_two_lakhs','main.php'),
											'Print All'=>array('print_all_rows|hod|up_to_two_lakhs','main.php'),
											'New'=>array('new|hod|up_to_two_lakhs','main.php')
										)
					);
*/


if(isset($_SESSION['login']))
{
	$GLOBALS['default']=array('department'=>$_SESSION['login']);
}
?>
