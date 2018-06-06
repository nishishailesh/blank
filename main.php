<?php
session_start();
require_once 'config.php';
require_once '/var/gmcs_config/staff.conf';
require_once 'common_table_function.php';
require_once('tcpdf/tcpdf.php'); //if in /usr/share/php folder

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
	if($_POST['action']=='download' || $action=='print_pdf' )
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

if($action=='save')
{
	save($link,$d,$t,$_POST,$_FILES);
	//show_search_rows_by_pka($link,$d,$t,$pka);
}
elseif($action=='insert')
{
	insert($link,$d,$t,$_POST,$_FILES);
	//show_search_rows_by_pka($link,$d,$t,$pka);
}
elseif($action=='show_single_by_pk')
{
	show_search_rows_by_pka_full($link,$d,$t,$pka);
}
elseif($action=='edit')										
{															
		edit($link,$d,$t,$pka,$GLOBALS['default']);			
		//edit($link,$d,$t,$pka,$default);					
}															
elseif($action=='delete')									
{															
	delete($link,$d,$t,$pka);							
}															
elseif($action=='print_pdf')									
{															
	print_pdf($link,$d,$t,mk_select_sql_from_default($link,$d,$t,$default));
	exit(0);							
}
	//show_all_rows($link,$d,$t,$offset,$GLOBALS['limit'],$GLOBALS['default']);
	add($link,$d,$t,$GLOBALS['default']);		
	print_horizontal_all($link,$d,$t,mk_select_sql_from_default($link,$d,$t,$default));
	
tail();
?>

