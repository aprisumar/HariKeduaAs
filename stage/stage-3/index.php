<?php
session_start();
ob_start();
require_once('../substr/header.php');
require_once('../asset/config/config_safe/flag.php');

if(isset($_GET['submit']) && !empty($_GET['submit'])){
	if($call->check_flag($_SESSION['user'], $_GET['submit'])){
		$_SESSION['flag']='N45HT';
		header('Location: /index.php?info=level_unlocked');
		exit;
		}else{
			header('Location: ?err=fail');
			}
	}
	
if(isset($_SESSION['user'])){
if($call->level($_SESSION['user'])==3){
if($_SESSION['flag']==''){
$_SESSION['flag']=$call->update_flag($_SESSION['user']);
}
	print'
    <div class="container-fluid bg-light justify-content-center">

';
if(isset($_GET['err']) and $_GET['err']=='fail'){
		print'
		<div class="alert alert-warning alert-dismissible fade show mt-1" role="alert">
	<strong>Warning</strong> terjadi kesalahan saat melakukan validasi token.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
    	';
}
?>
	<div class="card text-center mt-1 mb-1">
  <div class="card-header">
<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Main</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="source-tab" data-toggle="tab" href="#source" role="tab" aria-controls="source" aria-selected="false">Clue</a>
  </li>
</ul>
  </div>
  
  <div class="card-body">
  <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    <h5 class="card-title">Basic Condition!</h5>
<div class="card-text">
	<?php
$password = 'N45HT_NASTAR';
$key = $_GET['answer'];
if(isset($key)){
if(!empty($key)){
if(@strlen($key)<12){
if(@strcmp($key,$password)==0){
print'<a class="btn btn-sm btn-success mb-1" href="?submit='.$call->read_flag($_SESSION['user']).'" role="button">SUBMIT TOKEN MU DISINI!</a>';
}else{
print'<small class="text-danger">opps... password salah awkwkwk</small>';
}
}else{
print'<small class="text-danger">opps... password terlalu panjang hehehe</small>';
}
}else{
print'<small class="text-danger">opss it is empty!</small>';
}}

?>
	<form id="math-form" class="form-group" method="GET">
    	<div class="form-row col-md-5 mb-1">
<input type="text" class="form-control" name="answer" aria-label="answer" placeholder="enter ur answer">
    </div>
        <button type="submit" id="btn-login" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> &nbsp; Submit</button>
  </form></br></br>
  <pre class="border border-secondary">
  <marquee>waktu pengerjaan tetap terhitung walau anda telah logout!...</marquee>
</pre>
  </div>
</div>
  <div class="tab-pane fade" id="source" role="tabpanel" aria-labelledby="source-tab">
    <h5 class="card-title">is my source code!</h5>
    <div class="card-text">
    	<pre class="text-left border border-secondary">
$password = '????????????';
$key = $_GET['answer'];
if(isset($key) && !empty($key)){
if(strlen($key)<12){
if(strcmp($key,$password)==0){
print'flag_83jd8eje8ejdiskdj38dj';
}else{
print'opps... password salah awkwkwk';
}
}else{
print'opps... password terlalu panjang hehehe';
}
}else{
print'opss it is empty!';
}
    	</pre>
    	</div>
</div>
</div>
</div>
</div>
	<?
}else{
	header('Location: /index.php?info=missed_level');
	}
}else{
header('Location: /index.php?info=user_undefine');
}
require_once('../substr/footer.php');
ob_flush();
?>