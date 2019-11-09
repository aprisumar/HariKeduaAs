<?php
/*
* config database
* create at Mon,05/20/2019
* bye...
*/

namespace models;

session_start();

require_once('../../autoload.php');

use config\database as config;
use config\website as path;
use lib\word;

class insert{
	protected $database;

	public function __construct(){
		$this->database = new config();
	}

	public function add($name,$user,$pass,$tpass){
if(!empty($this->database->connection)){
		if($pass == $tpass){
			$db = $this->database->connection;
			$CHECK = $db->prepare("select * from tbl_user where username=:user");
			$CHECK->execute([':user'=>$user]);
			if($CHECK->rowCount()==0){
			$STM  = $db->prepare("insert into tbl_user(name,username,password,score) values (:name,:user,MD5(:pass),'0')");
			$data = [
				':name' => $name,
				':user' => $user,
				':pass' => $pass
			];
			$result = $STM->execute($data);
			if($result){
			$_SESSION['user']=$name;
			$_SESSION['logout']=$user;
			return json_encode(['status'=>true,'name'=> $name], true);
			}else{
			return json_encode(['status'=>false,'title'=>'Register Gagal!','msg'=>'Register gagal!','type'=>'error'], true);
			}
			}else{
			return json_encode(['status'=>false,'title'=>'Register Gagal!','msg'=>'Username sudah terdaftar!','type'=>'error'], true);
			}
			}else{
			return json_encode(['status'=>false,'title'=>'Register Gagal!','msg'=>'Password tidak sama!','type'=>'error'], true);
		}
}else{
			return json_encode(['status'=>false,'title'=>'Register Gagal!','msg'=>'Galat tidak di ketahui!','type'=>'error'], true);
		}
}
}
$call = new insert();
$word = new word();

if($_POST){
$name = htmlentities(preg_replace('/[^a-zA-Z0-9.\/$@#]/i','',preg_replace('/[ \t]+/', '', $_POST['name']))); 
$user = htmlentities(preg_replace('/[^a-zA-Z0-9]/i','', preg_replace('/[ \t]+/', '', preg_replace('/\s*$^\s*/m', '', $_POST['username']))));
if(isset($_POST['name']) && !empty($_POST['name'])){
if(strlen($name)>=3 and strlen($name)<=15){
$valid_name = $word->find_badword($word->filter($name, 1));
print_r($valid_name);
if($valid_name['status']){
if(isset($_POST['username']) && !empty($_POST['username'])){
if(strlen($user)>=5 and strlen($user)<=15){
$valid_user = $word->find_badword($word->filter($user, 1));
print_r($valid_user);
if($valid_pass['status']){
if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['confirm']) && !empty($_POST['confirm'])){
if(strlen($_POST['password']) >=5 and strlen($_POST['confirm']) >=5 ){
print $call->add($word->filter($name, 2) ,$word->filter($user, 2),$_POST['password'],$_POST['confirm']);
}else{
print json_encode(['status'=>false,'title'=>'Register Gagal!', 'msg'=>'Password harus lebih dari 5 karakter!','type'=>'error'], true);
}
}else{
print json_encode(['status'=>false,'title'=>'Opps..','msg'=>'Password masih kosong !?','type'=>'info'], true);
}
}else{
print json_encode(['status'=>false,'title'=>'BadWord Detected!','msg'=>'Username mengandung kata terlarang '.$valid_name['detected'].' !?','type'=>'warning'], true);
}
}else{
print json_encode(['status'=>false,'title'=>'Register Gagal!','msg'=>'Username harus lebih dari 5 karakter dan kurang dari 15 karakter tanpa menggunakan symbol!','type'=>'error'], true);
}
}else{
print json_encode(['status'=>false,'title'=>'Opps..','msg'=>'Username masih kosong !?','type'=>'info'], true);
}
}else{
print json_encode(['status'=>false,'title'=>'BadWord Detected!','msg'=>'Name/nick mengandung kata terlarang '.$valid_user['detected'].' !?','type'=>'warning'], true);
}
}else{
print json_encode(['status'=>false,'title'=>'Register Gagal!','msg'=>'Name/nick harus lebih dari 3 karakter dan kurang dari 15!','type'=>'error'], true);
}
}else{
print json_encode(['status'=>false,'title'=>'Opps..','msg'=>'Name/Nick masih kosong !?','type'=>'info'], true);
}
}
