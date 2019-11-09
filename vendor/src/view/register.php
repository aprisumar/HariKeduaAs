<div class="card mt-4">
<div class="card-body">
<h5 class="card-title">Form register user!</h5>
<div id="error"></div>
 <form id="register-form" method="post">
  <div class="form-group">
    <label for="username">Name :</label>
    <input type="text" name="name" class="form-control" id="name" aria-describedby="Name" aria-describedby="nameId" placeholder="Enter name">
  </div>
  <div class="form-group">
    <label for="username">Username :</label>
    <input type="text" name="username" class="form-control" id="username" aria-describedby="Username" aria-describedby="usernameId" placeholder="Enter username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password :</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" aria-describedby="password" placeholder="Password">
  </div>
    <div class="form-group">
    <label for="exampleInputPassword2">Confirm Password :</label>
    <input type="password" name="confirm" class="form-control" id="exampleInputPassword2" aria-describedby="confirm" placeholder="Password">
  </div>
</form>
 <button id="btn-register" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> &nbsp; daftar</button>
</div>
</div>