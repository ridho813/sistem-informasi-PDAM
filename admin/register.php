<?php

    require 'fanction.php';

    if(!isset($_SESSION['register'])){
    } else {
        header('location:index.php');
    }
 ?>  
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <style type="text/css">
        body{
            background: url(img/air.jpg) no-repeat;
            width: 100%;
            height: 100%;
            background-size: cover;
        }

    </style>

    <body>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">

                                    <div class="card-header">
                                    <img class="mx-auto d-block" src="img/pdam.PNG" alt="" width="100" height="100">
                                    
                                        <h3 class="text-center font-weight-light my-4">REGISTER PETUGAS</h3>
                                    </div>
                                    
                                    <div class="card-body">

                                        

                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <label for="inputEmail">Masukan Username</label>
                                                <input class="form-control"  name="username" id="inputEmail" type="text" placeholder="username" required />
                                                
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="inputpassword">Masukan Password</label>
                                                <input class="form-control"  name="password" id="inputPassword" type="password" placeholder="Password" required />
                                                
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="inputEmail">Masukan Nama</label>
                                                <input class="form-control"  name="nama" id="inputEmail" type="text" placeholder="username" required />
                                                
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="inputEmail">Masukan Jabatan</label>
                                                <input class="form-control"  name="jabatan" id="inputEmail" type="text" placeholder="username" required />
                                                
                                            </div>
                                            
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" name="register" class="btn btn-primary" >Regis</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Sudah Punya Akun ? Login Disini</a></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">PERUMDA Tirta Darma Ayu Indramayu</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
