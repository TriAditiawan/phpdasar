<?php 
$title="Tambah data";
include 'asset/atas.php';
require './function.php';
$conn=mysqli_connect("localhost","root","","phpdasar");

//cek apakah tombol sabmit sudah ditekan
if(isset($_POST["submit"])){
  

  //cek apkahdata berhasil ditambahkan atau tidak
  if(tambah($_POST)>0){
    echo"
    <script>alert('data berhasil ditambahkan');
    document.location.href='index.php';
    </script>";


  }else{
    echo"<script>alert('data gagal ditambahkan');
    document.location.href='tambahdata.php';
   </script>";}
}
 ?>


    <div class="container container2 mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" required/>
            </div>
            <div class="mb-3">
              <label for="jenis_kelamin" class="form-label">Jenis kelamin</label>
              <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"  />
            </div>
            <div class="mb-3">
              <label for="ttl" class="form-label">Tahun bulan tanggal lahir</label>
              <input type="text" class="form-control" id="ttl"  name="ttl" required/>
            </div>
            <div class="mb-3">
            <label for="foto" class="form-label">Pilih gambar</label>
            <input class="form-control" type="file" id="foto" name="foto">
            </div>
          
            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
          </form>
        </div>
      </div>
    </div>

<?php 
include 'asset/bawah.php';
 ?>
