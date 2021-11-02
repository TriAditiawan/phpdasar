<?php 
$title="ubah data";
include 'asset/atas.php';
require './function.php';
$id=$_GET["id"];
//query data berdasarkan id
$siswa=query("SELECT * FROM siswa WHERE id =$id")[0];
//cek apakah tombol sabmit sudah ditekan
if(isset($_POST["submit"])){
  

  //cek apkahdata berhasil diubah atau tidak
  if(ubah($_POST)>0){
    echo"
    <script>alert('data berhasil diubah');
   document.location.href='index.php'
   </script>";


  }else{
    echo"<script>alert('data gagal diubah');
    document.location.href='ubahdata.php';
    </script>";}
}
 ?>


    <div class="container container2 mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form autocomplete="off" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?=$siswa['id'];?>">
          <input type="hidden" name="fotoLama" value="<?=$siswa['foto'];?>">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" required value="<?=$siswa['nama'];?>"/>
            </div>
            <div class="mb-3">
              <label for="jenis_kelamin" class="form-label">Jenis kelamin</label>
              <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" value="<?=$siswa['jenis_kelamin'];?>" />
            </div>
            <div class="mb-3">
              <label for="ttl" class="form-label">Tahun bulan tanggal lahir</label>
              <input type="text" class="form-control" id="ttl"  name="ttl" required value="<?=$siswa['ttl'];?>"/>
            </div>
            <div class="mb-3">

            <label for="foto" class="form-label">Foto lama</label><br>
            <img src="asset/img/<?=$siswa['foto'];?>" width="50px" alt=""><br>
            <input class="form-control" type="file" id="foto" name="foto" >
            </div>
          
            <button type="submit" class="btn btn-primary" name="submit">ubah data</button>
          </form>
        </div>
      </div>
    </div>

<?php 
include 'asset/bawah.php';
 ?>
