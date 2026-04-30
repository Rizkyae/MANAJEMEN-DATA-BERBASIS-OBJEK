<?php
include_once "../controllers/MahasiswaController.php"; [cite: 10]
$controller = new MahasiswaController(); [cite: 11]
$id = $_GET['id']; [cite: 11]
$data = $controller->model->getById($id); [cite: 11]
$row = $data->fetch_assoc(); [cite: 11]

if(isset($_POST['update'])) {
    $controller->model->update(
        $id,
        $_POST['nama'],
        $_POST['jurusan']
    ); [cite: 11]
    header("Location: ../index.php"); [cite: 12]
}
?>

<h2>Edit Data Mahasiswa</h2>
<form method="POST">
    Nama:
    <input type="text" name="nama" value="<?= $row['nama']; ?>"> <br><br>
    Jurusan:
    <input type="text" name="jurusan" value="<?= $row['jurusan']; ?>"> <br><br>
    <button type="submit" name="update">Update</button>
</form>
