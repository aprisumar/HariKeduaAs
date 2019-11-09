<?php
session_start();
ob_start();
/*
* create date wed,05/22/2019
* script made bY Johny Aka PETR03X
* Thank to all or other member N45HT
*/
include_once('../../asset/config/config_safe/flag.php');
$users = $_SESSION['user'];
if(isset($_GET['submit']) && !empty($_GET['submit'])){
	if($call->check_flag($users, $_GET['submit'])){
		$_SESSION['flag']='';
		header('Location: /index.php?info=level_unlocked');
		}else{
			header('Location: ?err=fail');
			}
	}
if(isset($users)){
if($call->level($users)==1){
if($_SESSION['flag']==''){
$_SESSION['flag']=$call->update_flag($_SESSION['user']);
}		
?>
<!doctype html>
<html lang="id">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="../../asset/css/bootstrap.min.css">
   <link rel="stylesheet" href="../../asset/css/glyphicon.css">
        <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../asset/js/jquery.min.js"></script>
        <script src="../../asset/js/bootstrap.min.js"></script>
        <script src="../../ManageSession/session.php"></script>
    <title>N45HT - CTF</title>
  </head>
  <body>
  	<!-- START OF TEST -->
  	<!-- header -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <h1 id="User" class="navbar-brand">N45HT - CTF</h1>
<button class="navbar-toggler" type="button" onclick="user()" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/index.php?page=index">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/index.php?page=stat">Stat player</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/index.php?page=about">About</a>
      </li>
      <?php
      if(isset($users)){
      	print '
            </li>
      <li class="nav-item '.($page=="logout" ? "active":"").'">
        <a class="nav-link" href="/index.php?page=logout">Log Out</a>
      </li>';
      }
      ?>
    </ul>
  </div>
</nav>
  	<!-- header -->
  	<div class="container-fluid">
  	<?
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
	<div class="mt-1 card">
<div class="card-body">
	<? if(isset($_SESSION['ctf_user'])){
		?>
		<div class="text-center">
<h5 class="card-title text-center text-success">Congratulation <? print $users;?>!</h5>
		<a class="btn btn-lg btn-success" href="?submit=<? print $call->read_flag($users); ?>" role="button">SUBMIT TOKEN MU!</a>
		</div><br>
		
	<? }else{ ?>
<h5 class="card-title text-center">Welcome USER!</h5>
<div id="error"></div>
 <form id="form-login" action="" method="post">
  <div class="form-group">
    <label for="usernameId">Username :</label>
    <input type="text" name="user" class="form-control" id="username" aria-describedby="usernameId" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="passwordId">Password :</label>
    <input type="password" name="pass" class="form-control" id="password" aria-describedby="passwordId" placeholder="Password">
  </div>
  <button type="submit" id="btn-login" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> &nbsp; daftar</button>
</form>
<script>
	    $('document').ready(function()
    { 
      $("#form-login").validate({
          rules:
       {
       pass: {
       required: true,
       },
       user: {
                required: true
                },
        },
           messages:
        {
                pass:{
                          required: "<small id='password' class='form-texr text-mute text-secondary'>*harus di isi.</small>"
                         },
                user: "<small id='username' class='form-texr text-mute text-secondary'>*harus di isi.</small>",
           },
        submitHandler: submitForm 
           });  

       function submitForm()
       {  
       var data = $("#form-login").serialize();
        
       $.ajax({
        
       type : 'POST',
       url  : '../../ManageSession/stage1.php',
       data : data,
       beforeSend: function()
       { 
        $("#error").fadeOut();
        $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; loading ...');
       },
       success :  function(response)
          {      

         if(response){
          $("#error").fadeIn(100, function(){   
          $("#error").html('<div class="alert alert-success p-1"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; login success!.</div>');
          });
          $("#btn-login").html('&nbsp; direct In ...');
          setTimeout(' window.location.href = "/stage-1/sutar/index.php"; ',4000);
         }else{
             
          $("#error").fadeIn(1000, function(){   

          $("#error").html('<div class="alert alert-danger p-1"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; username atau password salah!.</div>');
               $("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');

           });
          }
         }
       });
        return false;
      }
    });
    
	</script>
	<? } ?>
		</div>
		</div>
 <div class="row bg-dark text-white">
    	<div class="pt-3 col-md text-center">
    	<p>
      copyright (c) 2018-2019<br>powered bY N45HT
      </p>
    </div> 
    </div>
</div>
<script type="text/javascript" src="../../asset/js/jquery.validate.min.js"></script>
  </body>
</html>
<?
}else{
	header('Location: /index.php?info=missed_level');
	}
}else{
header('Location: /index.php?info=user_undefine');
}
?>
