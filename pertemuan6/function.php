<?php 
$conn=mysqli_connect("localhost","root","","phpdasar");
function query($query){
  global $conn;
    $result=mysqli_query($conn,$query);
    $rows=[];
    while($row=mysqli_fetch_assoc($result)){
      $rows[]=$row;
    }
    return $rows;
}
function tambah($data){
  global $conn;
  //ambil data tiap element
  $nama=htmlspecialchars($data["nama"]);
  $jenis_kelamin=htmlspecialchars($data["jenis_kelamin"]);
  $ttl=htmlspecialchars($data["ttl"]);
  //jalankan fungsi upload
  $foto=upload();

  if(!$foto){
    return false;
  }

  $query="INSERT INTO siswa VALUES ('','$nama','$jenis_kelamin','$ttl','$foto')";
  mysqli_query($conn,$query);
  return mysqli_affected_rows($conn);
}

function upload(){
  $namaFile=$_FILES["foto"]["name"];
  $ukuranFile=$_FILES["foto"]["size"];
  $error=$_FILES["foto"]["error"];
  $tmpName=$_FILES["foto"]["tmp_name"];
  //cek apakah ada gambar yang diupload atau belum
  if($error === 4){
    echo"
    <script>alert('Pilih gambar terlebih dahulu');
    </script>";
    return false;

  }
  //cek yang diuploadgambar atau bukan
  $ekstensiGambarValid=['jpg','jpeg','png'];
  $ekstensiGambar=explode('.',$namaFile);
  $ekstensiGambar=strtolower(end($ekstensiGambar));
  if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
    echo"
    <script>alert('yang anda upload bukan gambar');
    </script>";
    return false;
  }
//cek ukuran gambar
 if($ukuranFile>2000000){
  echo"
  <script>alert('Ukuran gambar terlalu besar');
  </script>";
  return false;
 }
 // ubah nama gambar
 $namaFileBaru=uniqid();
 $namaFileBaru.='.';
 $namaFileBaru.=$ekstensiGambar;
 // gambar siap diupload
 move_uploaded_file($tmpName,'./asset/img/'.$namaFileBaru);
 return $namaFileBaru;

}
function hapus($id){
  global $conn;
  mysqli_query($conn, "DELETE FROM siswa WHERE id =$id");
  return mysqli_affected_rows($conn);
}
function ubah($data){
  global $conn;
   //ambil data tiap element
   $id=htmlspecialchars($data["id"]);
   $nama=htmlspecialchars($data["nama"]);
   $jenis_kelamin=htmlspecialchars($data["jenis_kelamin"]);
   $ttl=htmlspecialchars($data["ttl"]);
   $fotoLama=htmlspecialchars($data["fotoLama"]);

   //cek apakah user pifoto baru atau tidak
   if($_FILES["foto"]["error"]===4){

     $foto=$fotoLama;
   }else{
     $foto=upload();
   }
   $query="UPDATE siswa SET nama='$nama', jenis_kelamin='$jenis_kelamin', ttl='$ttl', foto='$foto' WHERE id=$id ";
   mysqli_query($conn,$query);
   return mysqli_affected_rows($conn);
}
function cari($keywoard){
  $query="SELECT * FROM siswa WHERE 
  nama Like'%$keywoard%'OR
  ttl Like'%$keywoard%'
  ";
  return query($query);
}
function registrasi($data){
  global $conn;
  $username=strtolower(stripslashes($data["username"]));
  $password=mysqli_real_escape_string($conn, $data["password"]);
  $password2=mysqli_real_escape_string($conn, $data["password2"]);
  //cek username sudah ada apa belum
 $result= mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
 if (mysqli_fetch_assoc($result)){
   echo "<script>alert('Username telah terdaftar '); </script>";
   return false;
 }
    //cek konfirmasi password
    if($password !==$password2){
      echo"
      <script>alert('Konfirmasi password salah');
      
      </script>";
      return false;
    }
    //amankan password
    $password=password_hash($password,PASSWORD_DEFAULT);

    //tambahkan ke database
    mysqli_query($conn, "INSERT INTO user VALUES ('','$username','$password')");
    return mysqli_affected_rows($conn);
}























?>