<?php
session_start();
require_once 'config.php';
require_once '/var/gmcs_config/staff.conf';
require_once 'common_table_function.php';
//my_print_r($_POST);
//RVogdc4R!

$ex=explode('|',$_POST['action']);
//print_r($ex);
if(count($ex)==3)
{
	$d=$ex[1];
	$t=$ex[2];
	$action=$ex[0];
}
else
{
	$d=$_POST['^database'];
	$t=$_POST['^table'];
	$action=$_POST['action'];	
}

if(isset($action))
{
	if($_POST['action']=='download')
	{
		$GLOBALS['nojunk']=TRUE;
	}
}

if(isset($_POST['offset']))
{
	$offset=$_POST['offset'];
}
else
{
	$offset=0;
}

$link=set_session();

$dk=get_dependant_table($link,$d,$t);

//my_print_r($dk);

//if primary key is to be made readonly, it must be autoincrement
//autoincrement and default are readonly
$pk=get_primary_key($link,$d,$t);	
$pka=array();
$pka_value=false;

	foreach($pk as $pk_key)
	{
		if(isset($_POST[$pk_key['Field']]))
		{
			$pka[$pk_key['Field']]=$_POST[$pk_key['Field']];
			$pka_value=true;
		}
		else
		{
			$pka[$pk_key['Field']]='';
		}
	}

	if($action=='download')									
	{														
		download($link,$d,$t,$_POST['blob_field'],$pka);	
		exit(0);											
	}																	

	
head();
menu();

if($action=='search')
{
	search($link,$d,$t,$GLOBALS['default']);	
}
elseif($action=='new')
{
	add($link,$d,$t,$GLOBALS['default']);		
}

elseif($action=='show_search_rows')
{
	show_search_rows($link,$d,$t,$_POST);
}

elseif($action=='show_all_rows')
{
	show_all_rows($link,$d,$t,$offset,$GLOBALS['limit'],$GLOBALS['default']);
}

elseif($action=='show_search_details')
{
	show_search_rows_by_pka($link,$d,$t,$pka);
	show_parent_rows($link,$d,$t,$pka);
	show_dependent_rows($link,$d,$t,$pka);
	add_dependent_rows($link,$d,$t,$pka);
}

elseif($action=='print')
{
	print_rows_by_pka($link,$d,$t,$pka);
	print_parent_rows($link,$d,$t,$pka);
	print_dependent_rows($link,$d,$t,$pka);
}

elseif($action=='save')
{
	save($link,$d,$t,$_POST,$_FILES);
	show_search_rows_by_pka($link,$d,$t,$pka);
}
elseif($action=='insert')
{
	insert($link,$d,$t,$_POST,$_FILES);
	show_search_rows_by_pka($link,$d,$t,$pka);
}

////////////////////////////////////////////////////////////////
//table specific data///////////////////////////////////////////
//if $pka and $default is defined do not need to change     ////
elseif($action=='edit')										////
{															////
		edit($link,$d,$t,$pka,$GLOBALS['default']);			////
		//edit($link,$d,$t,$pka,$default);					////
}															////
elseif($action=='delete')									////
{															////
		delete($link,$d,$t,$pka);							////
}															////
////////End/////////////////////////////////////////////////////

print_horizontal_all($link,$d,$t,'select * from `'.$t.'`');
tail();
?>

