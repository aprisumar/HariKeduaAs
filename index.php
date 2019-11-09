<?php
ob_start();

require_once('./vendor/autoload.php');

use system\getView;

$load = new getView;
?>
    <!doctype html>
    <html lang="en">
    <head>
	<?php $load->view('head'); ?>
    </head>
    <body>
    	<!-- Nav -->
		<?php $load->view('nav'); ?>
        <div class="container-fluid">     
			<!--- content body -->
			<div id="notif"></div>
   <?php
   if($_GET and isset($_GET['page'])){
      $page = strtolower($_GET['page']);

	  switch($page){
		case 'home':
	   $load->view('stage');
		$load->view($page);
	   $load->view('about');
		break;
		case 'about':
	   $load->view('stage');
		$load->view($page);
		break;
		case 'register':
		$load->view($page);
      $load->view('stage');
	   $load->view('about');
		break;
		case 'stat':
		$load->view($page);
 	   $load->view('stage');
	   $load->view('home');
		break;
		default:
header('Location: /index.php?=home');
break;
	}
}else{
	  $load->view('stage');
		$load->view('home');
	   $load->view('about');
}
ob_flush();
				?>
           <!--- content body -->
           </div>
          <!-- footer -->
          	<?php $load->view('footer'); ?>
        <!-- Optional JavaScript -->
		<?php $load->view('js'); ?>
    </body>
    </html>
