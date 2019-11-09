<?php
session_start();
error_reporting(0);

include_once('../asset/config/config_safe/flag.php');
if(isset($_SESSION['user'])){
if($call->level($_SESSION['user'])==4){
if(isset($_SESSION['rand'])){
$r = $_SESSION['rand'];
}else{
$_SESSION['rand']= rand(1,999);
$r = $_SESSION['rand'];
}
if(!isset($_SESSION['build'])){
$str = $call->read_flag($_SESSION['user']);
$str1 = str_replace('', '', exec("enctf ".substr($str,0,-10)));
$firs = 'char flag[20] = "'.$str1.'";';
$str2 = str_replace('', '', exec("enctf ".substr($str,10,10)));
$last = 'char *fleg = "'.$str2.'";';
@unlink("tmpt.c");
function save($file,$text){
	$f = fopen($file,'a');
	fwrite($f,$text);
	fclose($f);
	}
	
foreach(file("ctfv2.c") as $line){
	if(preg_match('/CHANGE_SOURCE/i',$line)){
		save('tmpt.c',$firs."\n");
		}elseif(preg_match('/GANTI2/i',$line)){
			save('tmpt.c',$last."\n");
			}else{
				save('tmpt.c',$line);
				}
	}
	
	exec("gcc tmpt.c -o Reverse_me_$r");
	exec("tar -zcf Re_CTF_$r.tar.gz readme.md Reverse_me_$r");
	header("Location: Re_CTF_$r.tar.gz");
	}else{
	header("Location: Re_CTF_$r.tar.gz");
	}
	}else{
	header('Location: /index.php?info=missed_level');
	}
}else{
header('Location: /index.php?info=user_undefine');
}
	?>