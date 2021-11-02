<?php 
$title="Home";
include 'asset/atas.php';
require './function.php';
$siswa=query("SELECT * FROM siswa ORDER BY nama ASC");
if(!$siswa){
  echo mysqli_error($conn);
}
if(isset($_POST["cari"])){
  $siswa=cari($_POST["keyword"]);
}
 ?>
    <section>
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <a href="./tambahdata.php" class="btn btn-primary mb-3 mt-3">Tambah data</a>
            <div class="row">
              <div class="col-md-6">
                <form class="d-flex" action="" method="post">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" autofocus autocomplete="off" name="keyword"/>
                  <button class="btn btn-outline-success" type="submit"name="cari">Search</button>
                </form>
              </div>
            </div>

            <table class="table table-striped mt-3">
              <thead>
                <tr>
                  <th scope="col" width="5%">No</th>
                  <th scope="col" width="15%">Foto</th>
                  <th scope="col" width="30%">Nama</th>
                  <th scope="col" width="15%">Jenis kelamin</th>
                  <th scope="col" width="15%">Tanggal lahir</th>
                  <th scope="col" width="20%"></th>
                </tr>
              </thead>
              <tbody>
              <?php $i=1; ?>
              <?php foreach($siswa as $row):
               ?>
                <tr>
                  <th><?=$i ?></th>
                  <td><img src="./asset/img/<?=$row["foto"];?>" width="100px" alt="" /></td>
                  <td class="nama"><?=$row["nama"];?></td>
                  <td class="jk">
                  <?php $jk=$row["jenis_kelamin"];
                  if($jk=='L') {
                    echo"Laki-laki";
                  }else{
                    echo"Perempuan";
                  }
                    ?>
                  </td>
                  <td class="ttl"><?=$row["ttl"];?></td>
                  <td>
                    <a href="./ubahdata.php?id=<?=$row["id"];?>" class="btn btn-warning mt-2">Ubah</a>
                    <a href="./hapus.php?id=<?=$row["id"];?>"onclick="return confirm('Yakin');" class="btn btn-danger mt-2">Hapus</a>
                  </td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
   
<?php 
include 'asset/bawah.php';
 ?>