<?php 
$title="registrasi";
include 'asset/atas.php';
require './function.php';

if(isset($_POST["register"])){
    if(registrasi($_POST)>0){
        echo"
        <script>alert('Anda telah berhasil terdaftar');
        
        </script>";

    }else{
        echo mysqli_error($conn);
    }
}
 ?>


    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form action="" method="post" autocomplete="off">
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username"  />
              
            </div>
            <div class="mb-3">
              <label for="Password" class="form-label">Password</label>
              <input type="password" class="form-control" id="Password" name="password"/>
            </div>
            <div class="mb-3">
              <label for="Password2" class="form-label">Konfirmasi Password</label>
              <input type="password" class="form-control" id="Password2" name="password2"/>
            </div>
            <!-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck" />
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" name="register" class="btn btn-primary">Daftar</button>
          </form>
        </div>
      </div>
    </div>

<?php 
include 'asset/bawah.php';
 ?>
