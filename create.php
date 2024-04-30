<!DOCTYPE html>
<html>
<head>
    <title>Form Pendaftaran Peserta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    
    include "koneksi.php";

 
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $jenis=input($_POST["jenis"]);
        $gender=input($_POST["gender"]);
        $umur=input($_POST["umur"]);
        $deskripsi=input($_POST["deskripsi"]);

        $sql="insert into peserta (nama,jenis,gender,umur,deskripsi) values
		('$nama','$jenis','$gender','$umur','$deskripsi')";

        $hasil=mysqli_query($kon,$sql);

        if ($hasil) {
            header("Location:index.php");
        }
        else {
            echo "<div class='alert alert-danger'> Data Gagal disimpan.</div>";

        }

    }
    ?>
    <h2>Input Data</h2>


    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required />

        </div>
        <div class="form-group">
            <label>Jenis:</label>
            <input type="text" name="jenis" class="form-control" placeholder="Masukan Jenis" required/>
        </div>
        <div class="form-group">
            <label>Gender:</label>
            <input type="text" name="gender" class="form-control" placeholder="Masukan Gender" required/>
        </div>
        <div class="form-group">
            <label>Umur:</label>
            <input type="text" name="umur" class="form-control" placeholder="Masukan Umur" required/>
        </div>
        <div class="form-group">
            <label>Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" rows="5"placeholder="Masukan Deskripsi Hewan" required></textarea>
        </div>   

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>