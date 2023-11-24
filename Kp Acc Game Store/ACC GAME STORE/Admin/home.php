
<link href='Admin.css' rel='stylesheet' type='text/css' />
<h1>Selamat datang adminstrator</h1> 
<div class="row">

                    <div class="col-md-4">
                    <h3>Nama Admin : </h3>
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $_SESSION["admin"]['nama_admin'] ?>" class="form-control"> 
                        </div>
                    </div>
                    <div class="col-md-4">
                    <h3>Username Admin : </h3>
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $_SESSION["admin"]['username'] ?>" class="form-control"> 
                        </div>
                    </div>
                    <div class="col-md-4">
                    <h3>Password Admin : </h3>
                        <div class="form-group">
                            <input type="text" readonly value="<?php echo $_SESSION["admin"]['password'] ?>" class="form-control"> 
                        </div>
                    </div>