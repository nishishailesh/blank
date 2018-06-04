<?php
session_start();
require_once 'config.php';
require_once '/var/gmcs_config/staff.conf';
require_once 'common_table_function.php';
$link=set_session();
//my_print_r($_POST);
head();
menu();
tail();
?>
