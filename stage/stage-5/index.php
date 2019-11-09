<?php
session_start();
ob_start();
require_once('../substr/header.php');
include_once('../asset/config/config_safe/flag.php');

if(isset($_SESSION['user'])){
if($call->level($_SESSION['user'])==5){
if($_SESSION['flag']==''){
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
    <a class="nav-link disabled" id="source-tab" data-toggle="tab" href="#source" role="tab" aria-controls="source" aria-selected="false" disabled>Submit</a>
  </li>
</ul>
  </div>
  
  <div class="card-body">
  <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <h5 class="card-title">LOGIC TEST!</h5>
    <div class="card-text">
<p>ya ya ya. kalo dari tadi kita bermain cari mencari flag sekarang kita tidak akan melakukan hal itu. tugas kamu sekarang adalah memikirkan gimana cara submit flag nya?</p><p> nah flag nya sendiri nanti sudah kita sediakan di bawah :</p><br/>
<pre class="border broder-secondary"><? print $call->read_flag($_SESSION['user']);?></pre>
    	</div>
</div>
  <div class="tab-pane fade" id="source" role="tabpanel" aria-labelledby="source-tab">
    <h5 class="card-title">Submit Flag stage-5!</h5>
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
	cieeee mau ngapain? >_<
	clue : cek history browser'mu ^_^
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