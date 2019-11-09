$(document).ready(function(){
$('#btn-register').click(function(){
			var data = $('#register-form').serialize();
			$.ajax({
				type: 'POST',
				url: "vendor/src/models/aksi_register.php",
				data: data,
       beforeSend: function()
       { 
        $("#error").fadeOut();
        $("#btn-register").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; loading ...');
       },
       success :  function(response)
          {
            //swal.fire('debug!', response,'warning');
			var obj = JSON.parse(response);
         if(obj.status){
          Swal.fire('Register berhasil!','Selamat datang '+ obj.name +' silakan tunggu anda akan di alihkan segera!','success');
          $("#error").fadeIn(100, function(){
          $("#error").html('<p class="alert alert-success p-1"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; Register berhasil!.</p>');
          });
          $("#btn-register").html('&nbsp; direct In ...');
          setTimeout(' window.location.href = "index.php"; ',4000);
         }else{
          swal.fire('Register gagal!', obj.msg,'error');
          $("#error").fadeIn(1000, function(){   
          $("#error").html('<div class="alert alert-danger p-1"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+obj.msg+'</div>');
          $("#btn-register").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
           });
          }
         }
			});
	});
});