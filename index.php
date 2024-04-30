<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<title>Tugas CRUD</title>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">PETSHOP</span>
    </nav>
    <div class="container">
        <br>
        <h4><center>Detail Hewan</center></h4>
        <?php
        include "koneksi.php";

        if (isset($_GET['id_hewan'])) {
            $id_hewan = htmlspecialchars($_GET["id_hewan"]);

            $sql = "DELETE FROM peserta WHERE id_hewan='$id_hewan'";
            $hasil = mysqli_query($kon, $sql);

            if ($hasil) {
                header("Location: index.php");
                exit; 
            } else {
                echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";
            }
        }
        ?>

        <table class="my-3 table table-bordered">
            <thead>
                <tr class="table-primary">           
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Gender</th>
                    <th>Umur</th>
                    <th>Deskripsi</th>
                    <th colspan='2'>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM peserta ORDER BY id_hewan DESC";
                $hasil = mysqli_query($kon, $sql);
                $no = 0;
                while ($data = mysqli_fetch_array($hasil)) {
                    $no++;
                ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data["nama"]; ?></td>
                    <td><?php echo $data["jenis"]; ?></td>
                    <td><?php echo $data["gender"]; ?></td>
                    <td><?php echo $data["umur"]; ?></td>
                    <td><?php echo $data["deskripsi"]; ?></td>
                    <td>
                        <a href="update.php?id_hewan=<?php echo htmlspecialchars($data['id_hewan']); ?>" class="btn btn-warning" role="button">Update</a>
                        <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id_hewan=<?php echo $data['id_hewan']; ?>" class="btn btn-danger" role="button">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-primary" role="button">Tambah Data</a>
    </div>
</body>
</html>
