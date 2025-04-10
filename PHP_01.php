<!DOCTYPE html>
<html>
<head>
    <title>Form Validasi PHP</title>
</head>
<body>

<?php
$errors = [];
$nama = $alamat = $telepon = $jenis_kelamin = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi Nama
    if (empty($_POST["nama"])) {
        $errors[] = "Nama wajib diisi";
    } else {
        $nama = trim($_POST["nama"]);
        if (!preg_match("/^[a-zA-Z\s]+$/", $nama)) {
            $errors[] = "Nama hanya boleh berisi huruf dan spasi";
        }
    }

    // Validasi Alamat
    if (empty($_POST["alamat"])) {
        $errors[] = "Alamat wajib diisi";
    } else {
        $alamat = trim($_POST["alamat"]);
    }

    // Validasi Nomor Telepon
    if (empty($_POST["telepon"])) {
        $errors[] = "Nomor telepon wajib diisi";
    } else {
        $telepon = trim($_POST["telepon"]);
        if (!preg_match("/^[0-9]+$/", $telepon)) {
            $errors[] = "Nomor telepon hanya boleh berisi angka";
        }
    }

    // Validasi Jenis Kelamin
    if (empty($_POST["jenis_kelamin"])) {
        $errors[] = "Jenis kelamin wajib dipilih";
    } else {
        $jenis_kelamin = $_POST["jenis_kelamin"];
    }

    // Jika tidak ada error, tampilkan hasil
    if (empty($errors)) {
        echo "<h3>Data Berhasil Disubmit</h3>";
        echo "Nama: $nama<br>";
        echo "Alamat: $alamat<br>";
        echo "Nomor Telepon: $telepon<br>";
        echo "Jenis Kelamin: $jenis_kelamin<br>";
    } else {
        echo "<ul style='color:red;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}
?>

<form method="post" action="">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>"><br><br>

    <label>Alamat:</label><br>
    <input type="text" name="alamat" value="<?= htmlspecialchars($alamat) ?>"><br><br>

    <label>Nomor Telepon:</label><br>
    <input type="text" name="telepon" value="<?= htmlspecialchars($telepon) ?>"><br><br>

    <label>Jenis Kelamin:</label><br>
    <select name="jenis_kelamin">
        <option value="">-- Pilih --</option>
        <option value="Laki-laki" <?= $jenis_kelamin == "Laki-laki" ? "selected" : "" ?>>Laki-laki</option>
        <option value="Perempuan" <?= $jenis_kelamin == "Perempuan" ? "selected" : "" ?>>Perempuan</option>
    </select><br><br>

    <input type="submit" value="Submit">
</form>

</body>
</html>
