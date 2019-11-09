            <!-- card -->
<div id="conten">
            <div class="card text-center mt-2">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link 
								<?php if(isset($_SESSION["user"])){print"disabled";} ?> " id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="false">Login
							</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link 
								<?php if(isset($_SESSION["user"])){print"disabled";} ?> " id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Daftar
							</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h5 class="card-title">Peraturan permainan!</h5>
                            <div class="card-text">
                                Yo peraturan dari permainan ini simple aja. ya itu jangan memberi flag kalian kepada teman/orang lain. kan curang bro nama nya h3h3h3
                                <br> trus juga stage nya sendiri terbagi menjadi 5 stage di mulai dari sql-injection untuk list nya sendiri kalian bisa lihat di atas atau di bawah ini :
                                <br>
                                <div class="d-flex justify-content-center">
                                    <ul class="text-left">
                                        <li>Sql-injection</li>
                                        <li>Basic Math</li>
                                        <li>Bypass Compare</li>
                                        <li>Reverse Enginering</li>
                                        <li>Logic test</li>
                                    </ul>
                                </div>
                                tingkat kesusahan dari masih-masih stage tergantung dari skill kalian masing-masing!

                            </div>
                        </div>
                        <div class="tab-pane fade" id="login" role="tabpanel" aria-labelledby="login-tab">
                            <h5 class="card-title">Login and Play Now!</h5>
                            <div id="error"></div>
                            <div class="card-text  d-flex justify-content-center">
                                <form id="login-form" class="form-group">
                                    <div class="form-row col-md-12">
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">U</span>
                                            </div>
                                            <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon2">P</span>
                                            </div>
                                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="basic-addon2">
                                        </div>
                                    </div>
                                    <button type="submit" id="btn-login" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                            <h5 class="card-title">Register now!</h5>
                            <div class="card-text">
                                kuy langsung daftar aja dengan klik tombol di bawah ini.
                            </div>
                            <a class="btn btn-lg btn-primary" href="?page=register" role="button">Touch me senpai!</a>
                        </div>
                    </div>
                </div>
            </div>
</div>
