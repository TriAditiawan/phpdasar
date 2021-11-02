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
  $poto=htmlspecialchars($data["poto"]);
  $query="INSERT INTO siswa VALUES ('','$nama','$jenis_kelamin','$ttl','$poto')";
  mysqli_query($conn,$query);
  return mysqli_affected_rows($conn);
}
function hapus($id){
  global $conn;
  mysqli_query($conn, "DELETE FROM siswa WHERE id =$id");
  return mysqli_affected_rows($conn);
}
?>