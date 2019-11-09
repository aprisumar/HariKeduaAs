

		<div class="alert alert-warning alert-dismissible fade show mt-1" role="alert">
	<strong>Warning</strong> terjadi kesalahan saat melakukan validasi token.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
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
    <h5 class="card-title">Basic Math!</h5>
<div class="card-text">
	<?php
$key = $_GET['answer'];
if(isset($key)){
if(isset($key) && !empty($key) && is_numeric($key)){
if(strlen($key)<4){
if($key>999){
print'<a class="btn btn-sm btn-success mb-1" href="?submit='.$call->read_flag($_SESSION['user']).'" role="button">SUBMIT TOKEN MU DISINI!</a>';
}else{
print'<small class="text-danger">opps... terlalu pendek awkwkwk</small>';
}
}else{
print'<small class="text-danger">opps... terlalu panjang hehehe</small>';
}
}else{
print'<small class="text-danger">opss it is empty or not a number!</small>';
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
$key = $_GET['answer'];
if(isset($key) && !empty($key) && is_numeric($key)){
if(strlen($key)<4){
if($key>999){
print"flag_28rn38f2ndkelwbd82";
}else{
print"terlalu pendek";
}
}else{
print"terlalu panjang";
}
}else{
print"opss it is empty or not a number!";
}
    	</pre>
    	</div>
</div>
</div>
</div>
</div>
