<?php
session_start();
ob_start();
require_once('../substr/header.php');
include_once('../asset/config/config_safe/flag.php');

if(isset($_SESSION['user'])){
if($call->level($_SESSION['user'])==4){
if($_SESSION['flag']=='N45HT'){
$_SESSION['flag']=$call->update_flag($_SESSION['user']);
}
	print'
    <div class="container-fluid bg-light justify-content-center">

';
?>
	<div class="card text-center mt-1 mb-1">
  <div class="card-header">
<ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Main</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="source-tab" data-toggle="tab" href="#source" role="tab" aria-controls="source" aria-selected="false">Submit</a>
  </li>
</ul>
  </div>
  
  <div class="card-body">
  <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <h5 class="card-title">DOWNLOAD FILE!</h5>
    <div class="card-text">
    	download and open with ur friendly debugger ^_^<br/>
   ex : Radare2</br>
<a class="btn btn-lg btn-primary" href="/stage-4/download.php" role="button">Get SOURCE!</a>
    	</div>
</div>
  <div class="tab-pane fade" id="source" role="tabpanel" aria-labelledby="source-tab">
    <h5 class="card-title">Reverse Engineering!</h5>
<div class="card-text">
	<?php
$key = $_GET['answer'];
if(isset($key)){
if(!empty($key)){
if($call->check_flag($_SESSION['user'], $key)){
$_SESSION['flag']='';
header('Location: /index.php?info=level_unlocked');
}else{
print'<small class="text-danger">FLAG SALAH ATAU TIDAK COCOK!</small>';
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