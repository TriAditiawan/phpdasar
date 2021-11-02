<?php 
$title="login";
include 'asset/atas.php';
require './function.php';

if(isset($_POST["login"])){
  $username=$_POST["username"];
  $password=$_POST["password"];
  $result= mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
  //cek username
  if(mysqli_num_rows($result)===1){
    //cek password
    $row=mysqli_fetch_assoc($result);
   if( password_verify($password, $row["password"])){
     header("Location: index.php");
     exit;
   }
  }

  $error= true;
}
 ?>

<?php if(isset($error)): ?>
<div class="row justify-content-center">
<div class="col-md-6 mt-2">
  <div class="alert alert-danger" role="alert">

 Username / password salah
</div>
</div></div>
<?php endif; ?>
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
            <!-- <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="exampleCheck1" />
              <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <p>Belum punya akun <a href="./registrasi.php">Daftar sekarang</a></p>
            <button type="submit" name="login" class="btn btn-primary">Masuk</button>
          </form>
        </div>
      </div>
    </div>

<?php 
include 'asset/bawah.php';
 ?>
