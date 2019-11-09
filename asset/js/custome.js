
    $('document').ready(function()
    { 
         /* validation */
      $("#login-form").validate({
          rules:
       {
       password: {
       required: true,
       },
       username: {
                required: true
                },
        },
           messages:
        {
                username:{
                          required: "<script>swal.fire('Tips!','Semuah field harus di isi!','info')</script>"
                         },
                password:{
                         required: "<script>swal.fire('Tips!','Semuah field harus di isi!','info')</script>"
						},
           },
        submitHandler: submitForm 
           });

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
          swal.fire(obj.title, obj.msg,obj.type);
          $("#error").fadeIn(1000, function(){   
          $("#error").html('<div class="alert alert-danger p-1"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+obj.msg+'</div>');
          $("#btn-register").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
           });
          }
         }
			});
	});

       function submitForm()
       {  
       var data = $("#login-form").serialize();
        
       $.ajax({
        
       type : 'POST',
       url  : 'vendor/src/models/aksi_login.php',
       data : data,
       beforeSend: function()
       { 
        $("#error").fadeOut();
        $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; loading ...');
       },
       success :  function(response)
          {
			var obj = JSON.parse(response);
         if(obj.status){
          $("#error").fadeIn(100, function(){
          $("#error").html('<p class="alert alert-success p-1"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; login success!.</p>');
          });
          $("#btn-login").html('&nbsp; direct In ...');
          swal.fire('Login berhasil!','Selamat datang '+ obj.user +' silakan tunggu anda akan di alihkan segera!','success').then((result) => {
          window.location.href = "index.php";
			 });
          setTimeout(' window.location.href = "index.php"; ',4000);
         }else{
          swal.fire('Login gagal!','Username atau password salah!','error');
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

$(function(){
$('#conten').ajaxStart(function(){
$(this).html('loading...');
}).ajaxStop(function(){
$(this).html('loading selesai..');
});
$('#stage a').click(function(){
var url = $(this).attr('href');
$('#conten').load(url);
return false;
});
});

function logout(){
const url = 'vendor/src/view/logout.php';

Swal.queue([{
  title: 'Anda yakin akan keluar?',
  text: "jika iya jangan lupa mampir kesini lagi ya ^_^",
  type: 'info',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Keluar?!',
  preConfirm: () => {
        Swal.insertQueueStep({
          type: 'info',
          text: 'loading..',
onBeforeOpen: () => {
Swal.loading()
    return fetch(url)
      .then(response => response.json())
      .then(data => {
		
			Swal.insertQueueStep(data.msg)
		})
      .catch(() => {
        Swal.insertQueueStep({
          type: 'error',
          title: 'Unable to get your public IP'
        })
      })
}
})
  }
}]);
}
