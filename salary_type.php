<?php
session_start();
require_once 'config.php';
require_once '/var/gmcs_config/staff.conf';
require_once 'common_table_function.php';
require_once 'menu.php';
//my_print_r($_POST);
if(isset($_POST['action']))
{
	if($_POST['action']=='download')
	{
		$GLOBALS['nojunk']=TRUE;
	}
}
$link=set_session();

	
////////////////////////////////////////////////////////////////
//table specific data///////////////////////////////////////////
////////////////////////////////////////////////////////////////
$d='biochemistry';											////
$t='sample';												////
if(isset($_POST['sample_id']))								////
{															////			
	$pka=array('sample_id'=>$_POST['sample_id']);			////
}															////		
$default=array();											////
//download before HTML										////
if(isset($_POST['action']))									////
{															////
	if($_POST['action']=='download')						////
	{														////
		download($link,$d,$t,$_POST['blob_field'],$pka);	////
	}														////
}															////			
////////End/////////////////////////////////////////////////////

head();
echo '<div class="row">';
echo '<div class="col-md-12">';
menu();
echo '</div>';
echo '</div>';

if(!isset($_POST['action']))
{
	echo '<div class="row">';
	echo '<div class="col-md-6 col-sm-12">';
		search($link,$d,$t,$default);		
	echo '</div>';
	echo '<div class="col-md-6 col-sm-12">';
		add($link,$d,$t,$default);			
	echo '</div>';
	echo '</div>';
}
elseif($_POST['action']=='show_search_rows')
{
		show_search_rows($link,$d,$t,$_POST);
}
elseif($_POST['action']=='save')
{
		save($link,$d,$t,$_POST,$_FILES);
}
elseif($_POST['action']=='insert')
{
		insert($link,$d,$t,$_POST,$_FILES);
}

////////////////////////////////////////////////////////////////
//table specific data///////////////////////////////////////////
////////////////////////////////////////////////////////////////
elseif($_POST['action']=='edit')							////
{															////
		edit($link,$d,$t,$pka,$default);					////
}															////
elseif($_POST['action']=='delete')							////
{															////
		delete($link,$d,$t,$pka);							////
}															////
////////End/////////////////////////////////////////////////////
tail();
?>
